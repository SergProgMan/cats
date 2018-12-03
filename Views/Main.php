<div class="container" style="margin-top:75px; margin-left:50px;">
<div class="row">
  <div class="col">
    <div>
    <img class="card-img-top img-fluid" style="width:100px;height:100px;" src="<?= static::$wetherData->current->condition->icon?>">
    <h6 class="card-title"><?= static::$wetherData->location->name ?></h6>
    <p class="card-title"><?= static::$wetherData->location->localtime ?></p>
    <h6 class="card-title"><?= static::$wetherData->current->temp_c ?></h6>
    <p class="card-title"><?= static::$wetherData->current->condition->text?></p>
    <p class="card-title"><?= static::$wetherData->current->wind_kph." k/h"?></p>
    </div>
  </div>
  <div class="col">
    <div>
<!-- Minfin.com.ua currency informer 260x120 blue-->
<div id="minfin-informer-m1Fn-currency">Загружаем <a href="https://minfin.com.ua/currency/" target="_blank">курсы валют</a> от minfin.com.ua</a></div><script>var iframe = '<ifra'+'me width="260" height="120" fram'+'eborder="0" src="https://informer.minfin.com.ua/gen/course/?color=blue" vspace="0" scrolling="no" hspace="0" allowtransparency="true"style="width:260px;height:120px;ove'+'rflow:hidden;"></iframe>';var cl = 'minfin-informer-m1Fn-currency';document.getElementById(cl).innerHTML = iframe; </script><noscript><img src="https://informer.minfin.com.ua/gen/img.png" width="1" height="1" alt="minfin.com.ua: курсы валют" title="Курс валют" border="0" /></noscript>
<!-- Minfin.com.ua currency informer 260x120 blue-->
</div>
  </div>
  <div class="col-5">
  <p>Last three comments:</p>
  <div>
    <?php 
    if(gettype(static::$lastThreeCom)=='object'){ //if one    
      echo '<b>'.static::$lastThreeCom->userName.'    </b>';
      echo static::$lastThreeCom->content."<br>";
    } else if(gettype(static::$lastThreeCom)=='array'){
      foreach(static::$lastThreeCom as $com){
        echo '<b>'.$com->userName.'   </b>';
        echo $com->content."<br>";
      }
    }
?>
</div>
</div>

  </div>
</div>
<?= static::$message ?>
<div class="container" style="margin-top:75px; margin-left:50px;">
<div class="row">

<?php
//var_dump(static::$allCats);
if(gettype(static::$allCats) == 'object'){
    static::$allCats->createCard();
}else if(gettype(static::$allCats)=='array' && count(static::$allCats)>1){
  foreach(static::$allCats as $cat){
    $cat->createCard();
}
}
 ?>
</div>
</div>