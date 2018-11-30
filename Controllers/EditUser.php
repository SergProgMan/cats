<?php 

class EditUser extends Controller {

    public function pageLogic(){

        // if(!User::getCurrentUser()){
        //     echo 'you need to login or registr';
        //     exit();
        // } else {
        //     $userLogin = true;
        //     $user = User::getCurrentUser();
        // }

        if(isset($_POST['email'])){
            $email = strtolower(trim($_POST['email']));
            $password = $_POST['password'];
            $check = User::get('email',$email);
            if(!$check){
                static::$curUser->email = $email;
            }else{
                $message .= "This email is already taken. Change the email!";
                exit();
            }
            if($password){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                static::$curUser->hash= $hash;
            }
            static::$curUser->save();
        }

    }
}

?>