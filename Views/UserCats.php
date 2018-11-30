<div class="container" style="margin-top:75px; margin-left:50px;">
<?= static::$message; ?>


<div class="row">

<?php 
    if(static::$oneCat){
        static::$userCats->createCard();
        exit();
    } foreach(static::$userCats as $cat){
        $cat->createCard();
    }
 ?>
</div>
</div>



