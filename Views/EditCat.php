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
    <?php mainMenu($userLogin); ?>
    
    <form method = "POST" style="margin:50px">
        <?= '<img class ="picture" src="'.$image.'">';  ?>
        <br>Cat's name<br>
        <input type="text" name="name" value="<?php if($existCat){echo $cat->name;}?>">
        <br>Cat's age<br>
        <input type="text" name="age" value="<?php if($existCat){echo $cat->age;}?>">
        <br>Cat's description<br>
        <textarea name="description" cols="40" rows="3"><?php if($existCat){echo $cat->description;}?></textarea><br>
        <input type="submit" name="save" value="save"> <br><br><br>
        <input type="submit" name="delete" value="delete">
    </form>
</body>
</html>