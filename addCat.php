<?php
    require_once 'loader.php';
    require_once 'menu.php';

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
        $tempPath = $picture['tmp_name']; //temp path
        //$uploadDirPath = getcwd(); // get current path
        //$uploadDirPath = '/pictures';
        //var_dump($uploadDirPath);
        if(!file_exists($uploadDirPath)){
            mkdir('pictures');
        }
        
        $catId = 'temp'; //cat id
        $imageName = $catId.'.jpeg';
        $filePath = $uploadDirPath.'/'.$imageName;
       //var_dump($filePath);

       
        if(move_uploaded_file($tempPath, $filePath)){
           header('Location: /editCat.php?id='.$catId);
        }
        else{
            $messageLog .= 'Error while copy';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body>
<?php mainMenu($userLogin); ?>
    <?= $messageLog ?>
    <h1 style= "margin-top:50px;">Add cat image to upload</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name ="picture">
        <input type="submit" value="upload">    
    </form>    
</body>
</html>