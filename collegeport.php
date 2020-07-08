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

 /* padding: 12px 8px 12px 40px; */


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


$result = $collegename = $university = $city = $email = $looking = $website = $dept = $numofstudent = $aboutcollege = $writeuscollege = "";
$mailSendToAdminJobSeeker = $mailSendToUserJobSeeker = false;

if(isset($_POST['submit'])) {
    if ($_POST['collegename'] != null && !empty($_POST['collegename'])) {
        if ($_POST['university'] != null && !empty($_POST['university'])) {
            if ($_POST['city'] != null && !empty($_POST['city'])) {
                if ($_POST['email'] != null && !empty($_POST['email'])) {
                    if ($_POST['looking'] != null && !empty($_POST['looking'])) {
                        if ($_POST['website'] != null && !empty($_POST['website'])) {
                            if ($_POST['dept'] != null && !empty($_POST['dept'])) {
                                if ($_POST['numofstudent'] != null && !empty($_POST['numofstudent'])) {
                                  if ($_POST['aboutcollege'] != null && !empty($_POST['aboutcollege'])) {
                                     if ($_POST['writeuscollege'] != null && !empty($_POST['writeuscollege'])) {



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


                                $collegename = $_POST['collegename'];
                                $university = $_POST['university'];
                                $city = $_POST['city'];
                                $email = $_POST['email'];
                                $looking = $_POST['looking'];
                                $website = $_POST['website'];
                                $dept = $_POST['dept'];
                                $numofstudent = $_POST['numofstudent'];
                                $aboutcollege = $_POST['aboutcollege'];
                                $writeuscollege= $_POST['writeuscollege'];

                                // $adminEmail = 'info@innerworkindia.com';
                                $adminEmail = 'hr@innerworkindia.com';

                                //Admin Email
                                $mailSendToAdminJobSeeker = $utils->adminMailToJobSeeker1($mail, $collegename, $university, $city, $email, $looking,$website,$dept, $numofstudent, $aboutcollege, $writeuscollege);
                                if($mailSendToAdminJobSeeker)
                                {
                                    $mailSendToUserJobSeeker = $utils->userMailToJobSeeker($mail, $collegename, $email);
                                    if($mailSendToUserJobSeeker)
                                    {
                                        $stmt = $conn->prepare('insert into collegeportal (collegename, university, city, email, looking, website, dept, numofstudent, aboutcollege, writeuscollege) VALUES(?,?,?,?,?,?,?,?,?,?)');
                                        $stmt->bindParam(1, $collegename);
                                        $stmt->bindParam(2, $university);
                                        $stmt->bindParam(3, $city);
                                        $stmt->bindParam(4, $email);
                                        $stmt->bindParam(5, $looking);
                                        $stmt->bindParam(6, $website);
                                        $stmt->bindParam(7, $dept);
                                        $stmt->bindParam(8, $numofstudent);
                                        $stmt->bindParam(9, $writeuscollege);
                                        $stmt->bindParam(10, $aboutcollege);

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
        }
        else {
                $result = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Please Enter about college.</div>";
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
    <title>College Application Form</title>
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


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-147188985-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-147188985-1');
</script>
    <link rel="stylesheet" href="css/collage.css">
</head>
<body>
<?php include_once 'Header.php'; ?>
    <section id="banner">
    <div class="container">
        <div class="col-md-12"></div>
        <div class="col-md-12">
            <center>
            <h2>College Application</h2>
            <p><a href="index">Home</a> <span>/</span>College Application</p>
            </center>
        </div>
    </div>
</section>

    <section id="jobApplication">
    <div class="container" style="background-color:#f9f9f9;margin-top: -39px; width: 100%;">
        <div class="row formDetail">
            <h2>College Application Form</h2>
            <div class="col-md-12">
                <div id="formSubmissionResult">
                </div>
                <div id="oneD">
                    <?php echo $result; ?>
                    <form action=""/intern.php"" method="post" id="internp" class="formJob" enctype="multipart/form-data" style="border: 2px solid #999;padding: 2%;width:90%;margin-left: 5%;">
                   <div id="candidateFormResult"></div>
                              <p><b style="color:red;">*</b>Details</p>
						      <hr>
                            <div class="row form-group">
                            <div class="col-md-6">
                                <label for="collegename" style="color:#000;">College Name</label>
                                <input type="text" name="collegename" class="form-control" required="required" id="field">
                            </div>
                            <div class="col-md-6">
                                  <label for="university" style="color:#000;">University Name</label>
                                  <input type="text" name="university" id="field" class="form-control" required="required">
                            </div>
                            </div>
                           <div class="row form-group">
                            <div class="col-md-6">
                                <label for="city" style="color:#000;">City</label>
                                <input type="text" name="city" class="form-control" required="required" id="field">
                            </div>
                            <div class="col-md-6">
                                <label for="email" style="color:#000;">E-mail</label>
                                <input type="email" name="email" class="form-control" required="required" id="field">
                            </div>
                            </div>
                            <div class="row form-group">
                            <div class="col-md-6">
                            <label for="looking" style="color:#000;">Looking for:</label>
                            <select class="form-control" name="looking" required="required" id="field">
                                <option value=""></option>
                                <option></option>
                                <option>Internship</option>
                                <option>Placement</option>
                                <option>Workshop</option>
                                </select>
                                </div>
                                <div class="col-md-6">
                                <label for="website" style="color:#000;">Website</label>
                                <input type="text" name="website" class="form-control" required="required" id="field">
                            </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="dept" style="color:#000;">Department</label>
                                        <select class="form-control" name="dept" required="required" id="field">
                                            <option value=""></option>
                                            <option>Eng-CSE</option>
                                            <option>Eng-ECE</option>
                                            <option>Eng-EEE</option>
                                            <option>Eng-Civil</option>
                                            <option>Eng-Mechanical</option>
                                            <option>Eng-Chemical</option>
                                            <option>Eng-Management</option>
                                            <option>Eng-Aeronotical</option>
                                            <option>Eng-Automobile</option>
                                            <option>Eng-Biomedical</option>
                                            <option>Eng-Ceramic</option>
                                            <option>Eng-Construction</option>
                                            <option>Eng-Environmental</option>
                                            <option>Eng-Marine</option>
                                            <option>Eng-Mechatronics</option>
                                            <option>Eng-Metallurgical</option>
                                            <option>Eng-Mining</option>
                                            <option>Eng-Petroleum</option>
                                            <option>Eng-Power</option>
                                            <option>Eng-Production</option>
                                            <option>Eng-Robotics</option>
                                            <option>Eng-Structural</option>
                                            <option>Eng-Telecommunication</option>
                                            <option>Eng-Textile</option>
                                            <option>Eng-Tool</option>
                                            <option>Eng-Transportation</option>
                                            <option>BBA</option>
                                            <option>BCA</option>
                                            <option>MCA</option>
                                            <option>B.Com</option>
                                            <option>M.Com</option>
                                            <option>BBM</option>
                                            <option>MBA</option>
                                            <option>BA</option>
                                            <option>MA</option>
                                            <option>B.Sc</option>
                                            <option>M.Sc</option>
                                            <option>Animation</option>
                                            <option>Polytechnic</option>
                                            </select>
                                        </div>
                                    <div class="col-md-6">
                                        <label for="numofstudent" style="color:#000;">Number of students</label>
                                        <input type="text" name="numofstudent" id="field" class="form-control" required="required">
                                    </div></div>
				<div class="row form-group">
					<div class="col-md-6">
						<label for="Contact " style="color:#000;">Contact Number</label>
						 <input type="text" name="phone" pattern="[0-9]{10}" maxlength="10" id="field" class="form-control" required="required">
                                    	</div>
					<div class="col-md-6">
                                    		<label for="Contact Person Name " style="color:#000;">Contact Person Name</label>
                                    		<input type="text" name="contactperson"  id="field"placeholder="Contact Person Name" class="form-control" required="required">
                                  	</div>
				</div>
                                  <div class="row form-group">
                                      <div class="col-md-6">
                                        <label for="aboutcollege" style="color:#000;">About the college!</label>
                                        <textarea name="aboutcollege" id="field" class="form-control" required="required" rows="6" cols="50"></textarea>
                                        </div>
                                      <div class="col-md-6">
                                        <label for="writeuscollege" style="color:#000;">Write Us!</label>
                                        <textarea name="writeuscollege" id="field" class="form-control" required="required" rows="6" cols="50"></textarea>
                                    </div>
					                                      <div id="showresult" class="row form-group" style="margin-bottom:3%;"></div>






                                             <div>    <center><input type="submit" value="Submit" name="submit" class="form-control" style="margin-top:3%;float:left;"></center></div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
    <section id="about">
    <div class="container">
        <div class="row formDetail">
         <div class="col-md-12">
         <h3 style="text-align:center;">College Application Form</h3>
         <p style="text-align:center;">Find right solutions at Innerwork Customer Portal. We would be glad to assist you!</p>
         </div>

        <div class="row">
            <div class="col-md-6">
                <img src="img/freelancerHr.jpg" alt="">
            </div>
            <div class="col-md-6">
                <h2>College Placement</h2>
                <p>The quality and depth of the talent pool are the most important driving force for any organization. All successful companies go to college campuses in search of fresh and creative talents to build a strong talent pool. Hiring fresh talents from campuses requires a different approach. Highly experienced HR professionals of Innerwork, a trustworthy HR & IT service provider, are fully equipped with modern techniques and resources to help companies hire quality talents from college campuses. Our customized college placement service has helped several renowned companies, academic institutions, and students coordinate effectively to build a robust college placement system.     </p>
                <p>We are one of the most reliable placement service providers in India with a track record of setting well-organized placement cells across several renowned institutions.</p>
            </div>
        </div>
        <div class="row aboutContent">
            <div class="col-md-12">
                <p> Our visionary HR professionals provide long-term placement solutions with a focus on finding the right balance between 3Cs, namely the Company, College, and Candidate. The productivity centric approach of building a future-ready talent pool helps us design and deliver customized college placement solutions to meet unique talent requirements in the most cost-effective manner. </p>
                <p>Innerwork has a large pool of highly qualified placement experts with a full understanding of contemporary job trends and developing future scenarios. We act in coordination to bridge the gap between all the 3 Cs. The whole placement process has been custom designed to make campus hiring cost-effective, productive and efficient. </p>
                <p>We pay special attention to transforming campus talents into perfect aspirants by training them for all types of college placements. Fresh brains need hand-holding so that they could enter the corporate world with a passion to make a difference for self and organization. Our college placement solution is appreciated by all and the reasons are many. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Bridging 3C Gap Effectively</h2>
                <p>The dynamism of College, Company, and Candidate (3Cs) makes placement a challenging task. It requires a special approach to hiring as one has to deal with aspiring fresh minds and companies in need of futuristic talents. Innerwork offers comprehensive college placement solutions beneficial for all three Cs. </p>
                <div class="row">
                    <h3>Quality Talent</h3>
                    <p>Our HR and recruitment experts are fully aligned with current and future job market dynamics. So, they walk with you to understand your requirements and accordingly offer customized placement solutions to help you build a pool of highly qualified suitable talents. We look beyond vacancy filling and try to build a system of talent channeling from campus to companies. </p>
                    <h3>Diversified Approach  </h3>
                    <p>Whatever is your need, we provide highly diversified hiring solutions to help you meet the manpower requirements in the short and long run. Our experts with a vast network of companies help you coordinate better and find suitable jobs with the best compensation for students. We work to find the right balance of quality, volume, and compensation. </p>
                    <h3>Cost-Effective and Time Efficient </h3>
                    <p>We focus on understanding the need better so that a better placement strategy could be devised. We offer customized placement solutions to help you build the best talent pool at minimum cost. Our lean approach is highly efficient in identifying and hiring the best talent in the quickest possible time.  </p>
                    <h3>Smart Talent Filtering </h3>
                    <p>We look beyond hiring and understand the challenge of retaining highly aspirational talents. We have a very robust talent filtering system to ensure quality hiring and smooth onboarding with a focus on high retention and low attrition.  </p>
                    <h3>Mega Network </h3>
                    <p>The right job for the right talent is our mantra. We work to bridge the gap between campus and company with a focus on finding the perfect aspiration-to-requirement match. Our professionals manage a vast network of companies and colleges so that all candidates could get the right job and all companies could get suitable talents. </p>
                    <h3>Train Talents</h3>
                    <p>Our experts transform raw talents into a world-class highly productive manpower suitable for the right profile. You might be the best on campus, but you have to learn some skills to remain the best in the corporate world as well. We provide the most advanced training to make talents suitable for contemporary corporate requirements. </p>
                </div>
            </div>

        </div>
    </div>
        </div>
</section>

<?php include_once 'Footer.php'; ?>
</body>
</html>
