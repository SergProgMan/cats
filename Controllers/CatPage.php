<?php 

class CatPage extends Controller {

    public static $curCat;

    public function pageLogic(){

        $catId = $_GET['catId'];
        static::$curCat = Cat::get('id',$catId);

        //var_dump($_POST);
        if(isset($_POST['add_comment'])){
            //echo "button work!";
            $com = new Comment;
            $com->content = $_POST["comment"];
            //$com->timeCreation = date('d/m/Y h:i:s a', time());
            $com->userId = $user->id;
            $com->userName = $user->name;
            $com->catId = $catId;
            $com->save($com);
        }

        if($_GET['deleteComment']){
            Comment::delete($_GET['deleteComment']);
            header('Location: catPage?catId='.$cat->id);
        }

        $comments = Comment::get('catId',$catId);
    }
}
?>