<?php

class Registration extends Controller{

    public function pageLogic(){      
        if(isset($_POST['name'])){
            $user = new User;
            $user->name = strtolower(trim($_POST['name']));
            $user->email = strtolower(trim($_POST['email']));
            $password = $_POST['password'];
            $user->hash = password_hash($password, PASSWORD_DEFAULT);
            $res = $user->checkNameAndEmail();
            if(!$res){
                static::$message .= "Name or email exist!";
            } else {
                $user->save();
                header('Location: login');
                exit();
            }
        }
    }

}
?>