<?php

class Registration extends Controller{

// $userLogin = false;
// $messageLog = '';


    public function pageLogic(){
        //echo "work page logic";
        
        if(isset($_POST['name'])){
            $user = new User;
            $user->name = strtolower(trim($_POST['name']));
            $user->email = strtolower(trim($_POST['email']));
            $password = $_POST['password'];
            $user->hash = password_hash($password, PASSWORD_DEFAULT);
            $res = $user->checkNameAndEmail();
            if(!$res){
                $messageLog .= "Name or email exist!";
            } else {
                $user->save();
                //header('Location: login.php');
                exit();
            }
        }
    }

}
?>