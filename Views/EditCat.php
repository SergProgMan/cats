
<body>    
    <form method = "POST" style="margin-top:75px; margin-left:50px;">
        <?= '<img class ="picture" src="'.static::$entity->image.'">';  ?>
        <br>Cat's name<br>
        <input type="text" name="name" value="<?php echo static::$entity->name;?>">
        <br>Cat's age<br>
        <input type="text" name="age" value="<?php echo static::$entity->age;?>">
        <br>Cat's description<br>
        <textarea name="description" cols="40" rows="3"><?php echo static::$entity->description;?></textarea><br>
        <input type="submit" name="save" value="save"> <br><br><br>
        <?php if(!static::$isNew){
            echo '<input type="submit" name="delete" value="delete">';
        }?>
    </form>
</body>
