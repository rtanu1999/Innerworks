
<?php
include('loginpage.php');
include('update.php');
if(!isset($_SESSION['type'])){
    header('location:recruiterlogin.php');
}
include_once 'DbConnection/DbConnectionHelper.php';




$result = $skill= $intTitle= $jobTitle = $company = $email = $jobType = $location = $minSalary = $maxSalary = $cpname = $cpnum = $j_desc = $exp = $education = $status = "";


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
                                            $recruiterid=$_SESSION['recruiterid'];
                                            $recruitertype=$_SESSION['type'];

                                          $stmt = $conn->prepare('insert into jobpost (jobTitle, company, email, jobType, location, minSalary, maxSalary, cpname, cpnum, j_desc, status, exp, education,about_comp,type,skills,recruiterid,recruitertype) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
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
                                                    $stmt->bindParam(17, $recruiterid);
                                                    $stmt->bindParam(18, $recruitertype);

                                                    $stmt->execute();

                                                    $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Thanks  for posting Job, will get you back soon.</div>";



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
                                            $recruiterid=$_SESSION['recruiterid'];
                                            $recruitertype=$_SESSION['type'];

                                                    $stmt = $conn->prepare('insert into jobpost (jobTitle, company, email,maxSalary, cpname, cpnum, j_desc, status, exp, education,about_comp,type,recruiterid,recruitertype) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
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
                                                    $stmt->bindParam(13,$recruiterid);
                                                    $stmt->bindParam(14,$recruitertype);

                                                    $stmt->execute();

                                                    $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Thanks  for posting Job, will get you back soon.</div>";


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
@media (max-width: 480px) {
  #myDIV{
    width:95%;
    margin-left: 2%;

  }
  #myDIV #sklabel{
    margin-left: 3%;
  }
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
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Innerwork Agency Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css" type="text/css">

      <title>Posting</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="shortcut icon" type="image/x-icon" href="img/shortcut.png">-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Vendor: Bootstrap Stylesheets http://getbootstrap.com -->
<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="all">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel="stylesheet" media="all">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" media="all">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
<link href="css/style.css" rel="stylesheet" media="all">
<link rel="shortcut icon" type="image/x-icon" href="img/fevicon.png">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

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
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
     <div class="scrollbar-inner">
          <!-- Brand -->
          <div class="sidenav-header  align-items-center" style="height:auto !important;">
             <a class="navbar-brand" href="javascript:void(0)">
               <img src="assets/img/brand/logo.jpg" class="navbar-brand-img" alt="...">

             </a>
             <div >
            <span style="font-size:20px;"></span><?php if($_SESSION['type']=="Agency"){echo "Employer Portal";}else{echo "Freelancer Portal";}  ?></div>
          </div>

      <div class="navbar-inner">
          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Nav items -->
             <ul class="navbar-nav">
                <li class="nav-item">
                 <a class="nav-link" href="dashboard.php">
                   <i class="ni ni-tv-2 text-primary"></i>
                   <span class="nav-link-text">Dashboard</span>
                </a>
              </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">
              <i class="ni ni-single-02 text-yellow"></i>
              <span class="nav-link-text">Profile</span>
            </a>
          </li>

          <li class="nav-item">
            <?php if($_SESSION['type']=="Agency"){?>
            <a class="nav-link" href="agency.php" >
            <?php }
            else{ ?>
                <a class="nav-link" href="freelanceraction.php" ><?php } ?>
              <i class="ni ni-book-bookmark text-green"></i>
              <span class="nav-link-text">Document</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="job.php">
              <i class="ni ni-single-02 text-yellow"></i>
              <span class="nav-link-text">Job | Internship Posting</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="posts.php">
              <i class="ni ni-single-02 text-yellow"></i>
              <span class="nav-link-text">Your Job Posts</span>
            </a>
          </li>
               </ul>
       </div>
     </div>
  </div>
</nav>
<div class="main-content" id="panel">
  <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Search form -->

        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">
          <li class="nav-item d-xl-none">
            <!-- Sidenav toggler -->
            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </div>
          </li>
          <li class="nav-item d-sm-none">
            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
              <i class="ni ni-zoom-split-in"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-bell-55"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
              <!-- Dropdown header -->
              <div class="px-3 py-3">
                <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
              </div>
              <!-- List group -->
              <div class="list-group list-group-flush">

        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="upload/<?php echo $_SESSION['image']; ?>">
                </span>
                <div class="media-body  ml-2  d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">xxx</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu  dropdown-menu-right ">
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Job | Internship Postings</span>
              </a>

            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid mt--6">
    <div class="row">
    		            <div class="card-body pt-0">
    		              <div class="row">
    		                <div class="col">
    		                  <div class="card-profile-stats d-flex justify-content-center">

    		                  </div>
    		                </div>
    		              </div>
    		              <div class="text-center">
    		                <h5 class="h3">
    		                  <span class="font-weight-light"></span>
    		                </h5>

    		              </div>
    		            </div>
    		          </div>
    		        </div>
    						<div class="col-xl-8 order-xl-1" style="max-width:100% !important;">

<!--<section id="jobApplication">-->

    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-8">

          </div>

        </div>
      </div>
      <div class="card-body">
<!--<div class="container" style="background-color:#f9f9f9;margin-top: -39px; width: 100%;">
     <div class="row formDetail">

         <div class="col-md-12">-->
             <div id="formSubmissionResult"></div>
                <div id="oneD">
                  <center>
                   <a id="job" class="btn btn-primary btn1"style="width: 94px;border-top-left-radius: 20px;border-bottom-left-radius: 20px;">Job</a>
                   <a id="intern" class="btn btn-primary" style="border-top-right-radius: 20px;border-bottom-right-radius: 20px;">Internship</a>
                   </center><br>
                   <?php echo $result; ?>
                    <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" id="jobp" enctype="multipart/form-data">
                       <div id="employerFormSubmitResult"></div>
                           <p><b style="color:red;">*</b>Details</p>
						                <hr>
                                 <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label" for="company">Company</label>
                                        <input type="text" name="company" value="<?php echo $_SESSION['companyname']; ?>" id="input-first-name" class="form-control" required="required">
                                    </div>
                                  </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label" for="jobTitle">Job Title</label>
                                        <input type="text" name="jobTitle" id="input-title" class="form-control" required="required" >
                                    </div>
                                </div>
                              </div>
                                    <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label" for="email" >Email</label>
                                        <input type="email" value=" <?php echo $_SESSION['email']; ?>" name="email" id="input-email" class="form-control" required="required">
                                    </div>
                                  </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label" for="jobType" >Job Type</label>
                                        <select name="jobType" class="form-control" required="required" id="input-type">
                                            <option value="Fresher">Fresher</option>
                                            <option value="Experience">Experience</option>
                                        </select>
                                    </div>
                                    </div>
                                  </div>
                                    <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label for="location" class="form-control-label">Location</label>
                                        <input type="text" name="location" id="input-city" class="form-control" required="required">
                                    </div>
                                  </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label for="salary"  class="form-control-label">Salary Range</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" id="input-sal" name="minSalary" id="minSalary" placeholder="&nbsp; ₹ Minimum" class="form-control" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="input-sal" name="maxSalary" id="maxSalary" placeholder="&nbsp; ₹ Maximum" class="form-control" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label for="cpname" class="form-control-label">Contact Person Name</label>
                                        <input type="text" value=" <?php echo $_SESSION['contactperson']; ?>" name="cpname" id="input-name" class="form-control" required="required">
                                    </div>
                                  </div>
                                   <div class="col-lg-6">
                                     <div class="form-group">
                                        <label for="cpnum" class="form-control-label" >Contact Person Number</label>
                                        <input type="text" value=" <?php echo $_SESSION['mobile']; ?>" name="cpnum" id="input-mobile" class="form-control" required="required" pattern="{0-9}[10]" maxlength="10">
                                    </div></div>
                                  </div>
                                     <div class="row">

                                    <div class="col-lg-6"  >
                                      <div class="form-group">
                                        <label for="education" class="form-control-label" >Education Required</label>
                                        <select class="form-control"  name="education" required="required" id="input-education">
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
                                  </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label for="experience" class="form-control-label">Experience</label>
                            <select class="form-control"  name="exp" required="required" id="input-exp">
                                <option value=""></option>
                                <option>0-1 year</option>
                                <option>1-2 years</option>
                                <option>2-3 years</option>
                                <option>3-4 years</option>
                                <option>4-5 years</option>
                                <option>Others</option>
                                </select>
                              </div> </div></div>
                                       <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label for="cpname" class="form-control-label">Job Description</label>
                                        <textarea name="j_desc" id="input-company" class="form-control" required="required" rows="6" cols="50"> 1) &#10; 2) &#10; 3) &#10; 4)</textarea>
                                        </div>
                                      </div>

                                <div class="col-lg-6">
                                  <div class="form-group">
                                        <label for="cpname" class="form-control-label">About Company</label>
                                        <textarea name="about_comp" id="input-desc" class="form-control" required="required" rows="6" cols="50"></textarea>
                                      </div></div></div>
                                      <div class="row ">
                                        <div class="col-lg-6">
                                          <div class="form-group">
                                                        <!-- <label for="skill" class="form-control-label">Skills</label>-->
                                                         <input type="text" placeholder="Skills" name="skill" class="form-control" id="myInput" onkeyup="showResult(this.value)" style="margin:0;  padding: 10px;float: left;font-size: 16px;">
                                                       </div></div><span onclick="newElement()" class="addBtn">Add</span> <div id="myDIV" class="col-md-12">
                                                          <div id="livesearch"></div>

                                                          <input type="hidden" name="hiskill" class="form-control" id="hskill" style="margin:0; padding: 10px;float: left;font-size: 16px;">
                                                     </div>
                                                 </div>
                                              <ul id="myUL" style="padding: 12px 8px 12px 40px;">
                                                 </ul>
