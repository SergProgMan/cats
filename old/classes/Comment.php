<?php

require_once 'loader.php'; 

class Comment extends DbObject {
    public $id;
    public $catId;
    public $userId;
    public $userName;
    public $content;
    public $time;

    protected static $tableName = 'comments';

    public function save(){
        $conn = DbConnect::get();
        $query = "INSERT INTO comments (catId, userId, userName, content, time)
                VALUES ('$this->catId',
                        '$this->userId',
                        '$this->userName',
                        '$this->content',
                        CURRENT_TIMESTAMP)";
        var_dump($query);
        $res = $conn->query($query);
        var_dump($res);
        //echo "SAVED MOTHER FUCKER";
        return $res;

    }
}

?>
