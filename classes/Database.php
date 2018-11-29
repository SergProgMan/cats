<?php 

class Database {


    public static $host =  '172.20.0.2';
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

        // try {
        //     $conn = new PDO("mysql:host= $host;dbname=$dbName", $username, $password);
        //     // set the PDO error mode to exception
        //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     echo "Connected successfully";
        //     return $conn;
        //     }
        // catch(PDOException $e)
        //     {
        //     echo "Connection failed: " . $e->getMessage();
        //     }

        $conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
            // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    public static function query($query,$params=array()){
        $statement =self::connect()->prepare($query);
        $statement -> execute ($params);
        if (explode (' ', $query)[1] == 'MAX(id)'){
            $data = $statement->fetch();
            //echo "MAX";
            return $data;
        }else if (explode (' ', $query)[0] == 'SELECT'){
            $array=[];
            $className = get_called_class();
            $data = $statement->fetchObject($className);
            while ($data){
                $data->isNew = false;
                $array[] = $data;
                //$data = $statement->fetch(PDO::FETCH_OBJ);
                
                //echo "Class name: $className";
                $data = $statement->fetchObject($className);
            }
            if(count($array)==1){
                return $array[0];
            }
            return $array;
        } else if (explode (' ', $query)[0] == 'INSERT'){
            //echo "INSERT";
            return true;
        } else if (explode (' ', $query)[0] == 'UPDATE'){
            //echo "UPDATE";
        } 

    }

    public static function get($colomn, $value){
        $table = static::$tableName;    
        $result = static::query("SELECT * FROM $table WHERE $colomn='$value'");
        //var_dump($result);
        if ($result){
            return $result;
        }
        return false;
        
    }

    // public static function arrayToObject($array){
    //     $entity = new static();
    //     //$count = count($array);
    //     //var_dump($count);
    //     foreach ($array as $arr){
    //         foreach ($arr as $key=>$value){
    //             $entity->$key = $value;
    //         }
    //     }
    //     $entity->isNew = false;
    //     return $entity;
    // }


}