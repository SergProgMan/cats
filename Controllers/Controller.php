<?php 

class Controller extends Database {

    public static $userLogin = false;
    public static $curUser;

    public static $message ='';


    public static function checkAuth(){
        if(isset($_GET['logout'])){
            setcookie("user_token", "", time()-3600);
            //echo "logout";
            //header('Location: main');
        }
        if(User::getCurrentUser()){
            static::$curUser = User::getCurrentUser();
            return static::$userLogin = true;
        }
        if(isset($_GET['logout'])){
            setcookie("user_token", "", time()-3600);
            header('Location: /index');
        }
        //echo "not auth";
    }

    public static function CreateView($viewName){
        self::checkAuth();
        static::pageLogic();
        require_once("./Views/Menu.php");
        require_once("./Views/$viewName.php");
    }


}

?>