<?php
include('Process.php');
$username= $_POST['username'];
$password= $_POST['password'];
$email= $_POST['email'];
$cpassword= $_POST['cpassword'];
$gender = $_POST['gender'];

if (!empty($username) || !empty($password) || !empty($email) || !empty($cpassword) || !empty($gender)) {
  if ($password == $cpassword) {
    $sqll = "INSERT INTO login(username, password, email) VALUES ('$username','$password','$email')";
    $res = mysqli_query($con, $sqll);
    $sql = "INSERT INTO profile VALUES ('','','','','','','','$email','','','','','','','')";
    $re = mysqli_query($con, $sql);
    if($res){
        header('Location:Login.php');
    }
    else{
        echo "<h1> Registration Unsuccessful</h1>";
    }

  }
  else {
    echo "<h1> Passwords do not match</h1>";
  }

}
else {
  echo "<h1> All fields are required</h1>";
}









 ?>
