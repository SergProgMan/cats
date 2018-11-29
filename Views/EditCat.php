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
    <form method = "POST" style="margin:50px">
        <?= '<img class ="picture" src="'.static::$entity->image.'">';  ?>
        <br>Cat's name<br>
        <input type="text" name="name" value="<?php if(static::$entity->isNew){echo static::$entity->name;}?>">
        <br>Cat's age<br>
        <input type="text" name="age" value="<?php if(static::$entity->isNew){echo static::$entity->age;}?>">
        <br>Cat's description<br>
        <textarea name="description" cols="40" rows="3"><?php if(static::$entity->isNew){echo static::$entity->description;}?></textarea><br>
        <input type="submit" name="save" value="save"> <br><br><br>
        <input type="submit" name="delete" value="delete">
    </form>
</body>
</html>