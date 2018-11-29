<?php 

class AddCat extends Controller {

    public function pageLogic(){
        $uploadDirPath = 'pictures';
    
        $messageLog = '';
       
        if(!User::getCurrentUser()){
            $messageLog .= 'you need to login or registr';
            exit();
        } else {
            $userLogin = true;
        }
    
        if(isset($_FILES['picture'])){
            $picture = $_FILES['picture'];
            if($picture['error'] !== UPLOAD_ERR_OK){
                $messageLog .= 'Error!';
                die();
            }
            $tempPath = $picture['tmp_name'];
            if(!file_exists($uploadDirPath)){
                mkdir('pictures');
            }
            
            $imageName = 'temp.jpeg';
            $filePath = $uploadDirPath.'/'.$imageName;
                
            if(move_uploaded_file($tempPath, $filePath)){
               header('Location: /editCat?id=temp');
            }
            else{
                $messageLog .= 'Error while copy';
            }
        }
    }
}

?>