<div class="container" style="margin-top:75px; margin-left:50px;">
<div class="row">

<?php if(static::$oneCat):?>

        <div class="col-sm-3">
            <div class="card">
                <a href="catPage?catId=<?= static::$allCats->id ?>">
                <img class="card-img-top img-fluid" src="<?= static::$allCats->image ?>" alt="Card image cap"></a>
                <div class="card-block">
                    <h4 class="card-title"><?= static::$allCats->name ?></h4>
                    <h6 class="card-title"><?= static::$allCats->age ?></h6>
                    <p class="card-text"><?= static::$allCats->description ?></p>
                    <a href="<?php  $user = User::get('id',static::$allCats->userId);
                                    echo "/userCats?userId=".static::$allCats->userId.'">'.$user->name ?></a>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-outline-success">Cool</button>
                  <button type="button" class="btn btn-outline-danger">Not cool</button>
                </div>
            </div>
        </div>
<?php exit(); endif; ?>




<?php foreach(static::$allCats as $cat): ?>

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
            </div>
        </div>
 <?php endforeach; ?>
</div>
</div>