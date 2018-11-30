<?php 

class Controller extends Database {

    public static $userLogin = false;
    public static $curUser;

    public function pageLogic(){

    }

    public static function checkAuth(){
        if(User::getCurrentUser()){
            static::$curUser = User::getCurrentUser();
            return static::$userLogin = true;
        }
        //echo "not auth";
    } 

    public static function CreateView($viewName){
        self::checkAuth();
        //require_once("./Views/Menu.php");
        static::pageLogic();
        require_once("./Views/$viewName.php");
    }
}

?>