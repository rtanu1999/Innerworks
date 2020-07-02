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
 /* padding: 12px 8px 12px 40px; *?
  
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
 $jid=$_GET['id'];
 

include "DbConnection/DbConnectionHelper.php";

require 'PHPMailer/PHPMailerAutoload.php';
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
$mail = new PHPMailer();

include_once "WebUtils.php";
$utils = new WebUtils();
try{

        $status = true;
        $stmt = $conn->prepare("select * from jobpost where id='$jid' and status = ?");
        $stmt->bindParam(1, $status);
        $stmt->execute();
        if($stmt->rowCount() > 0)
        {


        $data = $stmt->fetchAll();
        foreach($data as $row) {
			$jtitle=$row['jobTitle'];
			$jcompany=$row['company'];
			$jtype=$row['jobType'];
			$jmaxsal=$row['maxSalary']; 
			$jlocattion=$row['location'];
			$jdegree=$row['job_educationdegree_required']; 
			$jedu=$row['job_min_experience_required'];
			$jdtime=$row['dateTime'];
			$jdesccc=$row['j_desc'];
			$jrefamt=$row['job_referalamt'];
			$type=['type'];
	
		}
        
        }
        
               
        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }

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
								$jppid=$_POST['jpid'];
								$typee=$_POST['typee'];
                                $adminEmail = 'info@innerworkindia.com';

                                //Admin Email
                                $mailSendToAdminJobSeeker = $utils->adminMailToJobSeeker($mail, $name, $contactNumber, $email, $city, $education,$skill,$interest, $exp, $file);
                                if($mailSendToAdminJobSeeker)
                                {
                                    $mailSendToUserJobSeeker = $utils->userMailToJobSeeker($mail, $name, $email);
                                    if($mailSendToUserJobSeeker)
                                    {if($typee=="Job"){
                                        $stmt = $conn->prepare('insert into jobseeker (name, gender, city, education, email, mobileNum, skill, interest, exp, file, jobpost_id) VALUES(?,?,?,?,?,?,?,?,?,?,?)');
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
                                        $stmt->bindParam(11, $jppid);
                                        $stmt->execute();
                                    }
                                    else{$stmt = $conn->prepare('insert into internship (name, email, gender, city, education, mobno, exp, skill, interest, fnamee, jobpost_id) VALUES(?,?,?,?,?,?,?,?,?,?,?)');
                                        $stmt->bindParam(1, $name);
                                        $stmt->bindParam(2, $email);
                                        $stmt->bindParam(3, $gender);
                                        $stmt->bindParam(4, $city);
                                        $stmt->bindParam(5, $education);
                                        $stmt->bindParam(6, $contactNumber);
                                        $stmt->bindParam(7, $exp);
                                        $stmt->bindParam(8, $skill);
                                        $stmt->bindParam(9, $interest);
                                        $stmt->bindParam(10, $imageName);
                                        $stmt->bindParam(11, $jppid);
                                        $stmt->execute();
                                    }
	

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
            <h2>Apply Job </h2>
            <p><a href="index">Home</a> <span>/</span>Apply Job</p>
        </div>
    </div>
</section>
<section id="jobApplication">
    <div class="container" style="background-color:#f9f9f9;margin-top: -39px; width: 100%;">
        <div class="row formDetail">
            <h2><?php echo $jtitle .' - ' .$jcompany;?></h2>
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
                                <input type="text" name="mobno" class="form-control" required="required" id="field" >
                            </div>
                         <div class="col-md-6">
                                <label for="education" style="color:#000;">Qualification</label>
                                <input type="text" name="education" class="form-control" required="required" id="field" >
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
                            <div id="myDIV" class="col-md-12">
                                <label for="skill" style="color:#000;">Skills</label>
                                <input type="text" name="skill" class="form-control" id="myInput" onkeyup="showResult(this.value)" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
								 <span onclick="newElement()" class="addBtn">Add</span>
								 <div id="livesearch"></div>
								 
								 <input type="hidden" name="hiskill" class="form-control" id="hskill" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
								  <input type="hidden" name="jpid" value="<?php echo $jid;?>" class="form-control" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
                                   <input type="hidden" name="typee" value="<?php echo $type;?>" class="form-control" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">

                            </div>
				        </div>
						<ul id="myUL">
						</ul>
						<div class="row form-group">
                            <div id="uDIV" class="col-md-12">
                                <label for="skill" style="color:#000;">Interest</label>
                                <input type="text" name="interest" class="form-control" id="uInput" onkeyup="showinterestResult(this.value)" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
								 <span onclick="newElement1()" class="uBtn">Add</span> 
								 <div id="liveisearch"></div>
								  <input type="hidden" name="hinterest" class="form-control" id="hinterest" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
                            </div>
				        </div>
						<ul id="uUL">
						</ul>
                         
						 
        <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
  <div id="drag_upload_file">
    <p>Drop file here</p>
    <p>or</p>
    <p><input type="button" value="Select File" onclick="file_explorer();" style="width: 100%;"></p>
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

<?php include_once 'Footer.php'; ?>
</body>
</html>
