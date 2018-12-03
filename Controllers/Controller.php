<?php 

class Controller extends Database {

    public static $userLogin = false;
    public static $curUser;

    public static $message ='';


    public static function checkAuth(){
        if(isset($_GET['logout'])){
            setcookie("user_token", "", time()-3600);
            //echo "logout";
            header('Location: /index');
        }
        if(User::getCurrentUser()){
            static::$curUser = User::getCurrentUser();
            return static::$userLogin = true;
        }
        
        //echo "not auth";
    }
    public static function checkLikes(){
        //var_dump(static::$userLogin);
        //var_dump($_POST);
        if(static::$userLogin){
            //var_dump($_POST);
            if(isset($_POST['like'])){
                $catId = $_POST['like'];
                $like=static::checkUserCanLikeOrDislike($catId);
                if($like->canLike){                    
                    $like->likeValue = 'like';
                    if($like->isNew){
                        $like->userId = static::$curUser->id;
                        $like->catId = $catId;
                        $like->save();
                    } else{
                        $like->save();
                    }
                }
            } else if (isset($_POST['dislike'])){
                $catId = $_POST['dislike'];
                $like =static::checkUserCanLikeOrDislike($catId);
                if($like->canDislike){                    
                    $like->likeValue = 'dislike';
                    if($like->isNew){
                        $like->userId = static::$curUser->id;
                        $like->catId = $catId;
                        $like->save();
                    } else{
                        $like->save();
                    }
                }

            }
        }
    }

  

    public static function checkUserCanLikeOrDislike($catId){
        
        if(!static::$userLogin){
            return false;
        }
        $userId = static::$curUser->id;
        $like = Like::query("SELECT * FROM likes WHERE userId=$userId AND catId=$catId");
        //var_dump($like);
        if($like){   //if find, check if likeValue==like
            $like->isNew = false;
            if($like->likeValue == 'like'){ //if find -> canDislike
                $like->canDislike = true;
                return $like;
            } else { // else canLike
                $like->canLike = true;
                return $like;
            } 
        } else { // else canLike or dislike
            $like = new Like;
            $like->canLike = true;
            $like->canDislike = true;
            return $like;
        }
    }

    public static function getAllLikes($catId){
        $allLikes = [
            'likes' => 0,
            'dislikes' => 0
        ];

        $res = Like::query("SELECT * FROM likes WHERE catId=$catId");
        //var_dump($res);
        if(gettype($res) != 'array'){ // if get 1 object
            if($res->likeValue == 'like'){
                $allLikes['likes'] ++;
            } else {
                $allLikes['dislikes'] ++;
            }
        } else if (count($res)>1) {             //if get array
            foreach($res as $like){
                if($like->likeValue == 'like'){
                    $allLikes['likes'] ++;
                } else {
                    $allLikes['dislikes'] ++;
                }
            }
        }
        return $allLikes;
    }


    public static function CreateView($viewName){
       //var_dump($_POST);
        self::checkAuth();
        static::checkLikes();
        static::pageLogic();
        require_once("./Views/Menu.php");
        require_once("./Views/$viewName.php");
    }


    


}

?>