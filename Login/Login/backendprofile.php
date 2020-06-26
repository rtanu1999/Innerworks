<?php

if(isset($_POST['submit'])){
    session_start();
     $companyName=$_POST['companyName'];
     $website=$_POST['website'];
     $contactPerson=$_POST['contactPerson'];
     $companyAddress=$_POST['companyAddress'];
     $city=$_POST['city'];
     $mobile=$_POST['mobile'];
     if(empty($_POST['state'])){
        $state=$_SESSION['states'];
     }else{
        $state=$_POST['state'];
     }
     if(empty($_POST['business'])){
        $business=$_SESSION['businesss'];
     }else{
        $business=$_POST['business'];
     }
     if(empty($_POST['experience'])){
        $experience=$_SESSION['experiences'];
     }else{
        $experience=$_POST['experience'];
     }
     $code=$_POST['code'];
     $key1=$_POST['key1'];
     $key2=$_POST['key2'];
    // echo $img_name=$_FILES['myFile']['size'];

         if(!empty($_FILES['myFile']['name'])){
            $img_name=$_FILES['myFile']['name'];
        $tmp_name = $_FILES['myFile']['tmp_name'];
        $upload = "image/".$img_name;
         move_uploaded_file($tmp_name,$upload);
         echo "file is uploaded";
         }else{
             echo $upload=$_SESSION['img'];
         }
        // $img_name=$_FILES['myFile']['name'];
        // $tmp_name = $_FILES['myFile']['tmp_name'];
        // $upload = "image/".$img_name;
        //  move_uploaded_file($tmp_name,$upload);
        
        
        
        

    echo $email=$_SESSION['email'];
    $con=mysqli_connect('localhost','innerwor_login','a0303#1998k','innerwor_login');
    $sqll =mysqli_query($con,"update profile set companyName='$companyName',website='$website',contactPerson='$contactPerson',companyAddress='$companyAddress',city='$city',mobile='$mobile',state='$state',code='$code',business='$business',experience='$experience',key1='$key1',key2='$key2',image='$upload' where email='$email'");
    // $res=mysqli_num_rows($sqll);
    
    if($sqll){
        if(move_uploaded_file($tmp_name,$upload)){
            echo "<script>alert('uploaded')</script>";
        }else{
            echo "<script>alert('fail')</script>";
        }
        header('Location:profile.php');
    }else{
        echo "not Sent";
    }
    
}




?>