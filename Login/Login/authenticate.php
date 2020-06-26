<?php
if(isset($_POST['login'])){


session_start();
include('Process.php');
   $username = $_POST['username'];
   $password = $_POST['password'];
   if(empty($_POST['check'])){
       $check="";
   }else{
       $check=$_POST['check'];
   }
    $_SESSION['email']=$username;
       //to prevent from mysqli injection
       $username = stripcslashes($username);
       $password = stripcslashes($password);
       $username = mysqli_real_escape_string($con, $username);
       $password = mysqli_real_escape_string($con, $password);

       $sql = "select *from login where username = '$username' and password = '$password'";
       $result = mysqli_query($con, $sql);
       $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
       $count = mysqli_num_rows($result);
        if($check==1){
            setcookie("Username",$username,time()+(38400*30)+"/");
            setcookie("Password",$password,time()+(38400*30)+"/");
        }else{
            setcookie("Username","");
            setcookie("Password","");
        }
        if(isset($_COOKIE["Username"])){
          echo $user= $_COOKIE["Username"];
        }else{
            echo "Username is blank";
        }
        if(isset($_COOKIE["Password"])){
            echo $pass= $_COOKIE["Password"];
          }else{
              echo "Password is blank";
          }
       if($count == 1){
           header('Location:profile.php');
       }
       else{
           echo "<h1> Login failed. Invalid username or password.</h1>";
       }

    }

 ?>
