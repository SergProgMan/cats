<?php
    function mainMenu($userLogin=false){
    echo '<ul>
    <li><a class="active" href="main.php">Home</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="registration.php">Registration</a></li>';
    if($userLogin){
        echo '  <li><a href="editUser.php">My profile</a></li>
                <li><a href="userCats.php">My cats</a></li>
                <li><a href="addCat.php">Add new cat</a></li>
                <li><a href="main.php?logout=true">LogOut</a></li>';
    }
    echo '</ul>';
    }

?>