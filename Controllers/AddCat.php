<?php 

class AddCat extends Controller {

    public function pageLogic(){
        
        if(!static::$userLogin){
            echo 'you need to login or registr';
            exit();
        }
    
        if(isset($_FILES['picture'])){
            $picture = $_FILES['picture'];
            if($picture['error'] !== UPLOAD_ERR_OK){
                static::$message .= 'Error!';
                die();
            }
            $tempPath = $picture['tmp_name'];
            if(!file_exists('pictures')){
                mkdir('pictures');
            }
            
            $imageName = 'temp.jpeg';
            $filePath = 'pictures/'.$imageName;
                
            if(move_uploaded_file($tempPath, $filePath)){
               header('Location: /editCat?id=temp');
            }
            else{
                static::$message .= 'Error while copy';
            }
        }
    }
}

?>