<?php 

class Database {


    public static $host =  '172.21.0.3';
    public static $dbName = 'cats';
    public static $username = 'root';
    public static $password = 'test';
    public static $port = '6000';

    protected $isNew = true;


    private static function connect(){
        $host = self::$host;
        $dbName = self::$dbName;
        $username = self::$username;
        $password = self::$password;
        $conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
            // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    public static function query($query,$params=array()){
        $statement =self::connect()->prepare($query);
        $statement -> execute ($params);
        if (explode (' ', $query)[0] == 'SELECT'){
            $data = $statement->fetchAll();
            return $data;
        } else if (explode (' ', $query)[0] == 'INSERT'){
            //
        }
    }

}