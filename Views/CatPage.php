<div class="container" style="margin-top:75px; margin-left:50px;">
<div class="row">
<?= static::$curCat->createCard(); ?>
    </div>
</div>


<div style="margin-top:75px; margin-left:50px;">
<?php
    if(static::$comments == 0){
        echo "This cat doesn't have any comments. Be the first! <br> <br>";
    } else if(gettype(static::$comments)!='array'){
        echo '<b>'.static::$comments->userName.'</b>'."<br>";
        echo static::$comments->content."<br>";
        echo '<b>'.static::$comments->date.'</b>';
        if (static::$userLogin && static::$comments->userId == static::$curUser->id){
            echo '<a href="/catPage?catId='.static::$curCat->id.'&deleteComment='.static::$comments->id.'">     delete</a>';
        }
        echo "<br><br>";
    }else {
        //echo "this is foreach";
        foreach(static::$comments as $comment){
            echo '<b>'.$comment->userName.'</b>'."<br>";
            echo $comment->content."<br>";
            echo '<b>'.$comment->date.'</b>';
            if (static::$userLogin && $comment->userId == static::$curUser->id){
                echo '<a href="/catPage?catId='.static::$curCat->id.'&deleteComment='.$comment->id.'">     delete</a>';
            }
            echo "<br><br>";
        }
    }

?>


<?php if(static::$userLogin): ?>
    <form method="POST"> 
    <textarea name="comment" cols="40" rows="3"></textarea><br>
    <input type="submit" name="add_comment" value="add comment">
    </form>
<?php endif; ?>
</div>
</body>
</html>