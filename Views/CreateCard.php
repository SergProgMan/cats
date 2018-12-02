<?php 
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
        <p class="card-text"><small class="text-muted">'.$this->date.'</small>      
            <small class="text-success px-5"><b>'.$allLikes["likes"].'</b></small>  
            <small class="text-danger"><b>'.$allLikes["dislikes"].'</b></small>
            </p>
    </div>
    <form method="POST" class="card-footer">
        <button type="submit" class="btn btn-outline-success" name="like" value="'.$this->id.'">Cool</button>
        <button type="submit" class="btn btn-outline-danger" name="dislike" value="'.$this->id.'">Not cool</button>
    </form>
    </div>';
    if(UserCats::$canEdit){
        echo '<br><a href="editCat?id='.$this->id.'">Edit</a>';
    }
    echo '</div>';
    ?>