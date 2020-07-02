
<?php
include "DbConnection/DbConnectionHelper.php";

require 'PHPMailer/PHPMailerAutoload.php';
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
$mail = new PHPMailer();

include_once "WebUtils.php";
$utils = new WebUtils();

$result = $skill= $intTitle= $jobTitle = $company = $email = $jobType = $location = $minSalary = $maxSalary = $cpname = $cpnum = $j_desc = $exp = $education = $status = "";

$mailSendToAdminJobPost = $mailSendToUserJobPost = false;

if(isset($_POST['submit1'])) {
    if ($_POST['jobTitle'] != null && !empty($_POST['jobTitle'])) {
        if ($_POST['company'] != null && !empty($_POST['company'])) {
            if ($_POST['email'] != null && !empty($_POST['email'])) {
                if ($_POST['jobType'] != null && !empty($_POST['jobType'])) {
                    if ($_POST['location'] != null && !empty($_POST['location'])) {
                        if ($_POST['minSalary'] != null && !empty($_POST['minSalary'])) {
                            if ($_POST['maxSalary'] != null && !empty($_POST['maxSalary'])) {
                                if ($_POST['cpname'] != null && !empty($_POST['cpname'])) {
                                    if ($_POST['cpnum'] != null && !empty($_POST['cpnum'])&& (strlen(($_POST['cpnum'])) == 10)) {
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
                                            $about_comp = $_POST['about_comp'];
                                            $education = $_POST['education'];
                                            $skill = $_POST['hiskill'];
                                            $type="Job";
                                            $status = false;

                                            //Admin Email
                                            $mailSendToAdminJobPost = $utils->adminMailToJobPost1($cpname, $cpnum, $email, $company, $jobTitle, $mail, $j_desc, $exp, $education);
                                            if($mailSendToAdminJobPost)
                                            {
                                                //User mail
                                                $mailSendToUserJobPost = $utils->userWelcomeMailToJobPost($cpname, $email, $mail);
                                                if($mailSendToUserJobPost)
                                                {
                                                    $stmt = $conn->prepare('insert into jobpost (jobTitle, company, email, jobType, location, minSalary, maxSalary, cpname, cpnum, j_desc, status, exp, education,about_comp,type,skills) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
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
                                                    $stmt->bindParam(14, $about_comp);
                                                    $stmt->bindParam(15, $type);
                                                    $stmt->bindParam(16, $skill);

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
if(isset($_POST['submit2'])) {
    try {
                                            $intTitle = $_POST['intTitle'];
                                            $company = $_POST['company'];
                                            $email = $_POST['email'];
                                            $cpname = $_POST['cpname'];
                                            $cpnum = $_POST['cpnum'];
                                            $j_desc = $_POST['j_desc'];
                                            $exp = $_POST['exp'];
                                            $about_comp=$_POST['about_comp'];
                                            $maxSalary = $_POST['maxSalary'];
                                            $education = $_POST['education'];

                                            $status = false;
                                            $type= "Internship";
                                            //Admin Email
                                            //$mailSendToAdminJobPost = $utils->adminMailToJobPost($cpname, $cpnum, $email, $company, $intTitle, $mail, $j_desc, $exp, $education);
                                            $mailSendToAdminJobPost = $utils->adminMailToJobPost2($cpname, $cpnum, $email, $company, $intTitle, $mail, $j_desc, $exp, $education);

                                            if($mailSendToAdminJobPost)
                                            {
                                                //User mail
                                                $mailSendToUserJobPost = $utils->userWelcomeMailToJobPost($cpname, $email, $mail);
                                                if($mailSendToUserJobPost)
                                                {
                                                    $stmt = $conn->prepare('insert into jobpost (jobTitle, company, email,maxSalary, cpname, cpnum, j_desc, status, exp, education,about_comp,type) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
                                                    $stmt->bindParam(1, $intTitle);
                                                    $stmt->bindParam(2, $company);
                                                    $stmt->bindParam(3, $email);
                                                    $stmt->bindParam(4, $maxSalary);
                                                    $stmt->bindParam(5, $cpname);
                                                    $stmt->bindParam(6, $cpnum);
                                                    $stmt->bindParam(7, $j_desc);
                                                    $stmt->bindParam(8, $status);
                                                    $stmt->bindParam(9, $exp);
                                                    $stmt->bindParam(10, $education);
                                                    $stmt->bindParam(11,$about_comp);
                                                    $stmt->bindParam(12,$type);

                                                    $stmt->execute();

                                                    $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Thanks  for posting Job, will get you back soon.</div>";

}
                                            }

                                        } catch (PDOException $e) {
                                            echo '{"error":{"text":' . $e->getMessage() . '}}';
                                        }
                                    }



?>

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
<style>

#drop_file_zone {
    background-color: #EEE;
    border: #999 5px dashed;
    width: 100%;
    height: auto;
    padding: 8px;
    font-size: 14px;
}
#drag_upload_file {
  width:100%;
  margin:0 auto;
}
#drag_upload_file p {
  text-align: center;
}
#drag_upload_file #selectfile {
  display: none;
}
/* Include the padding and border in an element's total width and height */
* {
  box-sizing: border-box;
}

/* Remove margins and padding from the list */
ul {
  margin: 0;
  padding: 0;
}

/* Style the list items */
ul li {
  cursor: pointer;
  position: relative;
/*  padding: 12px 8px 12px 40px; */

  font-size: 14px;
  transition: 0.2s;


  /* make the list items unselectable */
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Set all odd list items to a different color (zebra-stripes)
ul li:nth-child(odd) {
  background: #f9f9f9;
}*/

/* Darker background-color on hover
ul li:hover {
  background: #ddd;
}*/

/* When clicked on, add a background color and strike out text */
ul li.checked {
  background: #888;
  color: #fff;
  text-decoration: line-through;
}

/* Add a "checked" mark when clicked on */
ul li.checked::before {
  content: '';
  position: absolute;
  border-color: #fff;
  border-style: solid;
  border-width: 0 2px 2px 0;
  top: 10px;
  left: 16px;
  transform: rotate(45deg);
  height: 15px;
  width: 7px;
}

/* Style the close button */
.close {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px;
}

.close:hover {
  background-color: #f44336;
  color: white;
}

/* Clear floats after the header */
.header:after {
  content: "";
  display: table;
  clear: both;
}



/* Style the "Add" button */
.addBtn {
  padding: 6px;
  width: 25%;
  background: #d9d9d9;
  color: #555;
  float: left;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
  border-radius: 0;
}

.addBtn:hover {
  background-color: #bbb;
}
/* Style the "Add" button */
.uBtn {
  padding: 6px;
  width: 25%;
  background: #d9d9d9;
  color: #555;
  float: left;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
  border-radius: 0;
}

.uBtn:hover {
  background-color: #bbb;
}
</style>
<script type="text/javascript">
  var fileobj;
  function upload_file(e) {
    e.preventDefault();
    fileobj = e.dataTransfer.files[0];
    ajax_file_upload(fileobj);
  }

  function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
        fileobj = document.getElementById('selectfile').files[0];
      ajax_file_upload(fileobj);
    };
  }

  function ajax_file_upload(file_obj) {
    if(file_obj != undefined) {
        var form_data = new FormData();
        form_data.append('file', file_obj);
      $.ajax({
        type: 'POST',
        url: 'upload_image.php',
        contentType: false,
        processData: false,
        data: form_data,
        success:function(response) {
          //alert(response);
		  $('#showresult').append('file Uploaded Successfully');
          $('#selectfile').val('');
		  $('#filename').val(response);
        }
      });
    }
  }

  // Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {

  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";
  document.getElementById("livesearch").style.display = "none";
    var elem = document.getElementById('hskill');
    var old  = elem.value;
    old = old + ',' + inputValue;

   document.getElementById("hskill").value = old;

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
function newElement1() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("uInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("uUL").appendChild(li);
  }
  document.getElementById("uInput").value = "";
  document.getElementById("liveisearch").style.display = "none";
var elemm = document.getElementById('hinterest');
    var oldd  = elemm.value;
    oldd = oldd + ',' + inputValue;

   document.getElementById("hinterest").value = oldd;
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
</script>
<script>
function showResult(str) {
		 document.getElementById("livesearch").style.display = "block";
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","getSearch.php?q="+str,true);
  xmlhttp.send();
}
function showinterestResult(str) {
		 document.getElementById("liveisearch").style.display = "block";
  if (str.length==0) {
    document.getElementById("liveisearch").innerHTML="";
    document.getElementById("liveisearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("liveisearch").innerHTML=this.responseText;
      document.getElementById("liveisearch").style.border="1px solid #A5ACB2";
    }
  }

  xmlhttp.open("GET","getSearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
<script>
function fill(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#myInput').val(Value);
   //Hiding "display" div in "search.php" file.

}
function fillinterst(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#uInput').val(Value);
   //Hiding "display" div in "search.php" file.

}
</script>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Post- Innerwork | Employer Portal | Recruiter zone | Job post in bangalore</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="shortcut icon" type="image/x-icon" href="img/shortcut.png">-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Vendor: Bootstrap Stylesheets http://getbootstrap.com -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="all">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel="stylesheet" media="all">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" media="all">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
<link href="css/style.css" rel="stylesheet" media="all">
<link rel="shortcut icon" type="image/x-icon" href="img/fevicon.png">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-147188985-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-147188985-1');
</script>
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
    <link rel="stylesheet" type="text/css" href="job.css">
</head>
<body>
<link rel="stylesheet" type="text/css" href="css/demo.css">
<section id="headerBtm">
    <div class="container-fluid">
        <nav class="navbar navbar-inverse" role="navigation"> <!-- navbar-fixed-top -->
            <div class="container-fluid-padNone">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index" title="Innererwork"><img src="img/logo.png" alt="Innerer Work" class="logo"></a>
                    <h6 id='h_inner' class="inner">Innerwork</h6>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index" id="homePageLink">Home</a></li>
                        <li><a href="about" id="aboutPageLink">About Us</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" id="servicesPageLink">Our Service <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="hr-consultancy" id="recruitmentPageLink">HR Services</a></li>
                                <li><a href="it-services" id="staffingtPageLink">IT Services</a></li>
                                <li><a href="digital-marketing" id="managementPageLink">Digital Marketing</a></li>
                                <li><a href="startup-support" id="startupPageLink">Startup Support</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" id="servicesPageLink">Job<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="jobseeker" id="jobSeekerPageLink">Job Seeker</a></li>
                                <li><a href="jobpost&intern" id="jobPostPageLink">Job Post|Internship</a></li>
                                <li><a href="employer" id="employerPageLink">Employer</a></li>
                                <li><a href="collegeport" id="collagePageLink">College</a></li>

                                <li><a href="intern" id="internPageLink">Internship</a></li>
                                <li><a href="openings" id="internPageLink">Openings</a></li>
                            </ul>
                        </li>
                        <li><a href="recruiter" id="employerPageLink">Freelance</a></li>
                        <li><a href="blog" id="blogPageLink">Blog</a></li>
                        <li><a href="Login">Login</a></li>
                        <li><a href="contact">Contact Us</a></li>
                        <li><div id='paynow' class="razorpay-embed-btn" data-url="https://pages.razorpay.com/pl_F3auqrmv27oE3J/view" data-text="Pay Now" data-color="#528FF0" data-size="small">
                          <script>
                            (function(){
                              var d=document; var x=!d.getElementById('razorpay-embed-btn-js')
                              if(x){ var s=d.createElement('script'); s.defer=!0;s.id='razorpay-embed-btn-js';
                              s.src='https://cdn.razorpay.com/static/embed_btn/bundle.js';d.body.appendChild(s);} else{var rzp=window['__rzp__'];
                              rzp && rzp.init && rzp.init()}})();
                          </script>
                        </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>
<section id="banner">
    <div class="container">
        <div class="col-md-12"></div>
        <div class="col-md-12">
            <center>
            <h2>Job/Internship Post</h2>
            <p><a href="index">Home</a> <span>/</span>Job/Internship post</p>
            </center>
        </div>
    </div>
</section>
<section id="jobApplication">
<div class="container" style="background-color:#f9f9f9;margin-top: -39px; width: 100%;">
     <div class="row formDetail">
         <div class="col-md-12">
         <h3 style="text-align:center;">Job/Internship Post-Employer Portal</h3>
         <p style="text-align:center;">Who is looking for candidates like Company, Freelancer, Recruiter can post their job at Innerwork Employer Portal. We would be glad to assist you!</p>
         </div>
         <div class="col-md-12">
             <div id="formSubmissionResult"></div>
                <div id="oneD">
                  <center>
                   <a id="job" class="btn btn-primary btn1"style="width: 94px;border-top-left-radius: 20px;border-bottom-left-radius: 20px;">Job</a>
                   <a id="intern" class="btn btn-primary" style="width: 94px;border-top-right-radius: 20px;border-bottom-right-radius: 20px;">Internship</a>
                   </center><br>
                   <?php echo $result; ?>
                    <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" id="jobp" class="formJob" style="border: 2px solid #999;padding: 2%;width:90%;margin-left: 5%;" enctype="multipart/form-data">
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
                                        <input type="text" name="cpnum" id="field" class="form-control" required="required" pattern="{0-9}[10]" maxlength="10">
                                    </div></div>
                                     <div class="row form-group">

                                    <div class="col-md-6"  >

                                        <label for="education" style="color:#000;">Education Required</label>
                                        <select class="form-control"  name="education" required="required" id="field">
                                            <option value=""></option>
                                            <option>Animation</option>
                                            <option>BA</option>
                                            <option>BBA</option>
                                            <option>BBM</option>
                                            <option>BCA</option>
                                            <option>B.Com</option>
                                            <option>BE/BTech</option>
                                            <option>B.Sc</option>
                                            <option>Engg-CSE</option>
                                            <option>Engg-ECE</option>
                                            <option>Engg-EEE</option>
                                            <option>Engg-Civil</option>
                                            <option>Engg-Mechanical</option>
                                            <option>Engg-Chemical</option>
                                            <option>Engg-Management</option>
                                            <option>Engg-Aeronotical</option>
                                            <option>Engg-Automobile</option>
                                            <option>Engg-Biomedical</option>
                                            <option>Engg-Ceramic</option>
                                            <option>Engg-Construction</option>
                                            <option>Engg-Environment</option>
                                            <option>Engg-Marine</option>
                                            <option>Engg-Mechatronics</option>
                                            <option>Engg-Metallurgical</option>
                                            <option>Engg-Mining</option>
                                            <option>Engg-Petrolium</option>
                                            <option>Engg-Power</option>
                                            <option>Engg-Production</option>
                                            <option>Engg-Robotics</option>
                                            <option>Engg-Structural</option>
                                            <option>Engg-Telecommunication</option>
                                            <option>Engg-Textile</option>
                                            <option>Engg-Tool</option>
                                            <option>Engg-Transportation</option>
                                            <option>MA</option>
                                            <option>MBA</option>
                                            <option>MCA</option>
                                            <option>M.Com</option>
                                            <option>M.Sc</option>
                                            <option>Polytechnic</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
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
                                       <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="cpname" style="color:#000;">Job Description</label>
                                        <textarea name="j_desc" id="field" class="form-control" required="required" rows="6" cols="50"></textarea>
                                        </div>

                                <div class="col-md-6">
                                        <label for="cpname" style="color:#000;">About Company</label>
                                        <textarea name="about_comp" id="field" class="form-control" required="required" rows="6" cols="50"></textarea>
                                        </div></div>
                                     <div class="row form-group">

<!--                             <div id="fieldsByService">
		    <div id="myDIV" class="col-md-6">-->
				<div class="row form-group">
					 <div id="myDIV" class="col-md-12">

                                <label for="skill" style="color:#000;">Skills</label>
                                <input type="text" name="skill" class="form-control" id="myInput" onkeyup="showResult(this.value)" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
								 <span onclick="newElement()" class="addBtn">Add</span>
								 <div id="livesearch"></div>

								 <input type="hidden" name="hiskill" class="form-control" id="hskill" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
                                <ul id="myUL" style="padding: 12px 8px 12px 40px;">
						</ul>
                                           </div></div></div>
                            <input type="submit" onclick="return submitEmployerForm()" value="Submit" name="submit1" class="form-control" style="margin-top: 3%;"/>
                            </form>
                            <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" id="internp" class="formJob" enctype="multipart/form-data" style="border: 2px solid #999;padding: 2%;width:90%;margin-left: 5%;">
                            <div id="candidateFormResult"></div>
                              <p><b style="color:red;">*</b>Details</p>
						      <hr>
                            <div class="row form-group">
                            <div class="col-md-6">
                                <label for="candidateName" style="color:#000;">Company</label>
                                <input type="text" name="company" class="form-control" required="required" id="field">
                            </div>
                            <div class="col-md-6">
                                  <label for="jobTitle" style="color:#000;">Internship Title</label>
                                  <input type="text" name="intTitle" id="field" class="form-control" required="required">
                            </div>
                            </div>
                           <div class="row form-group">
                            <div class="col-md-6">
                                <label for="education" style="color:#000;">Highest Qualification</label>
                                <select class="form-control"  name="education" required="required" id="field">
                                            <option value=""></option>
                                            <option>BA Fresher</option>
                                            <option>BA 1st Year</option>
                                            <option>BA 2nd Year</option>
                                            <option>BA 3rd Year</option>
                                            <option>BA Fresher</option>
                                            <option>BBA 1st Year</option>
                                            <option>BBA 2nd Year</option>
                                            <option>BBA 3rd Year</option>
                                            <option>BBM Fresher</option>
                                            <option>BBM 1st Year</option>
                                            <option>BBM 2nd Year</option>
                                            <option>BBM 3rd Year</option>
                                            <option>BCA Fresher</option>
                                            <option>BCA 1st Year</option>
                                            <option>BCA 2nd Year</option>
                                            <option>BCA 3rd Year</option>
                                            <option>B.Com Fresher</option>
                                            <option>B.Com 1st Year</option>
                                            <option>B.Com 2nd Year</option>
                                            <option>B.Com 3rd Year</option>
                                            <option>BE/BTech Fresher</option>
                                            <option>BE/BTech 1st Year</option>
                                            <option>BE/BTech 2nd Year</option>
                                            <option>BE/BTech 3rd Year</option>
                                            <option>BE/BTech 4th Year</option>
                                            <option>Diploma in Animation</option>
                                            <option>Graduation in Animation</option>
                                            <option>MA Fresher</option>
                                            <option>MA 1st Year</option>
                                            <option>MA 2nd Year</option>
                                            <option>MBA Fresher</option>
                                            <option>MBA 1st Year</option>
                                            <option>MBA 2nd Year</option>
                                            <option>MCA Fresher</option>
                                            <option>MCA 1st Year</option>
                                            <option>MCA 2nd Year</option>
                                            <option>MCA 3rd Year</option>
                                            <option>M.Com Fresher</option>
                                            <option>M.Com 1st Year</option>
                                            <option>M.Com 2nd Year</option>
                                            <option>Polytechnic</option>
                                        </select>
                            </div>


                            <div class="col-md-6">
                            <label for="experience" style="color:#000;">Duration</label>
                            <select class="form-control" name="exp" required="required" id="field">
                                <option value=""></option>
                                <option></option>
                                <option>45 days</option>
                                <option>1 month</option>
                                <option>2 months</option>
                                <option>3 months</option>
                                <option>6 months</option>
                                </select>
                                </div></div>
                                <div class="row form-group">

                            <div class="col-md-6">
                                <label for="stipend" style="color:#000;">Stipend</label>

                                                <input type="text" id="field" name="maxSalary" id="maxSalary" placeholder="&nbsp; ₹ Stipend" class="form-control" required="required">


                            </div>

                                <div class="col-md-6">
                                <label for="email" style="color:#000;">Email</label>
                                <input type="email" name="email" class="form-control" required="required" id="field">
                            </div></div>
                            <div class="row form-group">

                                    <div class="col-md-6">
                                        <label for="cpname" style="color:#000;">Contact Person Name</label>
                                        <input type="text" name="cpname" id="field" class="form-control" required="required">
                                    </div>
                                      <div class="col-md-6">
                                        <label for="cpnum" style="color:#000;">Contact Person Number</label>
                                        <input type="text" name="cpnum" id="field" class="form-control" required="required" pattern="{0-9}[10]" maxlength="10">
                                    </div></div>
                                    <div class="row form-group">
                                         <div class="col-md-6">
                                        <label for="cpname" style="color:#000;">Company Description</label>
                                        <textarea name="about_comp" id="field" class="form-control" required="required" rows="6" cols="50"></textarea>
                                        </div>
                                    <div class="col-md-6">
                                        <label for="idesc" style="color:#000;">Internship Description</label>
                                        <textarea name="j_desc" id="field" class="form-control" required="required" rows="6" cols="50"></textarea>
                                    </div>

                                    </div>
				    <!-- CODE start -->
				    <div class="row form-group">
                        	    <div class="col-md-12">
                                	<label for="mobno" style="color:#000;">Skills</label>
                                            <input type="text" name="interest" class="form-control" id="uInput" onkeyup="showinterestResult(this.value)" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
                                 <span onclick="newElement1()" class="uBtn">Add</span>
                                 <div id="liveisearch"></div>
                                  <input type="hidden" name="hinterest" class="form-control" id="hinterest" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
                            </div>
                        </div>
                        <ul id="uUL" style="padding: 12px 8px 12px 40px;">
                        </ul>
			<!-- CODE END-->
<div id="showresult" class="row form-group" style="margin-bottom:3%;"></div>



                        <input type="submit" value="Submit" name="submit2" class="form-control" style="margin-top:3%;">
                    </form>
                        </div>
             <script>
                $(document).ready(function() {
                      $("#job").click(function() {
                        $("#jobp").fadeIn();
                        $("#internp").fadeOut();
                      });
                    });
                $(document).ready(function() {
                      $("#intern").click(function() {
                        $("#internp").fadeIn();
                          $("#jobp").fadeOut();
                      });
                    });
            </script>
                    </div>
                </div>
            </div>
</section>
<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <h2><span class="heading">Innerwork</span></h2>
                <p>Innerwork is emerging as a leader in the next phase of HR Services</p>
                <a href="about" class="btton">Read More <i class="fa fa-angle-double-right"></i></a>
                  <ul class="contactSocial">
                    <li><a href="https://www.facebook.com/Innerworkolution/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCuwkBl5yeSlnxSYarnIlZsA" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/innerworksolutions/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="https://www.facebook.com/InnerworkSolution" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="https://twitter.com/innverwork" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://in.pinterest.com/innerwork123/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="https://www.quora.com/profile/Innerwork-India" target="_blank"><i class="fa fa-quora"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="row">
                    <h3>Quick Links</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="links">
                            <li><a href="index">Home</a></li>
                            <li><a href="about">About Us</a></li>
                            <li><a href="hr-consultancy">HR Services</a></li>
                            <li><a href="it-services">IT Services</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="links">
                            <li><a href="digital-marketing">Digital Marketing</a></li>
                            <li><a href="jobseeker">Job Seeker</a></li>
                            <li><a href="contact">Contact Us</a></li>
                            <li><a href="termsandconditions">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="contactDetail" style="color:#01131b;">
                    <h3>Reach Us</h3>
                    <p><i class="fa fa-map"></i> <span>#80, 4th cross, Aswath Nagar, Marathahalli, Bangalore - 560037</span></p>
                    <p><i class="fa fa-phone"></i><span><a href="tel:(080)-4209-2269)"> (080)-4209-2269)</href></span></p>
                    <p><i class="fa fa-envelope"></i><sapn><a href="mailto:Info@innerworkindia.com">Info@innerworkindia.com</a></sapn></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="footerBottm">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; 2020 Innerwork. All right reserved.</p>
            </div>
            <div class="col-md-6">
                <p class="copyright">
                    Website Design & Developed By <a href="http://www.innerworkindia.com" target="_blank">Innerwork Solutions</a>
                </p>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    (function () {
        var options = {
             whatsapp: "+91 9887888469", // WhatsApp number
            call_to_action: "Message Us", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>

<!-- Tawk.to -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5e7f141369e9320caabde55f/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
