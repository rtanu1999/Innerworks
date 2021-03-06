<?php

include('loginpage.php');
include('update.php');

if(!isset($_SESSION['type'])){
    header('location:recruiterlogin.php');
}
include_once 'DbConnection/DbConnectionHelper.php';
include_once 'admin/Utils.php';
$utils = new Utils();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
  <title>Innerwork Dashboard</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css" type="text/css">
   <link href="css/opening.css"  rel="stylesheet">
	 <link href="css/common.css"  rel="stylesheet">
   <link href="css/demo.css"  rel="stylesheet">
  <!-- <script src="js/jquery-1.10.2.min.js"></script>-->
     <script src="js/jquery-ui.js"></script>
     <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>


<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="login-registration.js"></script>
<script src="script.js"></script>

<!--<link rel="stylesheet" href="style.css">

<link rel="stylesheet"
    href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<style>
.list-group-item {
      padding: 0.5rem 0.5rem;}
label {

  font-weight: normal !important;
}
@media only screen and (max-width: 521px){
#le {display: none;}
#mi{display:block;
flex: 100% !important; width:150% !important;}
#ch{padding:10px !important;}
.internships-tabs{width:inherit;}
.btn{width:50%;}
.col-12{width:138%;}
}
</style>
<style>
.col{padding-right: unset !important;}
.card-body{padding: 0.8rem !important;}
.small{
  overflow-y: scroll;
}
.image-source {
    border-radius: 50%;
}

</style>

</head>

<body>
  <!-- Sidenav -->

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
                   <a class="nav-link active" href="dashboard.php">
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
              <a class="nav-link" href="job.php">
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
  <!-- Main content -->
  <div class="main-content" id="panel">
       <!-- Topnav -->
       <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
          <div class="container-fluid">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
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

            <li class="nav-item dropdown">
               <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="ni ni-bell-55"></i>
               </a>
                <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                   <!-- Dropdown header -->
                   <div class="px-3 py-3">
                     <h6 class="text-sm text-muted m-0">You have <strong class="text-primary"></strong> notifications.</h6>
                   </div>
                   <!-- List group -->
                     <div class="list-group list-group-flush">
                        <h6></h6>
                    <!-- View all -->
                      <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                     </div>
            </li>

          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">

                  <span class="image-source">
             <img src="upload/<?php echo $_SESSION['image']; ?>" class="rounded-circle" width="50px">

         </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['companyname']; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                 <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome!</h6>
                 </div>
                <div class="dropdown-divider"></div>

            <a href="logout.php" class="dropdown-item">

              <i class="ni ni-user-run"></i>

              <span>Logout</span>

            </a>

          </div>

            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
         <!-- Header -->
      <div class="header bg-primary pb-6">
           <div class="container-fluid">
               <div class="header-body">

                  <!-- Card stats -->
                 <div class="row">

                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                          <!-- Card body -->
                          <div class="card-body">
                             <div class="row">
                               <div class="col">
                                 <h5 class="card-title text-uppercase text-muted mb-0">FREELANCERS</h5>
                                 <span class="h2 font-weight-bold mb-0"><?php if($_SESSION['status']=="1"){echo $utils->getTotalfreelancerCnt($conn);}else{echo "---";}  ?></span>
                               </div>
                                <div class="col-auto">
                                  <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>

                                 </div>
                              </div>
                           </div>

                        </div>
                     </div>
               </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h6 class="card-title text-uppercase text-muted mb-0">Employers|Agency</h6>

                      <span class="h2 font-weight-bold mb-0"><?php if($_SESSION['status']=="1"){ echo $utils->getTotalagencyCnt($conn);}else{echo "---";} ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                       </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Open jobs</h5>
                      <span class="h2 font-weight-bold mb-0"><?php if($_SESSION['status']=="1"){ echo $utils->getTotalJobpostCnt($conn);}else{echo "---";} ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Active Candidates</h5>
                      <span class="h2 font-weight-bold mb-0"><?php if($_SESSION['status']=="1"){ echo (($utils->getTotalinternsCnt($conn))+$utils->getTotalJobseekerCnt($conn));}else{echo "---";} ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
<br>
<div class="row">
  <div class="col-12">
    <h1 class="text-center">Analytics</h1>
  </div>
</div>
<hr>

