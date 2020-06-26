<?php
include "DbConnection/DbConnectionHelper.php";

require 'PHPMailer/PHPMailerAutoload.php';
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
$mail = new PHPMailer();

include_once "WebUtils.php";
$utils = new WebUtils();


$result = $name = $gender = $city = $education = $email = $contactNumber = $skill = $interest = $exp = "";
$mailSendToAdminJobSeeker = $mailSendToUserJobSeeker = false;

if(isset($_POST['submit'])) {
    if ($_POST['name'] != null && !empty($_POST['name'])) {
        if ($_POST['gender'] != null && !empty($_POST['gender'])) {
            if ($_POST['city'] != null && !empty($_POST['city'])) {
                if ($_POST['education'] != null && !empty($_POST['education'])) {
                    if ($_POST['email'] != null && !empty($_POST['email'])) {
                        if ($_POST['mobno'] != null && !empty($_POST['mobno'])) {
                            if ($_POST['skill'] != null && !empty($_POST['skill'])) {
                                if ($_POST['interest'] != null && !empty($_POST['interest'])) {
                                     if ($_POST['exp'] != null && !empty($_POST['exp'])) {
                                        
                            
                            try {
//                                 $uploadFolder = "InternshipApplicants";

// foreach ($_FILES['attach1']['tmp_name'] as $key => $image) {
//         $imageTmpName = $_FILES['attach1']['tmp_name'][$key];
//         $imageName = $_FILES['attach1']['name'][$key];
//         $final_path = $folder_name."/".$imageName;
//         $result = move_uploaded_file($imageTmpName,$final_path);
// }
    
                                
                               $uploadFolder = "InternshipApplicants";
                               
                                    //$folder_name = $uploadFolder."/".$name;
                                    
                                    
                                    //$photopath = mkdir($folder_name);
                                    // foreach ($_FILES['attach1']['tmp_name'] as $key => $image) {
                                    //         $imageTmpName = $_FILES['fnamee']['tmp_name'][$key];
                                    //         $imageName = $_FILES['attach1']['name'][$key];
                                    //         $final_path = $uploadFolder."/".$imageName;
                                    //         $result = move_uploaded_file($imageTmpName,$final_path);
                                            
                                    // }
                                    
                             //   $file = "InternshipApplicants/".$_FILE['fnamee']['name'];
                              
                               // move_uploaded_file($_FILE['fnamee']['tmp_name'],"../InternshipApplicants/".$_FILE['fnamee']['name']);$_FILES['attach1']['tmp_name']
                               
		                   $fm =  $_FILES['attach1']['name'];
		                   $fo =  $_FILES['attach1']['tmp_name'];
		                   $final_path = $uploadFolder."/".$fm;
                                          
		                     $result =	move_uploaded_file($_FILES['attach1']['tmp_name'],$final_path);
		                    	
		                    		
                                $name = $_POST['name'];
                                $gender = $_POST['gender'];
                                $city = $_POST['city'];
                                $education = $_POST['education'];
                                $contactNumber = $_POST['mobno'];
                                $email = $_POST['email'];
                                $skill = $_POST['skill'];
                                $interest = $_POST['interest'];
                                $exp = $_POST['exp'];
                                $imageName = $_POST[$fo];
								
                                $adminEmail = 'internship@innerworkindia.com';

                                //Admin Email
                                $mailSendToAdminJobSeeker = $utils->adminMailToJobSeeker($mail, $name, $contactNumber, $email, $city, $education,$skill,$interest, $exp, $file);
                                if($mailSendToAdminJobSeeker)
                                {
                                    $mailSendToUserJobSeeker = $utils->userMailToJobSeeker($mail, $name, $email);
                                    if($mailSendToUserJobSeeker)
                                    {
                                        $stmt = $conn->prepare('insert into internship (name, gender, city, education, email, mobno, skill, interest, exp, fnamee) VALUES(?,?,?,?,?,?,?,?,?,?)');
                                        $stmt->bindParam(1, $name);
                                        $stmt->bindParam(2, $gender);
                                        $stmt->bindParam(3, $city);
                                        $stmt->bindParam(4, $education);
                                        $stmt->bindParam(5, $email);
                                        $stmt->bindParam(6, $contactNumber);
                                        $stmt->bindParam(7, $skill);
                                        $stmt->bindParam(8, $interest);
                                        $stmt->bindParam(9, $exp);
                                        $stmt->bindParam(10, $fm);
                                
                                        $stmt->execute();

                                        $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Thanks applying for Job, will get you back soon.</div>";
                                    }
                                }


                           } catch (PDOException $e) {
                                echo '{"error":{"text":' . $e->getMessage() . '}}';
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
        
    } else {
            $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please select your experience</div>";
        }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Internship- Innerwork | Internship | Summer Internship 2020 | Internship in Bangalore</title>
    <?php include "CommonFiles.php"?>
    <!--<link rel="stylesheet" href="css/collage.css">
     <link rel="stylesheet" href="css/intern.css">--->
     
     <link rel="stylesheet" href="internshipstyles/css/bootstrap.min.css">
  <link rel="stylesheet" href="internshipstyles/css/jquery-ui.css">
  <link rel="stylesheet" href="internshipstyles/css/owl.carousel.min.css">
  <link rel="stylesheet" href="internshipstyles/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="internshipstyles/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="internshipstyles/css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="internshipstyles/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="internshipstyles/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="internshipstyles/css/aos.css">
  <link href="internshipstyles/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<?php include_once 'Header.php'; ?>
<section id="banner">
    <div class="container">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <h2>Internsip</h2>
            <p><a href="index">Home</a> <span>/</span>Internship</p>
        </div>
    </div>
</section>
<section id="jobApplication">
<div class="site-section contact-wrap" id="contact-section">
      <div class="container" style="background-color:white">
        
        <div class="row justify-content-center text-center mb-5" style="background-color:white">
          <div class="col-md-8  section-heading">
            <span class="subheading">Set your Career goals</span>
            <h2 class="heading mb-3">Internship</h2>
            <!--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind
              texts.-->
            </p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-7">
              <div id="oneD">
                    <?php echo $result; ?>
             <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" class="formJob" enctype="multipart/form-data">
              <div class="form-group row">
                <div class="col-md-6 mb-3 mb-lg-0">
                  <input type="text" class="form-control" placeholder="First name" required="required" name="name">
                </div>
                <div class="col-md-6">
                  <input type="email" class="form-control" placeholder="Email" required="required" name="email">
                </div>
              </div>
			  
							
    
              <div class="form-group row">
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="College Name" required="required" name="city">
                </div>
            
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Qualification" required="required" name="education">
                </div>
              </div>
			  
			   <div class="form-group row">
			  <div class="col-md-6">
                    <label for="gender" style="color:#000;">Gender</label>
                        <select name="gender" class="form-control" required="required"  >
                            <option  value=""></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
							
                        </select>
                 </div>
				 
				 <div class="col-md-6">
                    <label for="gender" style="color:#000;">Duration</label>
                        <select name="gender" class="form-control" required="required" name="exp"  >
                            <option  value=""></option>
                            <option value="Male">1 Month</option>
                            <option value="Female">45 Days</option>
							<option value="Male">2 Months</option>
                            <option value="Female">3 months</option>
							<option value="Male">4 Months</option>
                            <option value="Female">6 Months</option>
                        </select>
                 </div>
				</div>
				
				<div class="form-group row">
                <div class="col-md-6">
                  <input type="tel" class="form-control" placeholder="Mobile Number" required="required" name="mobno">
                </div>
            
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="City" required="required" name="city">
                </div>
              </div>
				 
		        <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Skills" required="required" name="skill">
                </div>
            
                </div>		 
				 
              <div class="form-group row">
                <div class="col-md-12">
                  <textarea class="form-control" id="" name="interest" cols="30" rows="5"
                    placeholder="Write your Interest here"></textarea>
                </div>
              </div>
						<div class="form-group row">
                            <div class="col-md-12">
                                <label for="file" style="color:#000;">Upload file here</label>
                                <input type="file" name="attach1" class="form-control" id="field" >
                        </div>
                        </div>
	
              <div class="form-group row">
                <div class="col-md-6">
    
                  <input type="submit" class="btn btn-primary py-3 px-5 btn-block" value="Send Message">
                </div>
              </div>
    
				
            </form>
        </div>
          </div>
        </div>
      </div>
    </div>

    <div class="schedule-wrap2 clearfix">
      <div class="d-md-flex align-items-center">
        <div class="hours mr-md-4 mb-4 mb-lg-0">
          <strong class="d-block">+91 9887888469 / +91 9487980784</strong>
         info@innerworkindia.com
        </div>
        <div class="cta ml-auto">
          <a href="#" class="d-flex d-md-flex align-items-center btn">
            <span class="mx-auto"> <span>Contact us</span> <span class="arrow icon-keyboard_arrow_right"></span></span>
          </a>
        </div>
      </div>
    </div>

 </section>  

  

   

    <div class="site-section" id="services-section">
      <div class="container">
       
        <div class="row">
          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="">
            <div class="ftco-feature-1">
              <span class="icon flaticon-fit"></span>
              <div class="ftco-feature-1-text">
                <h2>Be the Best Fit</h2>
                <p>For companies, it is an experience that matters most when it comes to building the talent pool for current and future requirements.Join an internship program and be the fit case for hiring as it helps you in several ways.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="ftco-feature-1">
               <span class="icon flaticon-fit"></span>
              <div class="ftco-feature-1-text">
                <h2>Freedom to Explore</h2>
                <p>Life is all about changes. Internship helps you explore career-related opportunities and realign goals as per learning experience. With time you gain confidence and make the big leap when the time comes..</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="ftco-feature-1">
               <span class="icon flaticon-fit"></span>
              <div class="ftco-feature-1-text">
                <h2>Boost of Experience</h2>
                <p>Career path is beyond classroom learning. An internship gives you an invaluable edge of experience to start a career on the front foot.During the internship, you apply acquired knowledge in practical set up and learn about real-life challenges.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="">
            <div class="ftco-feature-1">
            <span class="icon flaticon-fit"></span>
              <div class="ftco-feature-1-text">
                <h2>Competitive Edge</h2>
                <p>Industry-specific internship prepares you to be the fit case for the industry. This fitness edge helps you stand out in a crowded space. With internship certification, you offer more than expectations, so you win the game smoothly..</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="ftco-feature-1">
               <span class="icon flaticon-fit"></span>
              <div class="ftco-feature-1-text">
                <h2>Network Building</h2>
                <p>In professional life, your network and relationship make a huge difference in career progression.  You learn relationship-building skills, which are of great value in the career path.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="ftco-feature-1">
               <span class="icon flaticon-fit"></span>
              <div class="ftco-feature-1-text">
                <h2>Smooth Onboarding</h2>
                <p>You could get an excellent great start in a company of reputation with an equally great package. If you could leave an impression, you might be in the professional league from day one.</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


<section id="collage">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h2>If you are looking for internship or training then connect with us</h2>
                <span>call us on:<a href="tel:+919887888469">+91 9887888469 / +91 9487980784</a> </span> <br>
               <span>Email id:<b> <h6 href="mailto:info@innerworkindia.com">info@innerworkindia.com</b></h6></span> <br>
                <a href="contact">Contact Us</a>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</section>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>




  <script src="js/main.js"></script>


<?php include_once 'Footer.php'; ?>
</body>
</html>
