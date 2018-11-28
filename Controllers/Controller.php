<?php 

class Controller extends Database {

    public static $userLogin = false;

    public static function checkAuth(){
        if(User::getCurrentUser()){ 
            return self::$userLogin = true;

        }
        echo "not auth";
    }

    public static function CreateView($viewName){
        self::checkAuth();
        require_once("./Views/$viewName.php");
    }
}

?>