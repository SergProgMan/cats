<?php 

class Login extends Controller {

    public function pageLogic(){
        if(isset($_POST['name'])){
            $name = strtolower(trim($_POST['name']));
            $password = $_POST['password'];
            $user = User::findByColomnAndValue('name', $name);
            var_dump($user);
            if($user==null){
                //$messageLog .= "wrong name or password!";
            } else {
                //echo "stage check pass";
                $res = password_verify($password, $user->hash);
                //var_dump($user->hash);
                if(!$res){
                    //$messageLog .= "Error! wrong name or password!";
                } else {
                    echo "GOOD!";
                    $test = new User;
                    var_dump($test);
                    $user->token = $user->setCookie();
                    $user->save();
                    //header('Location: /main.php');
                    //exit();
                }    
            }
        }
    }
}
