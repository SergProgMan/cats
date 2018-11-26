<?php

require_once 'loader.php';
require_once 'menu.php';

$existCat=false;
$userLogin=false;

if(!User::getCurrentUser()){
    echo 'you need to login or registr';
    exit();
} else {
    $userLogin = true;
    $user = User::getCurrentUser();
}


$catId = $_GET['id'];
if($_GET['id']=='temp'){
    $image = 'pictures/temp.jpeg';
    $cat = new Cat;
    $cat->id = $cat->getLastId();
} else {
    $cat = Cat::getById($catId);
    $image = $cat->image;
    $existCat = true;
}

if(isset($_POST['save'])){ //save data from form
    $cat->name = $_POST['name'];
    $cat->age = $_POST['age'];
    $cat->description = $_POST['description'];
    $cat->userId = $user->id;
    $cat->image = 'pictures/'.$cat->id.'.jpeg';
    $cat->save(); //add cat to array and save it
    header('Location: /userCats.php');
    exit();
}

if (isset($_POST['delete'])){
    unlink($this->image);
    $cat::delete($cat->id);
    header('Location: /userCats.php');
}
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

height: auto; 
    width: auto; 
    max-width: 300px; 
    max-height: 300px;