<?php

require_once('loader.php');

Route::set('index.php', function(){
    Main::CreateView('Main');
});

Route::set('index', function(){
    Main::CreateView('Main');
});

Route::set('login', function(){
    Login::CreateView('Login');
});

Route::set('registration', function(){
    Registration::CreateView('Registration');
});

Route::set('addCat', function(){
    AddCat::CreateView('AddCat');
});

Route::set('editCat', function(){
    EditCat::CreateView('EditCat');
});

Route::set('userCats', function(){
    UserCats::CreateView('UserCats');
});

Route::set('catPage', function(){
    CatPage::CreateView('CatPage');
});

Route::set('editUser', function(){
    EditUser::CreateView('EditUser');
});

Route::set('top10', function(){
    Top10::CreateView('Top10');
});

?>
