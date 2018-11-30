<?php 

class EditUser extends Controller {

    public function pageLogic(){
        $userLogin = false;
        $user;
        $message ='';

        if(!User::getCurrentUser()){
            echo 'you need to login or registr';
            exit();
        } else {
            $userLogin = true;
            $user = User::getCurrentUser();
        }

        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            $check = User::checkNewUserName($name);
            if($check){
                User::changeUserNameOrPassword($user,$name,$password);
            }else{
                $message = "This name is already taken. Change the name!";
            }
        }

    }
}

?>