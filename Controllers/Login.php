<?php 

class Login extends Controller {

    public function pageLogic(){
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            $user = User::findByColomnAndValue('name', $name);
            if($user==null){
                //$messageLog .= "wrong name or password!";
            } else {
                $res = password_verify($password, $user->hash);
                if(!$res){
                    //$messageLog .= "Error! wrong name or password!";
                } else {
                    $user->token = $user->setCookie();
                    //var_dump($user->token);
                    $user->save();
                    header('Location: /main.php');
                    //exit();
                }    
            }
        }
    }
}
