<?php
include('loginpage.php');
include('update.php');
include_once 'DbConnection/DbConnectionHelper.php';
?>
<style type="text/css">
	form {
  width: 50%;
  height:50%;
  margin: 100px auto;
  padding: 30px;
}
input {
  width: 100%;
  border: 1px solid #f1e1e1;
  display: block;
  padding: 5px 10px;
}
button {
  border: none;
  padding: 10px;
  border-radius: 5px;
}
table {
  width: 60%;
  border-collapse: collapse;
  margin: 100px auto;
}
th,
td {
  height: 50px;
  vertical-align: center;
  border: 1px solid black;
}
</style>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>innerwork</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css" type="text/css">

    <title>Freelancer Account Details</title>
  </head>
  <body>
  	<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="assets/img/brand/logo.jpg" class="navbar-brand-img" alt="...">
        </a>
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
              <a class="nav-link" href="profile.php" >
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="freelanceraction.php" >
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Documents</span>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </nav>

    <div class="container-fluid">
    	<h2 style="margin-left: 25%;">Freelancer Documents Upload </h2>
    	<form action="uplod.php" method="post" enctype="multipart/form-data">
    		<div class="row">
    			<div class="col-md-6 ">
    				<h2>AADHAR CARD</h2>
    			</div>
    			<div class="col-md-6 ">
    			  	<input type="file" name="myfile1" required="required" accept=".pdf"></br>
    			</div>
    		</div>
    		</br>
    		<div class="row">
    			<div class="col-md-6 ">
    				<h2>PAN CARD</h2>
    			</div>
    			<div class="col-md-6 col-offset-6">
    			  	<input type="file" name="myfile2" accept=".pdf" required="required" > </br>

    			</div>
    		</div>
    		</br>
    		<div class="row">
    			<div class="col-md-6 ">
    				<h2>CV</h2>
    			</div>
    			<div class="col-md-6">
    			  	<input type="file" name="myfile3" accept=".pdf" required="required">  </br>

    			</div>
    		</div>
    		<div class="row">
    			<button type="submit" name="save">upload</button></br>

    		</div>
    	</form>
    	</div>
    </div>
  </body>
</html>
