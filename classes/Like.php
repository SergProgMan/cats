<?php

class Like extends Database{
    // CREATE TABLE likes( id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
    // catId INT UNSIGNED NOT NULL, 
    // userId INT UNSIGNED NOT NULL, 
    // likeValue VARCHAR(25) NOT NULL, 
    // PRIMARY KEY(id));

    public $id;
    public $catId;
    public $userId;
    public $likeValue; //like or dislake 

    public $canLike = false;
    public $canDislike = false;

    protected static $tableName = 'likes';
    
    public function save(){
        //save
        //or update
        if($this->isNew){
            $res = self::query("INSERT INTO likes (catId, userId, likeValue)
                        VALUES ('$this->catId',
                                '$this->userId',
                                '$this->likeValue')");
            //var_dump($res);
            //echo "SAVED MOTHER FUCKER";
            return $res;
        } else {
            $res = self::query("UPDATE likes SET  likeValue = '$this->likeValue'
                                            WHERE id = $this->id");
            //var_dump($res);
            return $res;
        }
    }    

    
}