<center>
                            <input type="submit" onclick="return submitEmployerForm()" value="Submit" name="submit1" class="btn btn-info" style="margin-top: 3%;"/>
                          </center>  </form>
                            <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" id="internp" enctype="multipart/form-data" >
                            <div id="candidateFormResult"></div>
                              <p><b style="color:red;">*</b>Details</p>
						      <hr>
                            <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="candidateName"  class="form-control-label" >Company</label>
                                <input type="text" value=" <?php echo $_SESSION['companyname']; ?>" name="company" class="form-control" required="required" id="input-first-name">
                            </div>
                          </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                  <label for="jobTitle" class="form-control-label" >Internship Title</label>
                                  <input type="text" name="intTitle" id="input-title" class="form-control" required="required">
                            </div>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="education" class="form-control-label">Highest Qualification</label>
                                <select class="form-control"  name="education" required="required" id="input-education">
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
                          </div>


                            <div class="col-lg-6">
                              <div class="form-group">
                            <label for="experience" class="form-control-label">Duration</label>
                            <select class="form-control" name="exp" required="required" id="input-exp">
                                <option value=""></option>
                                <option></option>
                                <option>45 days</option>
                                <option>1 month</option>
                                <option>2 months</option>
                                <option>3 months</option>
                                <option>6 months</option>
                                </select>
                              </div></div></div>
                                <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="stipend" class="form-control-label">Stipend</label>

                                                <input type="text" id="input-sal" name="maxSalary" id="maxSalary" placeholder="&nbsp; ₹ Stipend" class="form-control" required="required">


                            </div>
