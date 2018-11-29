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