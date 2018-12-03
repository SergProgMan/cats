<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
}
</style>    

</head>


<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index">Home</a>
      <a class="nav-item nav-link" href="login">Login</a>
      <a class="nav-item nav-link" href="registration">Registration</a>
      <!-- <a class="nav-item nav-link" href="top10">Top 10</a> -->
      <?php if(static::$userLogin){
        echo '
        <a class="nav-item nav-link" href="editUser">My profile</a>
        <a class="nav-item nav-link" href="userCats">My cats</a>
        <a class="nav-item nav-link" href="addCat">Add new cat</a>
        <a class="nav-item nav-link" href="?logout=true">LogOut</a>';} ?>
    </div>
  </div>
</nav>


