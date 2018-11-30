<?php 

class EditCat extends Controller {

    public static $entity;
    public $isNew = true; // ex $existCat=false; 

    public function pageLogic(){

        if(!static::$userLogin){
            echo 'you need to login or registr';
            exit();
        }

        //var_dump($_GET);
        $catId = $_GET['id'];
        if($catId =='temp'){
            static::$entity = new Cat;
            static::$entity->image = 'pictures/temp.jpeg';
            static::$entity->id = static::$entity->getLastId();
        } else {
            static::$entity = Cat::get('id',$catId);
        }
        //var_dump(static::$entity->image);
        if(isset($_POST['save'])){ //save data from form
            $cat = static::$entity;
            $cat->name = $_POST['name'];
            $cat->age = $_POST['age'];
            $cat->description = $_POST['description'];
            $cat->userId = static::$curUser->id;
            $cat->image = 'pictures/'.$cat->id.'.jpeg';
            $cat->save(); //add cat to array and save it
            header('Location: /userCats');
            exit();
        }

        if (isset($_POST['delete'])){
            //var_dump(static::$entity->image);
            //var_dump($catId);
            unlink(static::$entity->image);
            static::$entity::delete($catId);
            header('Location: /userCats');
        }
    }
}

?>