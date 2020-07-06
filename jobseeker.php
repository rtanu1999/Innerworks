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
  width:15%;
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
  xmlhttp.open("GET","getInterestsearch.php?q="+str,true);
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
                        if ($_POST['mobno'] != null && !empty($_POST['mobno']) && (strlen(($_POST['mobno'])) == 10)) {
                            if ($_POST['hiskill'] != null && !empty($_POST['hiskill'])) {
                                if ($_POST['hinterest'] != null && !empty($_POST['hinterest'])) {
                                     if ($_POST['exp'] != null && !empty($_POST['exp'])) {



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
                                $city = $_POST['city'];
                                $education = $_POST['education'];
                                $contactNumber = $_POST['mobno'];
                                $email = $_POST['email'];
                                $skill = $_POST['hiskill'];
                                $interest = $_POST['hinterest'];
                                $exp = $_POST['exp'];
                                $imageName = $_POST['fnamee'];

                                // $adminEmail = 'info@innerworkindia.com';
                                $adminEmail = 'hr@innerworkindia.com';

                                //Admin Email
                                $mailSendToAdminJobSeeker = $utils->adminMailToJobSeeker1($mail, $name, $contactNumber, $email, $city, $education,$skill,$interest, $exp, $file);
                                if($mailSendToAdminJobSeeker)
                                {
                                    $mailSendToUserJobSeeker = $utils->userMailToJobSeeker($mail, $name, $email);
                                    if($mailSendToUserJobSeeker)
                                    {
                                        $stmt = $conn->prepare('insert into jobseeker (name, gender, city, education, email, mobileNum, skill, interest, exp, file) VALUES(?,?,?,?,?,?,?,?,?,?)');
                                        $stmt->bindParam(1, $name);
                                        $stmt->bindParam(2, $gender);
                                        $stmt->bindParam(3, $city);
                                        $stmt->bindParam(4, $education);
                                        $stmt->bindParam(5, $email);
                                        $stmt->bindParam(6, $contactNumber);
                                        $stmt->bindParam(7, $skill);
                                        $stmt->bindParam(8, $interest);
                                        $stmt->bindParam(9, $exp);
                                        $stmt->bindParam(10, $imageName);

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

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job</title>
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
            <h2>Job Seeker </h2>
            <p><a href="index">Home</a> <span>/</span>Job Seeker</p>
        </div>
    </div>
</section>
<section id="jobApplication">
    <div class="container" style="background-color:#f9f9f9;margin-top: -39px; width: 100%;">
        <div class="row formDetail">
            <h2>Job Seekers</h2>
            <div class="col-md-12">
                <div id="formSubmissionResult">
                </div>
                <div id="oneD">
                    <?php echo $result; ?>
                    <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" class="formJob" style="border: 2px solid #999;padding: 2%;width:90%;margin-left: 5%;" enctype="multipart/form-data">
                        <div id="candidateFormResult"></div>
						<p><b style="color:red;">*</b> Personal Information</p>
						<hr>
                         <div class="row form-group">
                            <div class="col-md-6">
                                <label for="candidateName" style="color:#000;">Name of the Candidate</label>
                                <input type="text" name="name" class="form-control" required="required" id="field"> <!-- pattern="[0-9]{10}" -->
                            </div>
                            <div class="col-md-6">
                                <label for="email" style="color:#000;">Enter Your Email Address</label>
                                <input type="email" name="email" class="form-control" required="required" id="field" >
                            </div>

                        </div>
                        <div class="row form-group">
                              <div class="col-md-6">
                                <label for="gender" style="color:#000;">Gender</label>
                                <select name="gender" class="form-control" required="required" id="field" >
                                    <option  value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>


                            <div class="col-md-6">
                                <label for="city" style="color:#000;">City</label>
                                <input type="text" name="city" class="form-control" required="required" id="field" >
                            </div>
							</div>
							<div class="row form-group">
                             <div class="col-md-6">
                                <label for="mobno" style="color:#000;">Mobile Number</label>
                              <!--  <input type="text" name="mobno" class="form-control" required="required" id="field" >-->
                              <input type="text" name="mobno" class="form-control" pattern="{0-9}[10]" maxlength="10" required="required" id="field" >
                            </div>
                         <div class="col-md-6">
                                <label for="education" style="color:#000;">Qualification</label>
                             <!--   <input type="text" name="education" class="form-control" required="required" id="field" >-->

                             <select class="form-control" required="required" id="field" name="education">
                                  <option>ENG-CSE</option>
                                  <option>ENG-ECE</option>
                                  <option>ENG-EEE</option>
                                  <option>ENG-CIVIL</option>
                                  <option>ENG-MECHANICAL</option>
                                  <option>ENG-AERONOTICAL</option>
                                  <option>ENG-CERAMIC</option>
                                  <option>ENG-CONSTRUCTION</option>
                                  <option>ENG-ENVIRONMENT</option>
                                  <option>ENG-MARINE</option>
                                  <option>ENG-MECHATRONICS</option>
                                  <option>ENG-METALLURGICAL</option>
                                  <option>ENG-MINING</option>
                                  <option>ENG-POWER</option>
                                  <option>ENG-PETROLIUM</option>
                                  <option>ENG-PRODUCTION</option>
                                  <option>ENG-ROBOTICS</option>
                                  <option>ENG-STRUCTURAL</option>
                                  <option>ENG-TELECOMMUNICATION</option>
                                  <option>ENG-TEXTILE</option>
                                  <option>ENG-TOOL</option>
                                  <option>ENG-TRANSPORTATION</option>
                                  <option>AUTOMOBILES</option>
                                  <option>BIOMEDICAL</option>
                                  <option>BCA</option>
                                  <option>BBA</option>
                                  <option>BBM</option>
                                  <option>B.COM</option>
                                  <option>M.COM</option>
                                  <option>B.Sc</option>
                                  <option>BA</option>
                                  <option>MBA</option>
                                  <option>MCA</option>
                                  <option>M.SC</option>
                                  <option>Animation</option>
                                  <option>Polytecnic</option>
                                </select>
                            </div>
                        </div>
                       <hr>

					   <p><b style="color:red;">*</b> Career Information</p>
					   <hr>

						 <div class="row form-group">
						  <div class="col-md-12">
                                <label for="experience" style="color:#000;">Total Experience</label>
                            <select class="form-control"  name="exp" required="required" id="field">
                <option value="">Select</option>
				<option>0-1 year</option>
				<option>1-2 years</option>
				<option>2-3 years</option>
                <option>3-4 years</option>
                <option>4-5 years</option>
                <option>Others</option>
                </select>
                </div>
                        </div>
						 <div class="row form-group">
                            <div id="myDIV" class="col-md-6 col-sm-12">
                                <label for="skill" style="color:#000;">Skills</label>
					     <input type="text" name="skill" class="form-control" id="myInput" onclick="newElement()" onkeyup="showResult(this.value)" style="margin:0;border:none;border-radius:0;width:100%;  padding: 10px;float: left;font-size: 16px;">
				    <!--<input type="text" name="skill" class="form-control" id="myInput"  onkeyup="showResult(this.value)" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;"> -->
				    <!-- <span onclick="newElement()" class="addBtn">Add</span> -->

								 <div id="livesearch"></div>

								 <input type="hidden" name="hiskill" class="form-control" id="hskill" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">

						<ul id="myUL" style="padding: 12px 8px 12px 40px;">
						</ul></div>
                            <div id="uDIV" class="col-md-6 col-sm-12" >
                                <label for="skill" style="color:#000;">Interest</label>
				    <input type="text" name="interest" class="form-control" onclick="newElement1()" id="uInput" onkeyup="showinterestResult(this.value)" style="margin:0;border:none;border-radius:0;width:100%;  padding: 10px;float: left;font-size: 16px;">
<!--                                 <input type="text" name="interest" class="form-control" id="uInput" onkeyup="showinterestResult(this.value)" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
								 <span onclick="newElement1()" class="uBtn">Add</span>  -->
								 <div id="liveisearch"></div>
								  <input type="hidden" name="hinterest" class="form-control" id="hinterest" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">

						<ul id="uUL" style="padding: 12px 8px 12px 40px;">
						</ul></div>
							</div>



        <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
  <div id="drag_upload_file">
    <p>Drop file here</p>
    <p>or</p>
    <p><input type="button" value="Select File" onclick="file_explorer();" style="width: fit-content !important;"></p>
    <input type="file" id="selectfile">
	<input type="hidden" id="filename" name="fnamee">
  </div>
</div>
<div id="showresult" class="row form-group" style="margin-bottom:3%;"></div>



                        <input type="submit" value="Submit" name="submit" class="form-control" style="margin-top:3%;"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<section id="about">
    <div class="container">
        <div class="row aboutContent">
            <div class="col-md-12">
                <h2>Find Suitable Jobs, Now</h2>
                <p>Earning livelihood matters, but balanced career-building happens only when you enjoy doing what you love the most. Innerwork, the goldmine of job opportunities, makes it simple for you to find suitable jobs and build a balanced career. </p>
            </div>
        </div>

        <div class="row aboutContent">
            <div class="col-md-12">
                <h3>What Makes Innerwork Best for Job Seekers </h3>
                <p>The job dynamics are changing fast both in terms of expectation and fulfillment. Innerwork, a leading HR service provider with vast experience of placing thousands of aspirants in the right place, helps in bridging the expectation to fulfillment gap. Job seekers are now better qualified to compete for jobs of choice. We mobilize all possible resources to help you find the most suitable jobs matching your profile. We understand the dynamism of the job market, so we help you get the best job with the finest compensation in the quickest possible time. We look beyond the vacancy filling and work dedicatedly to help candidates grab dream jobs in reputed companies. </p>
               <ul class="accordian">
			   <li id="acco1"><b>Dynamic Job Database </b></li>
                <p>For us, finding a job isn’t just about data mining. We have a robust real-time workable data of fresh jobs to help you get what you need. We are more focused on the purity of the data than the volume. We have a smart job filtering system to help candidates search and research jobs according to industry, skills, expertise, experience, location, compensation, and above all the work culture and suitability.</p>
                <li id="acco1"><b>Profile Building</b></li>
                <p>For us, you are not just a name with an email address. We have a robust profile building system in place to capture all possible career-related data. The core idea is to display your information smartly to boost your job call and success rate. The first impression makes a huge difference in the final selection, so we pay special attention to synchronizing and harmonizing the information in the defined structure.   </p>
                <li id="acco1"><b>Humane Matching Process  </b></li>
                <p>We are not just a job search engine. We believe in bridging the gap between candidates and companies through the humane approach of finding the perfect match. Of course, we use an advance algorithm to show you the most suitable results, but this happens only because of the comprehensive effort that goes into defining the matching elements.  </p>
                <li id="acco1"><b>Personalized Jobs </b></li>
                <p>Despite several job-related similarities, each individual is unique for a specific job. We have a highly focused team in action to help you find unique jobs matching your personality and aspiration. The core idea is to boost your chances to get the finest job in the quickest possible time. </p>
                <li id="acco1"><b>Personal Branding</b></li>
                <p>In this hyper-competitive job market, it is your personal branding that makes all the difference in getting quality jobs. Our team of HR experts is well equipped with resources with a vast network to help you build and position in the right context. </p>
                <li id="acco1"><b>Corporate Network</b></li>
                <p>We value the relationship most, so we invest a great amount of time and energy in building a corporate network. The whole idea is to understand the dynamism of changing job profile and accordingly help candidates get the best jobs. </p>
                <li id="acco1"><b>Resume Booster</b></li>
                <p>Frankly, your resume is the most important link between you and your dream job. You simply cannot take it lightly.  Your resume speaks on your behalf with the person who is in the process of short-listing hundreds of applications. So, it is of the utmost value to let your resume build your identity effectively in your absence. Our recruitment experts know how to make a resume shine amongst the hundreds of similar resumes. We help you boost your resume so that you could get the interview call and grab the job smoothly.     </p>
                <li id="acco1"><b>Interview Training </b></li>
                <p>In this digital space, it is now relatively easy to search for jobs of your choice. A little effort could help you boost the chances of resume short-listing, but it is face to face interaction that makes all the difference. Our talent experts can help you prepare better for industry-centric interviews and improve your success rate. The customized interview training remains focused on making you more suitable for a particular job.   </p>
                <li id="acco1"><b>Save Time & Energy </b></li>
                <p>Unlike several job search databases, Innerwork offers custom job search solutions to find the best job opportunities across all types of in the industry. The core idea is to be a strong bridge between you and the company so that both could save time and energy and get the best match.         </p>
				</ul>
            </div>
        </div>
    </div>
</section>

<!--<script>
jQuery(function($) {

  $('#tags input').on('focusout', function() {
    var txt = this.value.replace(/[^a-zA-Z0-9\+\-\.\#]/g, ''); // allowed characters list
    if (txt) $(this).before  ( + txt + '</span>');
    this.value = "";
  }).on('keyup', function(e) {
    // comma|enter (add more keyCodes delimited with | pipe)
    if (/(188)/.test(e.which)) $(this).trigger('focusout');
  });

  $('#tags').on('click', '.tag', function() {
    if (confirm("Really delete this tag?")) $(this).remove();
  });

});

</script>--->
<?php include_once 'Footer.php'; ?>
</body>
</html>
