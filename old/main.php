<?php

require_once 'loader.php';

require_once 'menu.php';

if(isset($_GET['logout'])){
    setcookie("user_token", "", time()-3600);
    header('Location: main.php');
}

$userLogin = false;
if(User::getCurrentUser()){  // if user login and has cookie
    $user = User::getCurrentUser();
    $userId = $user->id;
    $userLogin = true;
}


//var_dump ($allCats);
$allCats = Cat::getAll();
if($allCats && count($allCats)>1){
    $allCats = array_reverse($allCats);
}

// $allCats = Cat::getAll();
// foreach ($allCats as $cat){
//     echo "$cat->id <br>";
// }
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
    <div class="row" style="padding:20px; margin-top:30px;">
    <?php foreach($allCats as $cat): ?>
        <div class="column">
            <div class="card">
                <a href="catPage.php?catId=<?= $cat->id ?>">
                <?= '<img class="picture" src="'.$cat->image.'">' ?> </a>
                <div class="container">
                    <h2><?= $cat->name ?></h2>
                    <p class="title"><?= $cat->age ?></p>
                    <p><?= $cat->description ?></p>
                    <a href="<?php  $user = User::getById($cat->userId);
                                    echo "/userCats.php?userId=".$cat->userId.'">'.$user->name ?></a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    </div>
</body>
</html>