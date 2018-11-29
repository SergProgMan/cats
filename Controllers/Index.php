<?php

class Index extends Controller {

    public function pageLogic(){
        echo "Index";
        if(isset($_GET['logout'])){
            setcookie("user_token", "", time()-3600);
            header('Location: main.php');
        }
        
        $user = User::getCurrentUser();

        $allCats = Cat::getAll();
        if($allCats && count($allCats)>1){
            $allCats = array_reverse($allCats);
        }
    }
}