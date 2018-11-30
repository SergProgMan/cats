<?php 

class UserCats extends Controller {

    public static $canEdit = false;
    public static $catUser;
    public static $userCats = [];

    public function pageLogic(){
        //var_dump(static::$curUser);
        if (isset($_GET['userId'])){                 
            $catUserId = $_GET['userId'];  // if user doesn't login  
            static::$catUser = User::get('id',$catUserId);
            if(static::$userLogin && $catUserId==static::$curUser->id){ ////if login and watch his cats
                static::$canEdit = true;
            }
        } else if(static::$userLogin){ //if login and press my cats
            static::$catUser = static::$curUser;
            $catUserId = static::$curUser->id;
            static::$canEdit = true;
            //var_dump(static::$catUser);
        }
        
        static::$userCats = Cat::get('userId',$catUserId);
        //var_dump($userCats);
    }
}

?>