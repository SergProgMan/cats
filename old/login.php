<?php

    require_once 'loader.php'; 
    require_once 'menu.php';
    $messageLog = '';
    $userLogin = false;

    if(User::getCurrentUser()){ 
        $userLogin = true;

    }

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $password = $_POST['password'];
        $user = User::findByColomnAndValue('name', $name);
        if($user==null){
            $messageLog .= "wrong name or password!";
        } else {
            $res = password_verify($password, $user->hash);
            if(!$res){
                $messageLog .= "Error! wrong name or password!";
            } else {
                $user->token = $user->setCookie();
                //var_dump($user->token);
                $user->save();
                require_once('./index.php');
                // header('Location: /main.php');
                //exit();
            }    
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
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body>
    <h1 style= "margin-top:50px;">Login</h1>
    <?= $messageLog ?>
    <form method="POST">
        <input type="text" name="name" placeholder="Name"> 
        <input type="text" name="password"  placeholder="Password">
        <input type="submit" value="Login">
    </form>
</body>
</html>