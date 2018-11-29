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
<h1  style="margin-top:50px; margin-left:50px;"><?php if(static::$userCats==NULL){ 
                                    echo static::$catUser->name." doesn't have any cats";
                                    exit();}
                                    echo static::$catUser->name."  cats" ?></h1>
<div class="row" style="padding:20px; margin-top:30px;">
    <?php foreach(static::$userCats as $cat): ?>
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