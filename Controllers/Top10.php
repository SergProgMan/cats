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


// I have tow tables:

// dealers with some fields and primary key id

// and inquiries with following fields id dealer_id costs

// There are several items in inquiries for every dealer and i have to count them and sum the costs. Now I have only the count with this statement:

// SELECT a.*, Count(b.id) as counttotal
// FROM dealers a
// LEFT JOIN inquiries b on a.id=b.dealer_id
// GROUP BY a.id
// ORDER BY name ASC
// but i have no idea how to sum the costs of table b for each dealer. Can anybody help? Thanks in advance



// SELECT  a.*
//       , (SELECT Count(b.id) FROM inquiries I1 WHERE I1.dealer_id = a.id) as counttotal
//       , (SELECT SUM(b.cost) FROM inquiries I2 WHERE I2.dealer_id = a.id) as turnover
// FROM dealers a
// ORDER BY name ASC


