<?php 

class Login extends Controller {

    public function pageLogic(){
        if(isset($_POST['name'])){
            $name = strtolower(trim($_POST['name']));
            $password = $_POST['password'];
            $user = User::get('name', $name);
            //var_dump($user);
            if($user==null){
                //$messageLog .= "wrong name or password!";
            } else {
                //echo "stage check pass";
                $res = password_verify($password, $user->hash);
                //var_dump($user->hash);
                if(!$res){
                    //$messageLog .= "Error! wrong name or password!";
                } else {
                    // echo "GOOD!";
                    $user->token = $user->setCookie();
                    $user->save();
                    header('Location: /index');
                    exit();
                }    
            }
        }
    }
}
