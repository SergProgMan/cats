<?php  

require_once 'loader.php';
require_once 'menu.php';


$userLogin = false;

if(User::getCurrentUser()){  // if user login and has cookie
    $user = User::getCurrentUser();
    $userId = $user->id;
    $userLogin = true;
}

$catId = $_GET['catId'];
$cat = Cat::getById($catId);



//var_dump($_POST);
if(isset($_POST['add_comment'])){
    //echo "button work!";
    $com = new Comment;
    $com->content = $_POST["comment"];
    $com->timeCreation = date('d/m/Y h:i:s a', time());
    $com->userId = $user->id;
    $com->userName = $user->name;
    $com->catId = $catId;
    $com->save($com);
}

if($_GET['deleteComment']){
    Comment::delete($_GET['deleteComment']);
    header('Location: catPage.php?catId=<?= $cat->id ?>);
}

$comments = Comment::getAllById($catId,'catId');
//var_dump($comments);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body>
<?php //mainMenu($userLogin); ?>
<div class="row" style="padding:20px; margin-top:30px;">
    <div class="column">
        <div class="card">
        <?= '<img class="picture" src="'.$cat->image.'">' ?>
        <div class="container">
            <h2><?= $cat->name ?></h2>
            <p class="title"><?= $cat->age ?></p>
            <p><?= $cat->description ?></p>
            <a href="<?php  $user = User::getById($cat->userId);
                                    echo "/userCats.php?userId=".$cat->userId.'">'.$user->name ?></a>
        </div>
        </div>
    </div>
</div>

<?php
    if($comments == 0){
        echo "This cat doesn't have any comments. Be the first! <br> <br>";
    } else {
        //echo "this is foreach";
        foreach($comments as $comment){
            echo '<b>'.$comment->userName.'</b>'."<br>";
            echo $comment->content."<br>";
            echo '<b>'.$comment->time.'</b>';
            if ($userLogin && $comment->userId == $userId){
                echo '<a href="/userCats.php?deleteComment="'.$userId.'">delete</a>';
            }
            echo "<br><br>";
        }
    }

?>


<?php if($userLogin): ?>
    <form method="POST">
    <textarea name="comment" cols="40" rows="3"></textarea><br>
    <input type="submit" name="add_comment" value="add comment">
    </form>
<?php endif; ?>

</body>
</html>