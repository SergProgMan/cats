<?php

class Route {

    public static $validRoutes = array();

    public static function set($route, $function){
        self::$validRoutes[] = $route;
        //print_r (self::$validRoutes);
        //var_dump($_GET);
        //var_dump($_GET);
        //$function->__invoke();

        if ($_GET['url']==$route){
            $function->__invoke();
        }
    }   
}

?>