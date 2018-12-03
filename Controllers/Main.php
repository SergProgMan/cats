<?php

class Main extends Controller {

    public static $wetherData;

    public static $allCats = [];

    public static $lastThreeCom = [];
 
    public function pageLogic(){

        //WEATHER--------------------
        $data = file_get_contents('http://api.apixu.com/v1/current.json?key=cf90a96f908f43c6b43184113183011&q=Odesa');
        $data = json_decode($data);
        static::$wetherData = $data;
        //WEATHER--------------------

        //last 3 comments-----------
        static::$lastThreeCom = Comment::query("SELECT * FROM comments ORDER BY date DESC LIMIT 3");

        //last 3 comments-----------

        if(isset($_GET['logout'])){
            setcookie("user_token", "", time()-3600);
            //header('Location: main');
        }

        static::$allCats = Cat::getAll();
        //var_dump(static::$allCats);

        if(gettype(static::$allCats)=='array' && count(static::$allCats)>1){  //if array
            static::$allCats = array_reverse(static::$allCats);
        }else if(static::$allCats==NULL){   //if empty
            static::$message .= "<h1>Database is empty! Add new cats!</h1>";
        }

    }
}