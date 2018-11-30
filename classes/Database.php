<?php 

abstract class Database {


    public static $host =  '172.20.0.2';
    public static $dbName = 'myDb';
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
        //var_dump($statement);
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
                //echo "1 element";
                return $array[0];
            }
            //echo "many elements";
            return $array;
        } else if (explode (' ', $query)[0] == 'INSERT'){
            //echo "INSERT";
            return true;
        } else if (explode (' ', $query)[0] == 'UPDATE'){
            //echo "UPDATE";
        } else if (explode (' ', $query)[0] == 'DELETE'){
            //var_dump($statement);
            return true;
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

    public static function getAll(){
        $table = static::$tableName;
        $result = static::query("SELECT * FROM $table");
        //var_dump($result);
        if($result){
            return $result;
        }
        return false;
    }

    public static function delete($id){
        $table = static::$tableName;
        $result = static::query("DELETE FROM $table WHERE id=$id");
        if ($result){
            return $result;
        }
        return false;
    }
}