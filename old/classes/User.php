<?php

require_once 'loader.php'; 

class User extends DbObject {

    public $id;
    public $name;
    public $email;
    public $hash; 
    public $token;

    protected static $tableName = 'users';


    public function save(){
        $conn = DbConnect::get();
        if($this->isNew){
            $query = "INSERT INTO users (name, email, hash)
                    VALUES ('$this->name',
                            '$this->email',
                            '$this->hash')";
            $res = $conn->query($query);
            if($res){
                $this->id = $conn->insert_id;
                $this->isNew = false;
            }
            return $res;
        } else {
            $query = "UPDATE users SET name = '$this->name',
                                    email = '$this->email',
                                    hash = '$this->hash',
                                    token = '$this->token'
                    WHERE id = $this->id";
            $res = $conn->query($query);
            return $res;
        }
    }

    public function checkNameAndEmail(){
        $conn = DbConnect::get();
        $table =static:: $tableName;
        $queryName = "SELECT name FROM $table WHERE name='$this->name'";
        $queryEmail = "SELECT email FROM $table WHERE email='$this->email'";
        $resN = $conn->query($queryName);
        $resE = $conn->query($queryEmail);
        if($resN->num_rows>0 || $resE->num_rows>0){
            return false;
        }
        return true;
    }

   

    public static function getCurrentUser(){
        if(isset($_COOKIE['user_token'])){
            $token = $_COOKIE['user_token'];
            //var_dump($token);
            $user = static::findByColomnAndValue('token',$token);
            //var_dump($user);
            if($user){
                return $user;
            }
            return false;
        }
    }

    

    public function setCookie(){
        $token = $this->generateRandomString();
        setcookie('user_token',$token,time()+60*60*10);
        return $token;
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}

?>