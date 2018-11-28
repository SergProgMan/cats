<?php

require_once('loader.php');

Route::set('index.php', function(){
    Index::CreateView('Index');
});

Route::set('about-us', function(){
    AboutUs::CreateView('AboutUs');
});

Route::set('contact-us', function(){
    ContactUs::CreateView('ContactUs');
});

Route::set('login', function(){
    Login::CreateView('Login');
});

?>
