<?php

require_once 'loader.php'; 

class User extends Database {

    public $id;
    public $name;
    public $email;
    public $hash; 
    public $token;

    protected static $tableName = 'users';


    public function save(){
        if($this->isNew){
            self::query("INSERT INTO users (name, email, hash)
                    VALUES ('$this->name',
                            '$this->email',
                            '$this->hash')");
            // $res = $conn->query($query);
            // if($res){
            //     $this->id = $conn->insert_id;
            //     $this->isNew = false;
            // }
            // return $res;
        } else {
            self::query("UPDATE users SET name = '$this->name',
                                    email = '$this->email',
                                    hash = '$this->hash',
                                    token = '$this->token'
                    WHERE id = $this->id");
            //return $res;
        }
    }

    public function checkNameAndEmail(){
        $table =static:: $tableName;
        $resN = static::query("SELECT name FROM $table WHERE name='$this->name'");
        $resE = static::query("SELECT email FROM $table WHERE email='$this->email'");
        //var_dump($resN);
        //var_dump($resE);
        if($resN || $resE){
            return false;
        }
        return true;
    }

   

    public static function getCurrentUser(){
        if(isset($_COOKIE['user_token'])){
            $token = $_COOKIE['user_token'];
            //var_dump($token);
            $user = static::get('token',$token);
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