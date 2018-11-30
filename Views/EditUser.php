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
<h1 style= "margin-top:50px;">Change email and password <?= static::$curUser->name ?></h1>
<!-- <?= $message ?> -->
    <form method="POST">
       <p>New email      </p> <input type="text" name="email" placeholder="<?= static::$curUser->email ?>"> 
       <p>New password  </p> <input type="text" name="password"  placeholder="Password">
        <input type="submit" value="Change">
    </form>

</body>
</html>