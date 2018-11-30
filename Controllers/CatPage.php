<?php 

class CatPage extends Controller {

    public static $curCat;
    public static $comments;

    public function pageLogic(){

        $catId = $_GET['catId'];
        static::$curCat = Cat::get('id',$catId);

        //var_dump($_POST);
        if(isset($_POST['add_comment'])){
            //echo "button work!";
            $com = new Comment;
            $com->content = $_POST["comment"];
            //$com->timeCreation = date('d/m/Y h:i:s a', time());
            $com->userId = static::$curUser->id;
            $com->userName = static::$curUser->name;
            $com->catId = $catId;
            $com->save($com);
        }

        if($_GET['deleteComment']){
            Comment::delete($_GET['deleteComment']);
            header('Location: catPage?catId='.static::$curCat->id);
        }

        static::$comments = Comment::get('catId',$catId);
    }
}
?>