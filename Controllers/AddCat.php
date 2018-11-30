<?php 

class AddCat extends Controller {

    public function pageLogic(){
        $uploadDirPath = 'pictures';
        
        if(!static::$userLogin){
            echo 'you need to login or registr';
            exit();
        }
    
        if(isset($_FILES[$uploadDirPath])){
            $picture = $_FILES[$uploadDirPath];
            if($picture['error'] !== UPLOAD_ERR_OK){
                static::$message .= 'Error!';
                die();
            }
            $tempPath = $picture['tmp_name'];
            if(!file_exists($uploadDirPath)){
                mkdir($uploadDirPath);
            }
            
            $imageName = 'temp.jpeg';
            $filePath = $uploadDirPath.'/'.$imageName;
                
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