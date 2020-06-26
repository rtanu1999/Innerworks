<?php
include "recruiterregistration.php";

if(isset($_GET["checkotp"])){
 //   echo "hii";
    $usr_otp=$_GET["otptxt"];
    if($usr_otp==$_SESSION["otp"]){
        
    //    alert("Correct otp");
        
        $_SESSION["fnvalue"]=1;
        registerUser();
        
    }
    else{
        echo "<br><br><h1 style='text-align:center;'>Invalid OTP</h1>";
    }
}

?>