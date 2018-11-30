<?php 

class EditUser extends Controller {

    public function pageLogic(){

        if(!static::$userLogin){
            echo 'you need to login or registr';
            exit();
        }

        if(isset($_POST['email'])){
            $email = strtolower(trim($_POST['email']));
            $password = $_POST['password'];
            $check = User::get('email',$email);
            if(!$check){
                static::$curUser->email = $email;
            }else{
                static::$message .= "This email is already taken. Change the email!";
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