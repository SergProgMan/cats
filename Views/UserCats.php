<div class="container" style="margin-top:75px; margin-left:50px;">
<?= static::$catUser->name."  cats" ?>

<div class="row">

<?php if(static::$oneCat):?>

        <div class="col-sm-3">
            <div class="card">
                <a href="catPage?catId=<?= static::$userCats->id ?>">
                <img class="card-img-top img-fluid" src="<?= static::$allCats->image ?>" alt="Card image cap"></a>
                <div class="card-block">
                    <h4 class="card-title"><?= static::$userCats->name ?></h4>
                    <h6 class="card-title"><?= static::$userCats->age ?></h6>
                    <p class="card-text"><?= static::$userCats->description ?></p>
                    <a href="<?php  $user = User::get('id',static::$userCats->userId);
                                    echo "/userCats?userId=".static::$userCats->userId.'">'.$user->name ?></a>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-outline-success">Cool</button>
                  <button type="button" class="btn btn-outline-danger">Not cool</button>
                </div>
                <?php if(static::$canEdit){
                    echo '<br><a href="editCat?id='.$cat->id.'">Edit</a>';
                } ?>
            </div>
        </div>
<?php exit(); endif; ?>




<?php foreach(static::$userCats as $cat): ?>

        <div class="col-sm-3">
            <div class="card">
                <a href="catPage?catId=<?= $cat->id ?>">
                <img class="card-img-top img-fluid" src="<?= $cat->image ?>" alt="Card image cap"></a>
                <div class="card-block">
                    <h4 class="card-title"><?= $cat->name ?></h4>
                    <h6 class="card-title"><?= $cat->age ?></h6>
                    <p class="card-text"><?= $cat->description ?></p>
                    <a href="<?php  $user = User::get('id',$cat->userId);
                                    echo "/userCats?userId=".$cat->userId.'">'.$user->name ?></a>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-outline-success">Cool</button>
                  <button type="button" class="btn btn-outline-danger">Not cool</button>
                </div>
                <?php if(static::$canEdit){
                    echo '<br><a href="editCat?id='.$cat->id.'">Edit</a>';
                } ?>
            </div>
        </div>
 <?php endforeach; ?>
</div>
</div>



