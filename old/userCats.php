<?php 

    require_once 'loader.php';
    require_once 'menu.php';

    $userLogin = false;
    $canEdit = false;

    if($user = User::getCurrentUser()){     //if user login 
        $userId = $user->id;
        $catUserId = $userId;
        $userLogin = true;
        $userId = $user->id;
    } 

    if (isset($_GET['userId'])){      // if user doesn't login              
        $catUserId = $_GET['userId'];
        $user = User::getById($catUserId);
        if($userLogin && $catUserId==$userId){ ////if login and watch his cats
            $canEdit = true;
        }
    } else {
        $catUserId = $userId;
        $canEdit = true;
    }
    
    $userCats = Cat::getAllById($catUserId);
    //var_dump($userCats);
    if($userCats == NULL){
        echo "$user->name"." doesn't have any";
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
<h1  style="margin-top:50px; margin-left:50px;"><?php if($userCats==NULL){ 
                                    echo "$user->name"." doesn't have any cats";
                                    exit();}
                                    echo $user->name."  cats" ?></h1>
<div class="row" style="padding:20px; margin-top:30px;">
    <?php foreach($userCats as $cat): ?>
    <div class="column">
        <div class="card">
        <?php echo '<img class ="image" src="'.$cat->image.'">'; 
        //var_dump($cat);
        ?>
        <div class="container">
            <h2><?= $cat->name ?></h2>
            <p class="title"><?= $cat->age ?></p>
            <p><?= $cat->description ?></p>
            <?php 
                if($canEdit){
                    echo '<br><a href="editCat.php?id='.$cat->id.'">Edit</a>';
                }
                ?>
        </div>
        </div>
    </div>
    <?php endforeach; ?>
    </div>
</body>
</html>