</div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                <label for="email" class="form-control-label" >Email</label>
                                <input type="email" value=" <?php echo $_SESSION['email']; ?>" name="email" class="form-control" required="required" id="input-email">
                            </div></div></div>
                            <div class="row">

                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label for="cpname" class="form-control-label">Contact Person Name</label>
                                        <input type="text" value=" <?php echo $_SESSION['contactperson']; ?>" name="cpname" id="input-name" class="form-control" required="required">
                                    </div></div>
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                        <label for="cpnum" class="form-control-label">Contact Person Number</label>
                                        <input type="text" value=" <?php echo $_SESSION['mobile']; ?>" name="cpnum" id="input-mobile" class="form-control" required="required" pattern="{0-9}[10]" maxlength="10">
                                    </div></div></div>
                                    <div class="row">
                                         <div class="col-lg-6">
                                           <div class="form-group">
                                        <label for="cpname" class="form-control-label">Company Description</label>
                                        <textarea name="about_comp" id="input-company" class="form-control" required="required" rows="6" cols="50"></textarea>
                                      </div></div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="idesc" class="form-control-label">Internship Description</label>
                                        <textarea name="j_desc" id="input-desc" class="form-control" required="required" rows="6" cols="50"> 1) &#10; 2) &#10; 3) &#10; 4)</textarea>
                                    </div>

                                  </div></div>
                                  <div class="row ">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                                    <!-- <label for="skill" class="form-control-label">Skills</label>-->
                                                     <input type="text" placeholder="Skills" name="interest" class="form-control" id="uInput" onkeyup="showinterestResult(this.value)" style="margin:0;  padding: 10px;float: left;font-size: 16px;">
                                                   </div></div><span onclick="newElement1()" class="uBtn">Add</span> <div id="myDIV" class="col-md-12">
                                                      <div id="liveisearch"></div>

                                                      <input type="hidden" name="hinterest" class="form-control" id="hinterest" style="margin:0; padding: 10px;float: left;font-size: 16px;">
                                                 </div>
                                             </div>
                                          <ul id="uUL" style="padding: 12px 8px 12px 40px;">
                                             </ul>

				    <!-- CODE start -->
				   <!-- <div class="row">
                        	    <div class="col-md-12">
                                	<label for="mobno" style="color:#000;">Skills</label>
                                            <input type="text" name="interest" class="form-control" id="uInput" onkeyup="showinterestResult(this.value)" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
                                 <span onclick="newElement1()" class="uBtn">Add</span>
                                 <div id="liveisearch"></div>
                                  <input type="hidden" name="hinterest" class="form-control" id="hinterest" style="margin:0;border:none;border-radius:0;width:75%;  padding: 10px;float: left;font-size: 16px;">
                            </div>
                        </div>
                        <ul id="uUL" style="padding: 12px 8px 12px 40px;">
                        </ul>-->
			<!-- CODE END-->
<div id="showresult" class="row form-group" style="margin-bottom:3%;"></div>


<center>
                        <input type="submit" value="Submit" name="submit2" class="btn btn-info" style="margin-top:3%;">
                  </center>  </form>
                        </div>
                        <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                        <script src="assets/vendor/js-cookie/js.cookie.js"></script>
                        <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
                        <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>

                        <!-- Argon JS -->
                        <script src="assets/js/argon.js?v=1.2.0"></script>


                          <script src="https://incruiter.com/assets/js/argon.js?v=1.0.0"></script>

                       <script src="https://incruiter.com/assets/js/argon2.js?v=1.0.0"></script>
                      <style>
                      .input-group>.custom-select:not(:last-child), .input-group>.form-control:not(:last-child) {
                          border-top-right-radius: 0;
                          border-bottom-right-radius: 0;
                      }</style>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

                      <!--   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
                         <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>




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
</div>
</body>
</html>
