<?php
$host ="localhost";
  $user = "innerwor_login";
  $password = "a0303#1998k";
 $db_name = "innerwor_login";
  

$con = mysqli_connect($host, $user, $password,$db_name);
    if(mysqli_connect_errno()) {
        die("Failed to connect with MySQL: ". mysqli_connect_error());
    }

 
?>
