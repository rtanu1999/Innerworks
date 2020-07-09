<?php
include "DbConnection/DbConnectionHelper.php";
require 'PHPMailer/PHPMailerAutoload.php';
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
$mail = new PHPMailer();
include_once "WebUtils.php";
$utils = new WebUtils();

$result = $name = $gender = $companyName = $Designation = $email = $mobno = $Industry = $Location = $lookingService = $msg = "";


if(isset($_POST['submit'])) {
    if ($_POST['name'] != null && !empty($_POST['name'])) {
        if ($_POST['gender'] != null && !empty($_POST['gender'])) {
            if ($_POST['companyName'] != null && !empty($_POST['companyName'])) {
                if ($_POST['Designation'] != null && !empty($_POST['Designation'])) {
                    if ($_POST['email'] != null && !empty($_POST['email'])) {
                        if ($_POST['mobno'] != null && !empty($_POST['mobno'])) {
                            if ($_POST['Industry'] != null && !empty($_POST['Industry'])) {
                                if ($_POST['Location'] != null && !empty($_POST['Location'])) {
                                     if ($_POST['lookingService'] != null && !empty($_POST['lookingService'])) {
                                        if ($_POST['msg'] != null && !empty($_POST['msg'])) {



                            try {
                               // $uploadFolder = "Resume";
                                    // $folder_name = $uploadFolder."/".$fname.$fathername.$dob;


                                    // $photopath = mkdir($folder_name);
                                   // foreach ($_FILES['attach1']['tmp_name'] as $key => $image) {
                                   //         $imageTmpName = $_FILES['attach1']['tmp_name'][$key];
                                    //        $imageName = $_FILES['attach1']['name'][$key];
                                    //        $final_path = $uploadFolder."/".$imageName;
                                    //        $result = move_uploaded_file($imageTmpName,$final_path);

                                   // }

                                // $file = "Resume/".$_FILE['file']['name'];
                                // move_uploaded_file($_FILE['file']['tmp_name'],"../Resume/".$_FILE['file']['name']);


                                $name = $_POST['name'];
                                $gender = $_POST['gender'];
                                $companyName = $_POST['companyName'];
                                $Designation = $_POST['Designation'];
                                  $email = $_POST['email'];
                                $mobno = $_POST['mobno'];
                                $Industry = $_POST['Industry'];
                                $Location = $_POST['Location'];
                                $lookingService = $_POST['lookingService'];
                                $msg = $_POST['msg'];

                                // $adminEmail = 'info@innerworkindia.com';
                               

                                //Admin Email
                                
                                
                                    if(isset($_POST["submit"]))
                                    {
                                        $stmt = $conn->prepare('insert into bussiness (name, gender, companyName, Designation, email, mobno,Industry, Location, lookingService, msg) VALUES(?,?,?,?,?,?,?,?,?,?)');
                                        $stmt->bindParam(1, $name);
                                        $stmt->bindParam(2, $gender);
                                        $stmt->bindParam(3, $companyName);
                                        $stmt->bindParam(4, $Designation);
                                        $stmt->bindParam(5, $email);
                                        $stmt->bindParam(6, $mobno);
                                        $stmt->bindParam(7, $Industry);
                                        $stmt->bindParam(8, $Location);
                                        $stmt->bindParam(9, $lookingService);
                                        $stmt->bindParam(10, $msg);

                                        $stmt->execute();
                                         sendmail();
                                        $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Thanks applying for Job, will get you back soon.</div>";

                                    }
                                


                           } catch (PDOException $e) {
                                echo '{"error":{"text":' . $e->getMessage() . '}}';
                            }

                        }
                        else {
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please enter your name</div>";
                               }
                    } else
                        {
                            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please select gender</div>";
                        }
                    } else
                        {
                            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter company name</div>";
                        }
                    }else
                        {
                            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your designation.</div>";
                        }
                    }else
                    {
                        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your Email Address.</div>";
                    }

                }  else
                    {
                        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your mobile.</div>";
                    }
                } else {
                    $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your industry.</div>";
                }
            } else {
                $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your Location.</div>";
            }
        } else {
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter lookingservice.</div>";
        }

    }else {
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your msg.</div>";
        }

    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employer Portal- Innerwork | Search candidates in Bangalore | </title>
    <?php include "CommonFiles.php"?>
    <link rel="stylesheet" href="css/job.css">
    <link rel="stylesheet" href="css/collage.css">
    <style>
    @media (max-width: 768px){
.formJob input[type="submit"] {

    margin-left: 80px !important;
}
}
</style>
</head>
<body>
<?php include_once 'Header.php'; ?>


<section id="banner">
    <div class="container">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <h2>Business Enquiry </h2>
            <p><a href="index">Home</a> <span>/</span> Business Enquiry</p>
        </div>
    </div>
</section>


<section id="jobApplication">
   <div class="container" style="background-color:#f9f9f9;margin-top: -39px; width: 100%;">
       <div class="row formDetail">
         <h2>Business Enquiry</h2>
           <div class="col-md-12">
             <div id="employerFormSubmitResult"></div>
               <div id="twoD">
                 <?php echo $result; ?>
                   <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" class="formJob" style="border: 2px solid #999;padding: 2%;width:90%;margin-left: 5%;" enctype="multipart/form-data" >
                       <p><b style="color:red;">*</b> BUSINESS Information</p>
                         <hr>
                        <div class="row">
                           <div class="col-md-6">
                               <label for="Name"> Name</label>
                               <input type="text" name="name"id="field"  class="form-control" required>
                           </div>
                           <div class="col-md-6">
                               <label for="companyname">Company Name</label>
                               <input type="text" name="companyName" id="field" class="form-control" required>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-6">
                               <label for="contactPerson">Designation</label>
                               <input type="text" name="Designation" id="field" class="form-control" required>
                           </div>
                           <div class="col-md-6">
                               <label for="emailAddress">Email Address</label>
                               <input type="email" name="email" id="field" class="form-control" required>
                           </div>

                       </div>
                       <div class="row">
                         <div class="col-md-6">
                             <label for="">Which Service You are Looking For</label>
                             <select name="lookingService" id="field" class="form-control" onchange="return getDetails(this.value)" required>
                                 <option selected disabled>Interested In</option>
<<<<<<< HEAD
                                 <option value="HR Services">HR Services</option>
                                 <option value="IT Services">IT Services</option>
                                 <option value="StartUp Support">StartUp Support</option>
                                  <option value="Digital Marketing">Digital Marketing</option>
                                   <option value="Certifications">Certifications</option>
                                    <option value="Training">Training</option>
                                     <option value="Placement">Placement</option>
                                      <option value="Internship">Internship</option>
                                       <option value="Webinars">Webinars</option>
                                        <option value="Conferences">Conferences</option>
=======
                                 <option value="1">HR Services</option>
                                 <option value="2">IT Services</option>
                                 <option value="3">Start Up Support</option>
                                 <option value="4">Certifications</option>
                                 <option value="5">Training</option>
                                 <option value="6">Placement</option>
                                 <option value="7">Internship</option>
                                 <option value="8">Webinars</option>
                                 <option value="9">Conference</option>
>>>>>>> 19d540e559a24dda39027952c69b2c52913498b6
                             </select>
                         </div>
                         <div class="col-md-6">
                             <label for="emailAddress">Phone Number</label>
                             <input type="text" name="mobno" id="field" pattern="[0-9]{10}" maxlength="10" class="form-control" required>
                         </div>


                       </div>
                       <div class="row">
                         <div class="col-md-6">
                           <label for="emailAddress">Industry</label>
                           <select name="Industry" id="field" class="form-control" onchange="return getDetails(this.value)" required>
                               <option selected disabled> Industry</option>
<<<<<<< HEAD
                               <option value="Individual">Individual</option>
                               <option value="Organization">Organization</option>
                               <option value="Consultant">Consultant</option>

=======
                               <option value="1">Individual</option>
                               <option value="2">Organization</option>
>>>>>>> 19d540e559a24dda39027952c69b2c52913498b6
                           </select>
                         </div>
                         <div class="col-md-6">
                             <label for="emailAddress">Location</label>
                             <input type="text" id="field" name="Location" id="emailAddress" class="form-control" required>
                         </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for="Messsage">Write Us!</label>
                            <textarea rows="3" id="field" style="width:100%;" name="msg"></textarea>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <label for="FindUs">How did You Find Us</label>
                          <select name="gender" class="form-control" required="required" id="field" >
                            <option  value="">Select</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Twitter">Twitter</option>
                            <option value="LinkedIn">LinkedIn</option>
                            <option value="Others">Others</option>
                              </select>
                          </div>
                      </div>
                       <input type="submit" name="submit" value="submit"  class="form-control" style="margin-top :13px;"/>
                   </form>
               </div>
           </div>
       </div>
   </div>
</section>
<?php include_once 'Footer.php'; ?>
</body>
</html>

<?php

function sendmail(){
             $name = $_POST['name'];
              $Designation = $_POST['Designation'];
              $lookingService = $_POST['lookingService'];
                 $Industry = $_POST['Industry'];
                                $companyName = $_POST['companyName'];
                                $Location = $_POST['Location'];
                                
                                
                $email= $_POST['email'];
             $mail = new PHPMailer();
            $body = "<div style='background-color:#ffcc00;height:5%;margin-bottom:5px;'>". "<br/>". "<center><h2 style='color:black;'>Thanks for your Business Enquiry," .$name. "</h2></center>" ."<br/>"."</div>";

            $body .="<table style='font-family:Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%;'>
                        <tr style='tr:nth-child(even){background-color: #f2f2f2;'>
                          <th style='border: 1px solid #ddd;adding: 8px; padding-top: 12px;padding-bottom: 12px;text-align: left;background-color:  #999999;color: white;'>Name</th>
                          <th style='border: 1px solid #ddd;adding: 8px; padding-top: 12px;padding-bottom: 12px;text-align: left;background-color:  #999999;color: white;'>Designation</th>
                          <th style='border: 1px solid #ddd;adding: 8px; padding-top: 12px;padding-bottom: 12px;text-align: left;background-color:  #999999;color: white;'>Interested in</th>
                          <th style='border: 1px solid #ddd;adding: 8px; padding-top: 12px;padding-bottom: 12px;text-align: left;background-color:  #999999;color: white;'>Industry</th>
                          <th style='border: 1px solid #ddd;adding: 8px; padding-top: 12px;padding-bottom: 12px;text-align: left;background-color:  #999999;color: white;'>Company Name</th>
                          <th style='border: 1px solid #ddd;adding: 8px; padding-top: 12px;padding-bottom: 12px;text-align: left;background-color:  #999999;color: white;'>Location</th>
                        </tr>
                        <tr style='tr:nth-child(even){background-color: #f2f2f2;''>
                          <td style='border: 1px solid #ddd;adding: 8px;'>".$name."</td>
                          <td style='border: 1px solid #ddd;adding: 8px;'>".$Designation."</td>
                          <td style='border: 1px solid #ddd;adding: 8px;'>".$lookingService."</td>
                          <td style='border: 1px solid #ddd;adding: 8px;'>".$Industry."</td>
                          <td style='border: 1px solid #ddd;adding: 8px;'>".$companyName."</td>
                          <td style='border: 1px solid #ddd;adding: 8px;'>".$Location."</td>
                        </tr>
                        

                      </table>"."<br>";
            $body .= "Kindly contact us for any further query at +91 9487980784 or info@innerworkindia.com Visit us: www.innerworkindia.com";

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
              echo "<center><br><h1>Registered Successfully</h1><br></center>";
              
            }




}
?>