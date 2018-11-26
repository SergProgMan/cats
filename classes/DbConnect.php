<?php 

class DbConnect
{
    private static $_connection = false;

    public static function get()
    {
        if (!self::$_connection) {
            self::$_connection = new mysqli('172.20.0.2', 'user', 'test', 'myDb');
        }
        
        return self::$_connection;
    }
}

//parametr
//mysqli
