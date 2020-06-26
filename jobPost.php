<style>
/* Include the padding and border in an element's total width and height */
* {
  box-sizing: border-box;
}
/* Clear floats after the header */
.header:after {
  content: "";
  display: table;
  clear: both;
}

</style>
<?php
include "DbConnection/DbConnectionHelper.php";

require 'PHPMailer/PHPMailerAutoload.php';
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
$mail = new PHPMailer();

include_once "WebUtils.php";
$utils = new WebUtils();

$result = $jobTitle = $company = $email = $jobType = $location = $minSalary = $maxSalary = $cpname = $cpnum = $j_desc = $exp = $education = $status = "";
$mailSendToAdminJobPost = $mailSendToUserJobPost = false;

if(isset($_POST['submit'])) {
    if ($_POST['jobTitle'] != null && !empty($_POST['jobTitle'])) {
        if ($_POST['company'] != null && !empty($_POST['company'])) {
            if ($_POST['email'] != null && !empty($_POST['email'])) {
                if ($_POST['jobType'] != null && !empty($_POST['jobType'])) {
                    if ($_POST['location'] != null && !empty($_POST['location'])) {
                        if ($_POST['minSalary'] != null && !empty($_POST['minSalary'])) {
                            if ($_POST['maxSalary'] != null && !empty($_POST['maxSalary'])) {
                                if ($_POST['cpname'] != null && !empty($_POST['cpname'])) {
                                    if ($_POST['cpnum'] != null && !empty($_POST['cpnum']) && (strlen(($_POST['cpnum'])) == 10)) {
                                        if ($_POST['j_desc'] != null && !empty($_POST['j_desc'])) {
                                            if ($_POST['exp'] != null && !empty($_POST['exp'])) {
                                                if ($_POST['education'] != null && !empty($_POST['education'])) {
                                            
                                        
                                        try {
                                            $jobTitle = $_POST['jobTitle'];
                                            $company = $_POST['company'];
                                            $email = $_POST['email'];
                                            $jobType = $_POST['jobType'];
                                            $location = $_POST['location'];
                                            $minSalary = $_POST['minSalary'];
                                            $maxSalary = $_POST['maxSalary'];
                                            $cpname = $_POST['cpname'];
                                            $cpnum = $_POST['cpnum'];
                                            $j_desc = $_POST['j_desc'];
                                            $exp = $_POST['exp'];
                                            $education = $_POST['education'];
                                     
                                            $status = false;

                                            //Admin Email
                                            $mailSendToAdminJobPost = $utils->adminMailToJobPost($cpname, $cpnum, $email, $company, $jobTitle, $mail, $j_desc, $exp, $education);
                                            if($mailSendToAdminJobPost)
                                            {
                                                //User mail
                                                $mailSendToUserJobPost = $utils->userWelcomeMailToJobPost($cpname, $email, $mail);
                                                if($mailSendToUserJobPost)
                                                {
                                                    $stmt = $conn->prepare('insert into jobpost (jobTitle, company, email, jobType, location, minSalary, maxSalary, cpname, cpnum, j_desc, status, exp, education) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
                                                    $stmt->bindParam(1, $jobTitle);
                                                    $stmt->bindParam(2, $company);
                                                    $stmt->bindParam(3, $email);
                                                    $stmt->bindParam(4, $jobType);
                                                    $stmt->bindParam(5, $location);
                                                    $stmt->bindParam(6, $minSalary);
                                                    $stmt->bindParam(7, $maxSalary);
                                                    $stmt->bindParam(8, $cpname);
                                                    $stmt->bindParam(9, $cpnum);
                                                    $stmt->bindParam(10, $j_desc);
                                                    $stmt->bindParam(11, $status);
                                                     $stmt->bindParam(12, $exp);
                                                      $stmt->bindParam(13, $education);
                                                    
                                                    $stmt->execute();

                                                    $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Thanks  for posting Job, will get you back soon.</div>";
                                                }
                                            }

                                        } catch (PDOException $e) {
                                            echo '{"error":{"text":' . $e->getMessage() . '}}';
                                        }
                                    }else {
                                        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter the education required</div>";
                                    }
                                }else {
                                        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter your experience</div>";
                                    }
                                }else {
                                        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter job description</div>";
                                    }
                                }else {
                                        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Contact Person Number.</div>";
                                    }
                                } else {
                                    $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Contact Person Name.</div>";
                                }
                            } else {
                                $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Maximum Salary.</div>";
                            }
                        } else {
                            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Minimum Salary.</div>";
                        }
                    } else {
                        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Your Company Location.</div>";
                    }
                } else {
                    $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Job Type.</div>";
                }

            } else {
                $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Email Address.</div>";
            }
        } else {
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Company Name.</div>";
        }
    } else {
        $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter Job Title.</div>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Post- Innerwork | Employer Portal | Recruiter zone | Job post in bangalore</title>
    <?php include "CommonFiles.php"?>
    <link rel="stylesheet" href="css/job.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--<style>
#tags {
  float: left;
  border: 1px solid #ccc;
  padding: 4px;
  font-family: Arial;
}

#tags span.tag {
  cursor: pointer;
  display: block;
  float: left;
  color: #555;
  background: #add;
  padding: 5px 10px;
  padding-right: 30px;
  margin: 4px;
}

#tags span.tag:hover {
  opacity: 0.7;
}

