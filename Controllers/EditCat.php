<?php 

class EditCat extends Controller {

    public function pageLogic(){
        $existCat=false;
        $userLogin=false;

        if(!User::getCurrentUser()){
            echo 'you need to login or registr';
            exit();
        } else {
            $userLogin = true;
            $user = User::getCurrentUser();
        }


        $catId = $_GET['id'];
        if($_GET['id']=='temp'){
            $image = 'pictures/temp.jpeg';
            $cat = new Cat;
            $cat->id = $cat->getLastId();
        } else {
            $cat = Cat::getById($catId);
            $image = $cat->image;
            $existCat = true;
        }

        if(isset($_POST['save'])){ //save data from form
            $cat->name = $_POST['name'];
            $cat->age = $_POST['age'];
            $cat->description = $_POST['description'];
            $cat->userId = $user->id;
            $cat->image = 'pictures/'.$cat->id.'.jpeg';
            $cat->save(); //add cat to array and save it
            header('Location: /userCats.php');
            exit();
        }

        if (isset($_POST['delete'])){
            unlink($this->image);
            $cat::delete($cat->id);
            header('Location: /userCats.php');
        }
    }
}

?>