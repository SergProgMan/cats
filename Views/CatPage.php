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
        <?= '<img class="picture" src="'.static::$curCat->image.'">' ?>
        <div class="container">
            <h2><?= static::$curCat->name ?></h2>
            <p class="title"><?= static::$curCat->age ?></p>
            <p><?= static::$curCat->description ?></p>
            <a href="<?php  $user = User::get('id',static::$curCat->userId);
                                    echo "/userCats?userId=".static::$curCat->userId.'">'.$user->name ?></a>
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
            if (static::$userLogin && $comment->userId == $userId){
                echo '<a href="/userCats?deleteComment="'.$userId.'">delete</a>';
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