<?php

abstract class DbObject extends Database{

    protected static $tableName;
    protected $isNew = true;

    public $entities = [];

    
    public function get($id){
        
    }

    public static function getAll(){
        $conn = DbConnect::get();
        $table = static::$tableName;
        $query = "SELECT*FROM $table";
        $res = $conn->query($query);
        if($res){
            $arr = $res->fetch_assoc();
            $entities = [];
            while($arr){
                $entities [] = static::arrayToObject($arr);
                $arr = $res->fetch_assoc();
            }
            return $entities;
        }
    }

    public static function getById($id){
        $conn = DbConnect::get();
        $table = static::$tableName;
        $query = "SELECT * FROM $table WHERE id = $id";
        // var_dump($query);
        $result = $conn->query($query);
        if ($result){
            $arrayData = $result->fetch_assoc();
            $entity = static::arrayToObject($arrayData);
            return $entity;
        }
        return false;   
    }

    public static function getAllById($id, $colomn = 'userId'){
        $conn = DbConnect::get();
        $table = static::$tableName;
        $query = "SELECT*FROM $table WHERE $colomn = $id";
        //var_dump($query);
        $res = $conn->query($query);
        if($res){
            $arr = $res->fetch_assoc();
            $entities = [];
            while($arr){
                $entities [] = static::arrayToObject($arr);
                $arr = $res->fetch_assoc();
            }
            return $entities;
        }
        
    }

    public static function delete($id){
        $conn = DbConnect::get();
        $table = static::$tableName;
     
        $query = "DELETE FROM $table WHERE id = $id";
        $res = $conn->query($query);
    }

    public static function findByColomnAndValue($colomn, $value){
        $conn = DbConnect::get();
        $table = static::$tableName;    
        $query = "SELECT * FROM $table WHERE $volomn='$value'";
        //var_dump($query);
        $result = $conn->query($query);
        //var_dump($result);
        if ($result){
            $arrayData = $result->fetch_assoc();
            //var_dump($arrayData);
            $entity = static::arrayToObject($arrayData);
            return $entity;
        }
        return false;
        
    }

    public static function arrayToObject($array){
        $entity = new static();
        foreach ($array as $key=>$value){
            $entity->$key = $value;
        }
        $entity->isNew = false;
        return $entity;
    }

    
}

?>