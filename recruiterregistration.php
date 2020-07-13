       
<script src="https://kit.fontawesome.com/62c6b753c2.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<?php

include_once 'DbConnection/DbConnectionHelper.php';

require 'PHPMailer/PHPMailerAutoload.php';
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
session_start();



if(isset($_POST["submit"])){
    $_SESSION["val_flag"]=1;
    $_SESSION["fnvalue"]=0;
    setsession();
    sendotp();
}





function registerUser(){

    global $conn;

    if($_SESSION["fnvalue"]==1){
        $companyname= $_SESSION["cn"];
        $website= $_SESSION["wb"];
        $mobile= $_SESSION["mob"];
        $address= $_SESSION["add"];
        $state= $_SESSION["st"];
        $city= $_SESSION["ct"];
        $postcode= $_SESSION["pc"];
        $contactperson= $_SESSION["cp"];
        $email= $_SESSION["em"];
        $password= $_SESSION["pass"];
        $noofstaffs= $_SESSION["noofstff"];
        $noofoffices= $_SESSION["noofoff"];
        $noofplacements= $_SESSION["placemnt"];
        $fullname= $_SESSION["fn"];
        $privacy= $_SESSION["privacy"];
        $terms= $_SESSION["terms"];
        $submit= $_SESSION["sbmit"];
        $type= $_SESSION["type"];
        $experience=$_SESSION["exp"];
        $keyword=$_SESSION["key"];
        $comment=$_SESSION["com"];
        $sector=$_SESSION["sec"];
        $_FILES['file']['name']=$_SESSION["imgname"];
        $d=$_SESSION["d"];
        $_FILES['file']['tmp_name']=$_SESSION["tmpnm"];




           $name=$_FILES['file']['name'];
            $target_dir="upload/";
            $target_file=$target_dir . basename($_FILES["file"]["name"]);
            $imagefiletype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $extensions_arr=array("jpg","jpeg","png","gif");
            if(in_array($imagefiletype,$extensions_arr)){


                  if($type == "agency"){
                     $stmt = $conn->prepare('INSERT INTO agency (companyname,website,mobile,address,state,city,postcode,contactperson,email,password,noofstaffs,noofoffices,noofplacements,privacy,terms,comment,sector,experience,keyword,image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
                                                    $stmt->bindParam(1, $companyname);
                                                    $stmt->bindParam(2, $website);
                                                    $stmt->bindParam(3, $mobile);
                                                    $stmt->bindParam(4, $address);
                                                    $stmt->bindParam(5, $state);
                                                    $stmt->bindParam(6, $city);
                                                    $stmt->bindParam(7, $postcode);
                                                    $stmt->bindParam(8, $contactperson);
                                                    $stmt->bindParam(9, $email);
                                                    $stmt->bindParam(10, $password);
                                                    $stmt->bindParam(11, $noofstaffs);
                                                    $stmt->bindParam(12, $noofoffices);
                                                    $stmt->bindParam(13, $noofplacements);
                                                    $stmt->bindParam(14, $privacy);
                                                    $stmt->bindParam(15, $terms);
                                                    $stmt->bindParam(16, $comment);
                                                    $stmt->bindParam(17, $d);
                                                    $stmt->bindParam(18, $experience);
                                                    $stmt->bindParam(19, $keyword);
                                                    $stmt->bindParam(20, $name);

                       $stmt->execute();
                    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                      sendmail();
               //    header ('location:recruiterlogin.php');

                    }


                else{
                    $stmt=$conn->prepare('INSERT INTO freelancer (companyname,website,mobile,address,state,city,postcode,contactperson,email,password,noofstaffs,noofoffices,noofplacements,privacy,terms,comment,sector,experience,keyword,image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
                                                    $stmt->bindParam(1, $companyname);
                                                    $stmt->bindParam(2, $website);
                                                    $stmt->bindParam(3, $mobile);
                                                    $stmt->bindParam(4, $address);
                                                    $stmt->bindParam(5, $state);
                                                    $stmt->bindParam(6, $city);
                                                    $stmt->bindParam(7, $postcode);
                                                    $stmt->bindParam(8, $contactperson);
                                                    $stmt->bindParam(9, $email);
                                                    $stmt->bindParam(10, $password);
                                                    $stmt->bindParam(11, $noofstaffs);
                                                    $stmt->bindParam(12, $noofoffices);
                                                    $stmt->bindParam(13, $noofplacements);
                                                    $stmt->bindParam(14, $privacy);
                                                    $stmt->bindParam(15, $terms);
                                                    $stmt->bindParam(16, $comment);
                                                    $stmt->bindParam(17, $d);
                                                    $stmt->bindParam(18, $experience);
                                                    $stmt->bindParam(19, $keyword);
                                                    $stmt->bindParam(20, $name);

                    $stmt->execute();
                    move_uploaded_file($FILES['file']['tmp_name'],$target_dir.$name);
                    sendmail();

             //       header ('location:recruiterlogin.php');

                    }
    }
    }
    else{
        $companyname= $_POST['companyname'];
        $website= $_POST['website'];
        $mobile= $_POST['mobile'];
        $address= $_POST['address'];
        $state= $_POST['state'];
        $city= $_POST['city'];
        $postcode= $_POST['postcode'];
        $contactperson= $_POST['contactperson'];
        $email= $_POST['email'];
        $password= $_POST['password'];
        $noofstaffs= $_POST['noofstaffs'];
        $noofoffices= $_POST['noofoffices'];
        $noofplacements= $_POST['noofplacements'];
        $fullname= $_POST['fullname'];
        $privacy= $_POST['privacy'];
        $terms= $_POST['terms'];
        $submit= $_POST['submit'];
        $type= $_POST['type'];
        $experience=$_POST['experience'];
        $keyword=$_POST['keyword'];
        $comment=$_POST['comment'];
        $d="";
        $sector=$_POST["ssector"];
        $d=implode($sector);




    }

}






function sendmail(){
            if($_SESSION["fnvalue"]==1){
                $email= $_SESSION["em"];
            }
            else{
                $email= $_POST['email'];
            }
             $mail = new PHPMailer();
            $body = "Hello, ". "<br/>". " Welcome to Innerwork and thanks for registering with us. Admin will contact you soon." .  "<br/>";
            $body .= "Kindly contact us for any further query at +91 9487980784 or info@innerworkindia.com Visit us: www.innerworkindia.com<br><br>";
            $body.="<div style='height:40px;width:auto;background-color:#e6e6e6;'></div><center><h1>Account Registered Successfully</h1><br><br><button style='background-color: #008CBA;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;'><a href='https://innerworkindia.com/recruiterlogin.php' style='color:white;text-decoration:none;'>Login</a></button></center><br><div style='height:120px;width:auto;background-color:#008CBA;'><br><center><p style='color:white;'>2019 	&#xa9; Innerwork. All Rights Reserved</p></center><br><span></span>
            <center><a href='https://www.facebook.com/InnerworkSolution/'><img src='fb.png' style='margin-right:1%;'></a><a href='https://twitter.com/innverwork'><img src='insta.png' style='margin-right:1%;'></a><a href='https://www.linkedin.com/company/innerworksolutions/'><img src='linkedn.png' style='margin-right:1%;'></a></center></div><div style='height:30px;width:auto;background-color:#e6e6e6;'>
            </div>";
              
            $mail->IsSMTP();
            $mail->Host = "mail.innerworkindia.com";
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
           //  $mail->SMTPDebug  = 1;
            $mail->SMTPAuth = true;
            $mail->Username = "response@innerworkindia.com";
            $mail->Password = "Digital@inner#123";

            $mail->From = "response@innerworkindia.com";
            $mail->FromName = "Innerwork Solutions";
            $mail->AddAddress($email);

            $mail->IsHTML(true);                                  // set email format to HTML

            $mail->Subject = "Thanks For submitting your details to Innerwork";
            $mail->Body    = $body;
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

            if(!$mail->Send()) {
              echo "Error while sending Email.";
              var_dump($mail);
            } else {
              echo "<center><br><h1>Account Successfully Registered</h1><br><button style='background-color: #008CBA;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;'><a href='recruiterlogin.php' style='color:white;text-decoration:none;'>Login</a></button></center>";

            }




}

function generateotp(){
    $value='';
    $length = 1;
    for($i=0;$i<4;$i++){
        $val=rand(0,9);
        $value.=$val;
        $randomletter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        $value.=$randomletter;
    }
    $_SESSION['otp']=$value;
    $_SESSION['starttime']=time();
    return $value;
}



function sendotp(){

            $otp=generateotp();
             $mail = new PHPMailer();
            $body = "Hello, your opt is ".$otp;

            if($_SESSION["fnvalue"]==1){
                $email= $_SESSION["em"];
            }
            else{
                $email= $_POST['email'];
            }
            $mail->IsSMTP();
            $mail->Host = "mail.innerworkindia.com";
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
           //  $mail->SMTPDebug  = 1;
            $mail->SMTPAuth = true;
            $mail->Username = "response@innerworkindia.com";
            $mail->Password = "Digital@inner#123";

            $mail->From = "response@innerworkindia.com";
            $mail->FromName = "Innerwork Solutions";
            $mail->AddAddress($email);

            $mail->IsHTML(true);                                  // set email format to HTML

            $mail->Subject = "Account activation";
            $mail->Body    = $body;
         //   $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

            if(!$mail->Send()) {
              echo "Error while sending Email.";
              var_dump($mail);
            } else {

              echo "<center><br><h2>OTP has been sent to your email !</h2><br><form action ='emailverification.php' type='POST'><input type='text' name='otptxt' placeholder='Enter OTP'><br><br><button name='checkotp' type='submit'> OK </button></form</center>";


            }


}




function setsession(){
    $_SESSION["cn"]= $_POST['companyname'];
    $_SESSION["wb"]= $_POST['website'];
    $_SESSION["mob"]= $_POST['mobile'];
    $_SESSION["add"]= $_POST['address'];
    $_SESSION["st"]= $_POST['state'];
    $_SESSION["ct"]= $_POST['city'];
    $_SESSION["pc"]= $_POST['postcode'];
    $_SESSION["cp"]= $_POST['contactperson'];
    $_SESSION["em"]= $_POST['email'];
    $_SESSION["pass"]= $_POST['password'];
    $_SESSION["noofstff"]= $_POST['noofstaffs'];
    $_SESSION["noofoff"]= $_POST['noofoffices'];
    $_SESSION["placemnt"]= $_POST['noofplacements'];
    $_SESSION["fn"]= $_POST['fullname'];
    $_SESSION["privacy"]= $_POST['privacy'];
    $_SESSION["terms"]= $_POST['terms'];
    $_SESSION["sbmit"]= $_POST['submit'];
    $_SESSION["type"]= $_POST['type'];
    $_SESSION["exp"]=$_POST['experience'];
    $_SESSION["key"]=$_POST['keyword'];
    $_SESSION["com"]=$_POST['comment'];
    $_SESSION["sec"]=$_POST["ssector"];
    $_SESSION["imgname"]=$_FILES['file']['name'];
    $d=implode($_SESSION["sec"]);
    $_SESSION["d"]=$d;
    $_SESSION["tmpnm"]=$_FILES['file']['tmp_name'];
}


function getsession(){

}

?>
