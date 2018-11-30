<?php 

class UserCats extends Controller {

    public static $canEdit = false;
    public static $catUser;
    public static $userCats = [];
    public static $oneCat = false;

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
        
        if(gettype(static::$userCats)=='array'){  //if array
            static::$userCats = array_reverse(static::$userCats);
        }else if(static::$userCats==NULL){   //if empty
            echo "<h1>".static::$catUser->name." doesn't have any acts. Add new cats!</h1>";
            exit();
        }else if(static::$userCats){         //if has one element
            static::$oneCat = true;
        }
    }
}

?>