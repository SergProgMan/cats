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
        static::pageLogic();
        require_once("./Views/Menu.php");
        require_once("./Views/$viewName.php");
    }
}

?>