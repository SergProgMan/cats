<div class="container" style="margin-top:75px; margin-left:50px;">
<?= static::$message; ?>


<div class="row">

<?php 
    if(static::$oneCat){
        $cat = static::$userCats;
        $cat->createCard();
        exit();
    } else if (gettype(static::$userCats)=="array"){
        foreach(static::$userCats as $cat){
            $cat->createCard();
        }
    }     
    
 ?>
</div>
</div>



