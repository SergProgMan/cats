<?php

require_once 'loader.php';
require_once 'menu.php';

$userLogin = false;
$messageLog = '';

if(User::getCurrentUser()){  
    $userLogin = true;
}

function trimAndLow($str){
    $str = strtolower(trim($str));
    return $str;
}

if(isset($_POST['name'])){
    $user = new User;
    $user->name = trimAndLow($_POST['name']);
    $user->email = trimAndLow($_POST['email']);
    $password = $_POST['password'];
    $user->hash = password_hash($password, PASSWORD_DEFAULT);
    $res = $user->checkNameAndEmail();
    if(!$res){
        $messageLog .= "Name or email exist!";
    } else {
        $user->save();
        header('Location: login.php');
        exit();
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
    <link rel="stylesheet" type="text/css" href="../css/mystyle.css">
</head>
<body>
<?php mainMenu($userLogin); ?>

    <h1 style="margin-top:50px;">Registration</h1>
    <?= $messageLog."<br>" ?>
    <form method = 'POST'>
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="password" placeholder="Password">
        <input type="submit" value="Submit">
    </form>
</body>
</html>