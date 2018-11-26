<?php

require_once "cat.php";
require_once "user.php";
require_once 'menu.php';

$userLogin = false;
$user;
$message ='';

if(!User::getCurrentUser()){
    echo 'you need to login or registr';
    exit();
} else {
    $userLogin = true;
    $user = User::getCurrentUser();
}

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $check = User::checkNewUserName($name);
    if($check){
        User::changeUserNameOrPassword($user,$name,$password);
    }else{
        $message = "This name is already taken. Change the name!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<?php mainMenu($userLogin); ?>
<h1 style= "margin-top:50px;">Change name and password <?= $user->name ?></h1>
<?= $message ?>
    <form method="POST">
       <p>New name      </p> <input type="text" name="name" placeholder="<?= $user->name ?>"> 
       <p>New password  </p> <input type="text" name="password"  placeholder="Password">
        <input type="submit" value="Change">
    </form>

</body>
</html>