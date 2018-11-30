<div class="container" style="margin-top:75px; margin-left:50px;">
<div class="row">
  <div class="col-sm-3">
    <div class="card">
    <img class="card-img-top img-fluid" style="width:100px;height:100px;" src="<?= static::$wetherData->current->condition->icon?>">
    <h6 class="card-title"><?= static::$wetherData->location->name ?></h6>
    <h6 class="card-title"><?= static::$wetherData->location->localtime ?></h6>
    <h6 class="card-title"><?= static::$wetherData->current->temp_c ?></h6>
    <h6 class="card-title"><?= static::$wetherData->current->condition->text?></h6>
    <h6 class="card-title"><?= static::$wetherData->current->wind_kph." k/h"?></h6>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
<!-- Minfin.com.ua currency informer 260x120 blue-->
<div id="minfin-informer-m1Fn-currency">Загружаем <a href="https://minfin.com.ua/currency/" target="_blank">курсы валют</a> от minfin.com.ua</a></div><script>var iframe = '<ifra'+'me width="260" height="120" fram'+'eborder="0" src="https://informer.minfin.com.ua/gen/course/?color=blue" vspace="0" scrolling="no" hspace="0" allowtransparency="true"style="width:260px;height:120px;ove'+'rflow:hidden;"></iframe>';var cl = 'minfin-informer-m1Fn-currency';document.getElementById(cl).innerHTML = iframe; </script><noscript><img src="https://informer.minfin.com.ua/gen/img.png" width="1" height="1" alt="minfin.com.ua: курсы валют" title="Курс валют" border="0" /></noscript>
<!-- Minfin.com.ua currency informer 260x120 blue-->
</div>
  </div>
  </div>
</div>

<div class="container" style="margin-top:75px; margin-left:50px;">
<div class="row">

<?php if(static::$oneCat){
    static::$allCats->createCard();
    exit();
}
foreach(static::$allCats as $cat){
        $cat->createCard();
 } ?>
</div>
</div>