<section id="opening">
     <div class="row" style="padding: 10px 40px;">

             <input type="search" id="searchtitle" class="searchboox" placeholder="Search Candidates..." style="width:100%;"/>



   </div>
        <div class="row" id="ch" style="padding: 40px;">
  <div class="column" id = "le" style = "flex: 25%;max-width: 25%;padding: 0 4px;font-weight:normal;height: 940px;overflow-y: scroll;">

     	<div id="filtersection" style="display:block;padding: 10px 20px 20px 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin: 20px 0px;
    font-weight:normal !important;">
     	    <h3 >Search by</h3><hr style="margin-top:0px;margin-bottom:0px;">
          <div class="list-group">
                  <h5 style="font-weight:bold;">Type</h5>
                            <div class = "col-12"style="padding-left: 0;padding-right: 0;font-size: 80%;">
                  <?php

                            $query = "(SELECT DISTINCT(type) FROM jobseeker WHERE type IS NOT NULL) UNION (SELECT DISTINCT(type) FROM internship WHERE type IS NOT NULL) ";

                            $statement = $conn->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            foreach($result as $row)
                            {
                            ?>
                            <div class="list-group-item ">
                                <label><input type="checkbox" class="common_selector type" value="<?php echo $row['type']; ?>"  > <?php echo $row['type']; ?></label>
                            </div>
                            <?php
                            }

                            ?>
                            </div>
                        </div>
	<div class="list-group" style="height: 450px;margin-bottom:40px;">
					<h5 style="font-weight:bold;">Location</h5>
                    <div class = "col-12 small"style="padding-left: 0;padding-right: 0;">
					<?php

                    $query = "SELECT DISTINCT(city) FROM jobseeker WHERE city IS NOT NULL ";

                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item ">
                        <label><input type="checkbox" class="common_selector loc" value="<?php echo $row['city']; ?>"  > <?php echo $row['city']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

				<div class="list-group" style="height: 450px;margin-bottom:40px;">
					<h5 style="font-weight:bold;">Experience</h5>
						<div class = "col-12 small"style="padding-left: 0;padding-right: 0;">
					<?php
                   $query2 = "(SELECT DISTINCT(exp) FROM jobseeker WHERE exp IS NOT NULL) UNION (SELECT DISTINCT(exp) FROM internship WHERE exp IS NOT NULL)";
                   $statement = $conn->prepare($query2);
                    $statement->execute();
                    $result2 = $statement->fetchAll();
                    foreach($result2 as $row2)
                    {
                    ?>
                    <div class="list-group-item ">
                        <label><input type="checkbox" class="common_selector exp" value="<?php echo $row2['exp']; ?>"  > <?php echo $row2['exp']; ?></label>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                </div>


                              <div class="list-group " style="height: 450px;margin-bottom:40px;">
                                      <h5 style="font-weight:bold;">Skills</h5>
                                                <div class = "col-12 small"style="padding-left: 0;padding-right: 0;">
                                      <?php

                                                $query = "(SELECT DISTINCT(skill) FROM jobseeker WHERE skill IS NOT NULL) UNION (SELECT DISTINCT(skill) FROM internship WHERE skill IS NOT NULL)";

                                                $statement = $conn->prepare($query);
                                                $statement->execute();
                                                $result = $statement->fetchAll();
                                                foreach($result as $row)
                                                {

                                                ?>
                                                <div class="list-group-item ">
                                                    <label><input type="checkbox" class="common_selector skills" value="<?php echo $row['skill']; ?>"  > <?php echo $row['skill']; ?></label>
                                                </div>
                                                <?php
                                                }

                                                ?>
                                                </div>
                                            </div>
                                            <div class="list-group" style="height: 450px;margin-bottom:40px;">
                                          					<h5 style="font-weight:bold;">Education</h5>
                                                              <div class = "col-12 small"style="padding-left: 0;padding-right: 0;">
                                          					<?php

                                                              $query = " (SELECT DISTINCT(education) FROM jobseeker WHERE education IS NOT NULL) UNION (SELECT DISTINCT(education) FROM internship WHERE education IS NOT NULL)";

                                                              $statement = $conn->prepare($query);
                                                              $statement->execute();
                                                              $result = $statement->fetchAll();
                                                              foreach($result as $row)
                                                              {
                                                              ?>
                                                              <div class="list-group-item ">
                                                                  <label><input type="checkbox" class="common_selector edu" value="<?php echo $row['education']; ?>"  > <?php echo $row['education']; ?></label>
                                                              </div>
                                                              <?php
                                                              }

                                                              ?>
                                                              </div>
                                                          </div>
                <p id="clearfilter" style="font-weight:bold; color:red;cursor: pointer;"></p>
  </div>
  </div>

  <div class="column" id='mi'style = "flex: 50%;max-width:100%;padding: 0 4px;overflow-y: scroll;overflow-x: hidden;max-height: 940px;padding-top:1.5%;">
    <div class="list-group" style="display:block;box-sizing:border-box;">
					 <div class="filter_data">



		</div>
    </div>

  </div>








    </div>
</section>
<!-- Argon Scripts -->
  <!-- Core -->
<!--  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>-->
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





<style>
#loading
{
	text-align:center;
	background: url('loader.gif') no-repeat center;
	height: 150px;
}
.searchboox
 {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 1px;
  font-size: 16px;
  background-color: white;
  background-image: url('img/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  transition: width 0.4s ease-in-out;
  height:41px;
}

.searchboox:focus
{
  width: 80%;
}

</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {<?php if($_SESSION['status']=="1"){ ?>

        $('.filter_data').html('<div id="loading" style="" ></div>');

        var action = 'fetch_data';
        var sectitle = $('#searchtitle').val();
       // var maximum_price = $('#hidden_maximum_price').val();
        var loc = get_filter('loc');

        var exp = get_filter('exp');
        var type= get_filter('type');
         var skills = get_filter('skills');
        var edu = get_filter('edu');
        $.ajax({
            url:"getcandidateajax.php",
            method:"POST",
            data:{action:action, sectitle:sectitle, type:type, loc:loc, exp:exp, skills:skills, edu:edu},
            success:function(data){

                $('.filter_data').html(data);
            }
        });
    <?php  }
  else{?>
     $('.filter_data').html('<div class="alert alert-danger alert-dismissable"><strong>Your dashboard is locked!</strong>Please upload your documents and wait for admin to activate your account.</div>');  <?php }  ?>
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
            $('#clearfilter').html('Clear Filter');
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });
$('#searchtitle').keyup(function(){
        filter_data();
    });
$('#filtersectionbtn').click(function() {
    $('#filtersection').toggle();
});
$('#clearfilter').click(function() {

	$(".loc").prop("checked", false);
	$(".exp").prop("checked", false);
	$(".type").prop("checked", false);
  $(".skills").prop("checked", false);
  $(".edu").prop("checked", false);
	 $('#clearfilter').html('');
	 $('#searchtitle').val('');

	filter_data();
});
});
</script>
</body>
</html>
