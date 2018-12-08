<?php

class Top10 extends Controller {

    public static $allTenCats = [];
    public static $oneCat = false;

    public function pageLogic(){
        static::$allTenCats = Cat::query("SELECT cats.*, SUM(likes.likeValue) AS likesVal 
                                            FROM cats RIGHT JOIN likes ON cats.id = likes.catId GROUP BY cats.id 
                                            ORDER BY likesVal DESC LIMIT 10");


    var_dump(static::$allTenCats);   
    }
   
}



