<?php

class Main extends Controller {
    public static $allCats = [];

    public function pageLogic(){
        echo "Main Page!!!";
        if(isset($_GET['logout'])){
            setcookie("user_token", "", time()-3600);
            header('Location: main');
        }

        $allCats = Cat::getAll();
        //var_dump(Count($allCats));
        if($allCats && count($allCats)>1){
            static::$allCats = array_reverse($allCats);
        }
    }
}