<?php

require_once 'loader.php'; 

class Comment extends Database {

    public $id;
    public $catId;
    public $userId;
    public $userName;
    public $content;
    public $date;

    protected static $tableName = 'comments';

    public function save(){
        self::query("INSERT INTO comments (catId, userId, userName, content)
                VALUES ('$this->catId',
                        '$this->userId',
                        '$this->userName',
                        '$this->content');");
        //echo "SAVED MOTHER FUCKER";
        return $res;

    }
}

?>
