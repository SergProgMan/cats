<?php

class Main extends Controller {

    public static $allCats = [];
    public static $oneCat = false;
    


    public function pageLogic(){
        if(isset($_GET['logout'])){
            setcookie("user_token", "", time()-3600);
            header('Location: main');
        }

        static::$allCats = Cat::getAll();
        //var_dump(static::$allCats);

        if(gettype(static::$allCats)=='array'){  //if array
            //echo "1";
            static::$allCats = array_reverse(static::$allCats);
        }else if(static::$allCats==NULL){   //if empty
            echo "<h1>Database is empty! Add new cats!</h1>";
            exit();
        }else if(static::$allCats){         //if has one element
            static::$oneCat = true;
        }

    }
}