<?php
include "DbConnection/DbConnectionHelper.php";
require 'PHPMailer/PHPMailerAutoload.php';
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
$mail = new PHPMailer();
include_once "WebUtils.php";
$utils = new WebUtils();

$result = $name = $gender = $companyName = $Designation = $email = $contactNumber = $Industry = $Location = $lookingService = "";
$mailSendToAdminJobSeeker = $mailSendToUserJobSeeker = false;

if(isset($_POST['submit'])) {
    if ($_POST['name'] != null && !empty($_POST['name'])) {
        if ($_POST['gender'] != null && !empty($_POST['gender'])) {
            if ($_POST['companyName'] != null && !empty($_POST['companyName'])) {
                if ($_POST['Designation'] != null && !empty($_POST['Designation'])) {
                    if ($_POST['email'] != null && !empty($_POST['email'])) {
                        if ($_POST['mobno'] != null && !empty($_POST['mobno']) && (strlen(($_POST['mobno'])) == 10)) {
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
                                $contactNumber = $_POST['mobno'];
                                $email = $_POST['email'];
                                $Industry = $_POST['Industry'];
                                $Location = $_POST['Location'];
                                $msg = $_POST['msg'];

                                // $adminEmail = 'info@innerworkindia.com';
                                $adminEmail = 'hr@innerworkindia.com';

                                //Admin Email
                                $mailSendToAdminJobSeeker = $utils->adminMailToJobSeeker1($mail, $name, $contactNumber, $email, $gender, $companyName,$Location,$Industry, $msg, $Designation);
                                if($mailSendToAdminJobSeeker)
                                {
                                    $mailSendToUserJobSeeker = $utils->userMailToJobSeeker($mail, $name, $email);
                                    if($mailSendToUserJobSeeker)
                                    {
                                        $stmt = $conn->prepare('insert into business (name, gender, companyName, Designation, email, mobno, lookingService, Industry, Location,msg) VALUES(?,?,?,?,?,?,?,?,?,?)');
                                        $stmt->bindParam(1, $name);
                                        $stmt->bindParam(2, $gender);
                                        $stmt->bindParam(3, $companyName);
                                        $stmt->bindParam(4, $Designation);
                                        $stmt->bindParam(5, $email);
                                        $stmt->bindParam(6, $mobno);
                                        $stmt->bindParam(7, $lookingService);
                                        $stmt->bindParam(8, $Industry);
                                        $stmt->bindParam(9, $Location);
                                        $stmt->bindParam(10, $msg);

                                        $stmt->execute();

                                        $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Thanks applying for Job, will get you back soon.</div>";
                                    }
                                }


                           } catch (PDOException $e) {
                                echo '{"error":{"text":' . $e->getMessage() . '}}';
                            }

                        }
                        else {
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please select your experience</div>";
                               }
                    }
                         else
                        {
                            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your Interest</div>";
                        }
                    } else
                        {
                            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your skills</div>";
                        }
                    }
                    else
                        {
                            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your Mobile Number.</div>";
                        }
                    }
                    else
                    {
                        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your Email Address.</div>";
                    }

                }
                else
                    {
                        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your Education.</div>";
                    }
                } else {
                    $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your City.</div>";
                }
            } else {
                $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your Gender.</div>";
            }
        } else {
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your Sweet Name.</div>";
        }

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
                                 <option value="1">HR Services</option>
                                 <option value="2">IT Services</option>
                                 <option value="3">Start Up Support</option>
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
                               <option value="1">HR Services</option>
                               <option value="2">IT Services</option>
                               <option value="3">Start Up Support</option>
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
                            <textarea name="name" rows="8" id="field" cols="95" name="msg"></textarea>
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
                       <input type="submit" name="submit" value="submit"  class="form-control" />
                   </form>
               </div>
           </div>
       </div>
   </div>
</section>
<?php include_once 'Footer.php'; ?>
</body>
</html>
