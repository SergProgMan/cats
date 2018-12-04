<?php

class Top10 extends Controller {

    public static $allTenCats = [];
    public static $oneCat = false;

    public function pageLogic(){
        static::$allTenCats = Cat::query("SELECT cats.*
                                (SELECT Count(likes.id) FROM likes WHERE likes.catId = cat.id) as numLikes
                                FROM cats ORDER BY numLikes LIMIT 10"); 
                                        //FROM cats INNER JOIN cats ON cats.id=comments.catId ORDER BY date DESC LIMIT 3");
    var_dump(static::$allTenCats);   
    }
   
}


