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
  xmlhttp.open("GET","getSearch.php?val=1&q="+str,true);
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
  xmlhttp.open("GET","getsearch.php?val=2&q="+str,true);
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


<!--<script>
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

</script>-->
<!--<script type="text/javascript">
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
</script>--->

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

		                   $fm =  $_POST['fnamee'];
		                   $fo =  $_FILES['file']['tmp_name'];
		                   $final_path = $uploadFolder."/".$fm;

		                //     $result =	move_uploaded_file($_FILES['file']['tmp_name'],$final_path);


                                $name = $_POST['name'];
                                $gender = $_POST['gender'];
                                $city = $_POST['city'];
                                $education = $_POST['education'];
                                $contactNumber = $_POST['mobno'];
                                $email = $_POST['email'];
                                $skill = $_POST['hiskill'];
                                $interest = $_POST['hinterest'];
                                $exp = $_POST['exp'];
                                $imageName = $_POST[$fo];

                                $adminEmail = 'internship@innerworkindia.com';

                                //Admin Email
                                $mailSendToAdminJobSeeker = $utils->adminMailToJobSeeker2($mail, $name, $contactNumber, $email, $city, $education,$skill,$interest, $exp, $file);
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
    <title>Internship- Innerwork | Internship | Summer Internship 2020 | Internship in Bangalore</title>
    <?php include "CommonFiles.php"?>
    <link rel="stylesheet" href="css/collage.css">
     <link rel="stylesheet" href="css/intern.css">
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
            <h2>Internsip</h2>
            <p><a href="index">Home</a> <span>/</span>Internship</p>
        </div>
    </div>
</section>
<section id="jobApplication">
    <div class="container" style="background-color:#f9f9f9;margin-top: -39px; width: 100%;">
        <div class="row formDetail">
            <h2 class = "h2imp">#CampusToCorporate</h2>
            <div class="col-md-12">
                <div id="formSubmissionResult">
                </div>
                <div id="oneD">
                    <?php echo $result; ?>
                    <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" class="formJob" enctype="multipart/form-data" style="border: 2px solid #999;padding: 2%;width:90%;margin-left: 5%;">
                        <div id="candidateFormResult"></div>
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
                                    <option  value=""></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>


                            <div class="col-md-6">
                                <label for="city" style="color:#000;">College Name</label>
                                <input type="text" name="city" class="form-control" required="required" id="field" >
                            </div></div>
                            <div class="row form-group">
                            <div class="col-md-6">
                                <label for="education" style="color:#000;">Qualification</label>
                                <!--<input type="text" name="education" class="form-control" required="required" id="field" >-->
                                <select class="form-control" required="required" id="field" name="education">
                                  <option>BCA 1st Year</option>
                                  <option>BCA 2nd Year</option>
                                  <option>BCA 3rd Year</option>
                                  <option>BCA fresher</option>
                                  <option>BBA 1st Year</option>
                                  <option>BBA 2nd Year</option>
                                  <option>BBA 3rd Year</option>
                                  <option>BBA fresher</option>
                                  <option>B.COM 1st Year</option>
                                  <option>B.COM 2nd Year</option>
                                  <option>B.COM 3rd Year</option>
                                  <option>B.COM fresher</option>
                                  <option>BA 1st Year</option>
                                  <option>BA 2nd Year</option>
                                  <option>BA 3rd Year</option>
                                  <option>BA fresher</option>
                                  <option>MA 1st Year</option>
                                  <option>MA 2nd Year</option>
                                  <option>MA fresher</option>
                                  <option>Diploma IN Animation</option>
                                  <option>MBA 1st year</option>
                                  <option>MBA 2nd year</option>
                                  <option>MBA fresher</option>
                                  <option>M.Com 1st year</option>
                                  <option>M.Com 2nd year</option>
                                  <option>M.Com fresher</option>
                                  <option>MCA 1st year</option>
                                  <option>MCA 2nd year</option>
                                  <option>MCA 3rd year</option>
                                  <option>MCA fresher</option>
                                  <option>BBM 1st Year</option>
                                  <option>BBM 2nd Year</option>
                                  <option>BBM 3rd Year</option>
                                  <option>BBM fresher</option>
                                  <option>BE/B.Tech 1st Year</option>
                                  <option>BE/B.Tech 2nd year</option>
                                  <option>BE/B.Tech 3rd year</option>
                                  <option>BE/B.Tech 4th year</option>
                                  <option>BE/B.Tech fresher</option>
                                  <option>Graduation in Animation</option>
                                  <option>Polytecnic</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="mobno" style="color:#000;">Mobile Number</label>
                           <!--     <input type="text" name="mobno" class="form-control" required="required" id="field" >-->
                                    <input type="text" name="mobno" class="form-control" pattern="{0-9}[10]" maxlength="10" required="required" id="field" >

                            </div></div>
                             <div class="row form-group">
                            <div class="col-md-6">
                                <label for="experience" style="color:#000;">Duration</label>
                            <select class="form-control"  name="exp" required="required" id="field">
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
                            <div id="myDIV" class="col-md-12">
                                <label for="skill" style="color:#000;">Skills</label>
                                <input type="text" name="skill" class="form-control" id="myInput" onkeyup="showResult(this.value)" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
                                 <span onclick="newElement()" class="addBtn">Add</span>
                                 <div id="livesearch"></div>

                                 <input type="hidden" name="hiskill" class="form-control" id="hskill" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
                            </div>
                        </div>
                     <ul id="myUL" style="padding: 12px 8px 12px 40px;">
                        </ul>
                         <div class="row form-group">
                            <div class="col-md-12">
                                <label for="mobno" style="color:#000;">Interest</label>
                                            <input type="text" name="interest" class="form-control" id="uInput" onkeyup="showinterestResult(this.value)" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
                                 <span onclick="newElement1()" class="uBtn">Add</span>
                                 <div id="liveisearch"></div>
                                  <input type="hidden" name="hinterest" class="form-control" id="hinterest" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
                            </div>
                        </div>
                        <ul id="uUL" style="padding: 12px 8px 12px 40px;">
                        </ul>


        <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
  <div id="drag_upload_file">
    <p>Drop file here</p>
    <p>or</p>
    <p><input type="button" value="Select File" onclick="file_explorer();" style="width:fit-content !important;" name="attach1"></p>
    <input type="file" id="selectfile">
	<input type="hidden" id="filename" name="fnamee">
  </div>
