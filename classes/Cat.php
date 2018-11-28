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
                                $this->age,
                                '$this->description',
                                '$this->image',
                                $this->userId)");
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
        $conn = DbConnect::get();
        $queryLastId = "SELECT MAX(id) FROM cats";
        $maxId = $conn->query($queryLastId);
         //var_dump($maxId);
        if($maxId == NULL){
            $maxId = 1;
        } else {
        $maxId = $maxId->fetch_assoc();
        $maxId = $maxId['MAX(id)'];
       }
        //var_dump($maxId);
        return $maxId;
    }

}
    
?>
