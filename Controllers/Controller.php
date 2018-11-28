<?php 

class Controller extends Database {

    public static $userLogin = false;

    public static function checkAuth(){
        if(User::getCurrentUser()){ 
            return self::$userLogin = true;

        }
        echo "not auth";
    }

    public static function createMenu(){
        if(self::$userLogin){
            require_once("./Views/MenuFull.php");
        }else {
            require_once("./Views/Menu.php");
        }
}
    

    public static function CreateView($viewName){
        self::checkAuth();
        self::createMenu();
        require_once("./Views/$viewName.php");
    }
}

?>