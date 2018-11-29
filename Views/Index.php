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
    <h1>Index</h1>
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