<?php

class Registration extends Controller{

// $userLogin = false;
// $messageLog = '';

public function pageLogic(){
    
    if(isset($_POST['name'])){
        $user = new User;
        $user->name = $this->trimAndLow($_POST['name']);
        $user->email = $this->trimAndLow($_POST['email']);
        $password = $_POST['password'];
        $user->hash = password_hash($password, PASSWORD_DEFAULT);
        $res = $user->checkNameAndEmail();
        if(!$res){
            $messageLog .= "Name or email exist!";
        } else {
            $user->save();
            header('Location: login.php');
            exit();
        }
    }
}

public function trimAndLow($str){
        $str = strtolower(trim($str));
        return $str;
    }
}


?>