 <?php
 
 require_once 'db.php';
 
 echo "<pre>";
 print_r($_SESSION);
 echo "</pre>";
 
 if (isset($_SESSION['user'])) { // if you are login
     echo "Welcome ". $_SESSION['user']['name']. "!";
     echo 'You may <a href="logout.php">Logout</a>'.' or <a href="articleaddedit.php">post an article</a>';
     
 } else {
     echo "You are not logger in.";
     echo '<a href="login.php">Login</a> or <a href="register.php">Register</a>';
     
 }
        
  