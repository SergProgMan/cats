<?php 

class Login extends Controller {

    public function pageLogic(){
        if(isset($_POST['name'])){
            $name = strtolower(trim($_POST['name']));
            $password = $_POST['password'];
            $user = User::get('name', $name);
            //var_dump($user);
            if($user==null){
                static::$message .= "wrong name or password!";
            } else {
                //echo "stage check pass";
                $res = password_verify($password, $user->hash);
                //var_dump($user->hash);
                if(!$res){
                    static::$message .= "Error! wrong name or password!";
                } else {
                    // echo "GOOD!";
                    $user->token = $user->setCookie();
                    // var_dump($user->token);
                    // var_dump($_COOKIE);
                    $user->save();
                    header('Location: /index');
                    exit();
                }    
            }
        }
    }
}