</div>
<div id="showresult" class="row form-group" style="margin-bottom:3%;"></div>



                        <input type="submit" value="Submit" name="submit" class="form-control" style="margin-top:3%;width:fit-content !important;"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="img/about.jpg" alt="">
            </div>
            <div class="col-md-6">
                <h2>Internship</h2>
                <p>In this hyper-competitive job market, when companies are struggling to hire trained professionals for positions of responsibility, an internship program is of great value for both candidates and companies. It is a fact that there is a huge gap between campus and career. A well-structured internship program could be of great help in filling the gap and make your industry fit.</p>
                <p>A focused internship program could make you industry fit and grab the most suitable job at the start of your career. Innerwork, a reputed HR and IT service provider with a vast network of companies offers you highly professional internship program to equip you with most sought after skills. You can join highly customized training programs, spanning 35 to 180 days, covering HR, IT and Digital Marketing industry and get a certificate from established industry bodies.</p>
            </div>
        </div>
        <div class="row aboutContent">
            <div class="col-md-12">
                <p>Visualizing the time constraints of aspirants, Innerwork offers customized internship programs, available both online and offline. We provide both paid and an unpaid internship with the opportunity to earn stipend between INR 5000 to 8000 per month.</p>
                <p>On completion of the internship program, you will be industry ready with requisite certification to grab jobs with handsome packages in a range of INR 2 to 3 lac. The internship program is open for all B.A, B Com., BCA, B Tech, MBA graduates with a passion for learning and being fit for the specific industry. If you are still on campus and want to have a great career from the beginning, then join the Innerwork Internship program be industry-ready from day one.</p>
            </div>
        </div>
        <div class="row aboutContent">
            <div class="col-md-12">
                <h3>Be the Best Fit with Internship</h3>
                <p>For companies, it is an experience that matters most when it comes to building the talent pool for current and future requirements. The internship is the best possible to have requisite industry-specific expertise to start the career. Join an internship program and be the fit case for hiring as it helps you in several ways:</p>
                <h3>Boost of Experience</h3>
                <p>Career path is beyond classroom learning. An internship gives you an invaluable edge of experience to start a career on the front foot. During the internship, you apply acquired knowledge in practical set up and learn about real-life challenges. You learn about the much-needed communication, operational, leadership and team skills.</p>
                <h3>Freedom to Explore</h3>
                <p>Life is all about changes. Internship helps you explore career-related opportunities and realign goals as per learning experience. With time you gain confidence and make the big leap when the time comes.</p>
                <h3>Competitive Edge</h3>
                <p>Industry-specific internship prepares you to be the fit case for the industry. This fitness edge helps you stand out in a crowded space. With internship certification, you offer more than expectations, so you win the game smoothly.</p>
                <h3>Learn and Sharpen Skills</h3>
                <p>In real life set up of internship, you get to know about weaknesses and strengths. You supervisor or guide will share feedback and train you to focus on enhancing usable skills. You will learn about skill alignment and ways to rectify errors.</p>
                <h3>Opportunity to Learn and Earn</h3>
                <p>Internship equips you with the financial management skills as you could earn and learn to value your time efficiently. Success is not just about hard work but smart work with best returns on time and energy invested.</p>
                <h3> Network Building</h3>
                <p>In professional life, your network and relationship make a huge difference in career progression. During the internship, you get the opportunity to build a strong network of professionals. You learn relationship-building skills, which are of great value in the career path.</p>
                <h3>Confidence Building</h3>
                <p>Exposure to real working life and learning helps you gain confidence. You test your specific skills and enter the professional world with a big confidence boost.</p>
                <h3>Smooth Onboarding</h3>
                <p>By the time you finish your internship program, you could get an excellent great start in a company of reputation with an equally great package. If you could leave an impression, you might be in the professional league from day one.</p>
            </div>
        </div>
    </div>
</section>

<?php include_once 'Footer.php'; ?>
</body>
</html>
