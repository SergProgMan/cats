<?php

class Registration extends Controller{

// $userLogin = false;
// $messageLog = '';

public function pageLogic(){
    // function trimAndLow($str){
    //     $str = strtolower(trim($str));
    //     return $str;
    // }
    
    if(isset($_POST['name'])){
        $user = new User;
        $user->name = trimAndLow($_POST['name']);
        $user->email = trimAndLow($_POST['email']);
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



}


?>