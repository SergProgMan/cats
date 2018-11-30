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

    public function createCard(){
        $user = User::get('id',$this->userId);
        echo '
        <div class="col-sm-3">
        <div class="card">
            <a href="catPage?catId='.$this->id.'">
            <img class="card-img-top img-fluid" src="'.$this->image.'" alt="Card image cap"></a>
            <div class="card-block">
                <h2 class="card-title">'.$this->name.'</h2>
                <h6 class="card-title">Age: '.$this->age.'</h6>
                <p class="card-text">Description:<br>'.$this->description.'</p>
                <a href="/userCats?userId='.$this->userId.'">'.$user->name.'</a>
                <p class="card-text"><small class="text-muted">'.$this->date.'</small></p>
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-outline-success">Cool</button>
              <button type="button" class="btn btn-outline-danger">Not cool</button>
            </div>
            </div>';
            if(UserCats::$canEdit){
                echo '<br><a href="editCat.php?id='.$cat->id.'">Edit</a>';
            }
            echo '</div>';
    }

}
    
?>