#tags span.tag:after {
  position: absolute;
  content: "×";
  border: 1px solid;
  border-radius: 10px;
  padding: 0 4px;
  margin: 3px 0 10px 7px;
  font-size: 10px;
}

#tags input {
  background: #eee;
  border: 0;
  margin: 4px;
  padding: 7px;
  width: auto;
}
</style>--->
<style>
.formJob label {
    font-family: revert;
    font-size: 12px;
    color: white;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: bold;
    display: block;
}
</style>
</head>
<body>
<?php include_once 'Header.php'; ?>

<section id="banner">
    <div class="container">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <h2>Job Post</h2>
            <p><a href="index">Home</a> <span>/</span>Job post</p>
        </div>
    </div>
</section>

<section id="jobApplication">
<div class="container" style="background-color:#f9f9f9;margin-top: -39px; width: 100%;">
        <div class="row formDetail">
            <h2>&nbsp;&nbsp;&nbsp;Job Post- Employer Portal</h2>
            <p style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Who is looking for candidates like Company, Freelancer, Recruiter can post their jobat Innerwork Employer Portal. We would be glad to assist you!</p>
            <div class="col-md-12">
                <div id="formSubmissionResult">
                </div>
                        <div id="oneD">
                            
                            <?php echo $result; ?>
                            <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" class="formJob" style="border: 2px solid #999;padding: 2%;width:90%;margin-left: 5%;" enctype="multipart/form-data">
                                     <div id="employerFormSubmitResult"></div>
                                        <p><b style="color:red;">*</b>Details</p>
						<hr>
                                 <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="company" style="color:#000;">Company</label>
                                        <input type="text" name="company" id="field" class="form-control" required="required">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jobTitle" style="color:#000;">Job Title</label>
                                        <input type="text" name="jobTitle" id="field" class="form-control" required="required">
                                    </div>
                                    </div>
                                    <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="email" style="color:#000;">Email</label>
                                        <input type="email" name="email" id="field" class="form-control" required="required">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jobType" style="color:#000;">Job Type</label>
                                        <select name="jobType" class="form-control" required="required" id="field">
                                            <option value="Fresher">Fresher</option>
                                            <option value="Experience">Experience</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="location" style="color:#000;">Location</label>
                                        <input type="text" name="location" id="field" class="form-control" required="required">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="salary" style="color:#000;">Salary Range</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" id="field" name="minSalary" id="minSalary" placeholder="&nbsp; ₹ Minimum" class="form-control" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="field" name="maxSalary" id="maxSalary" placeholder="&nbsp; ₹ Maximum" class="form-control" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="cpname" style="color:#000;">Contact Person Name</label>
                                        <input type="text" name="cpname" id="field" class="form-control" required="required">
                                    </div>  <div class="col-md-6">
                                        <label for="cpnum" style="color:#000;">Contact Person Number</label>
                                        <input type="text" name="cpnum" id="field" class="form-control" required="required">
                                    </div></div>
                                     <div class="row form-group">
                                 
                                    <div class="col-md-6"  > 
                                      <div class="row form-group" style="margin-left:1%;width:99%">
                                        <label for="education" style="color:#000;">Education Required</label>
                                        <input type="text" name="education" id="field" class="form-control" required="required">
                                    </div>
                                      <div class="row form-group" style="margin-left:1%;width:99%">
                                    
                                        <label for="experience" style="color:#000;">Experience</label>
                            <select class="form-control"  name="exp" required="required" id="field">
                <option value=""></option>
				<option>0-1 year</option>
				<option>1-2 years</option>
				<option>2-3 years</option>
                <option>3-4 years</option>
                <option>4-5 years</option>
                <option>Others</option>
                </select>
                                   </div> </div>
                                    <div class="col-md-6">
                                        <label for="cpname" style="color:#000;">Job Description</label>
                                        <textarea name="j_desc" id="field" class="form-control" required="required" rows="6" cols="50"></textarea>
                                        </div>
                                     
                                </div>
                 
                                <div id="fieldsByService"></div>
                                <input type="submit" onclick="return submitEmployerForm()" value="Submit" name="submit" class="form-control" style="margin-top: 3%;"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
   
</section>


<?php include_once 'Footer.php'; ?>
</body>
</html>