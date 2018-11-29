<?php

class Cat extends Database{
    public $id;
    public $name;
    public $age;
    public $image;
    public $description;
    public $userId;

    protected static $tableName = 'cats';

    public function save(){
        if($this->isNew){
            $res = self::query("INSERT INTO cats (name, age, description, image, userId)
                        VALUES ('$this->name',
                                '$this->age',
                                '$this->description',
                                '$this->image',
                                '$this->userId')");
            //var_dump($res);
            if($res){
                rename('pictures/temp.jpeg',$this->image);
                $this->isNew = false;
            }
            //echo "SAVED MOTHER FUCKER";
            return $res;
        } else {
            $res = self::query("UPDATE cats SET  name = '$this->name',
                                        age = '$this->age',
                                        description = '$this->description'
                    WHERE id = $this->id");
            //var_dump($res);
            return $res;
        }
    }

    public function getLastId(){        
        $maxId = static::query("SELECT MAX(id) FROM cats");
        //var_dump($maxId);
        if($maxId['MAX(id)'] == NULL){
            $maxId = 1;
        } else {
         $maxId = $maxId['MAX(id)'];
         $maxId++;
       }
        //var_dump($maxId);
        return $maxId;
    }

}
    
?>
