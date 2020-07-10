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


<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="login-registration.js"></script>
<script src="script.js"></script>

<!-- <link rel="stylesheet" href="style.css">

<link rel="stylesheet"
    href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  -->

<style>
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
              <span style="font-size:20px;"><?php echo $_SESSION['type']; ?></span></div>
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
              <a class="nav-link" href="freelanceraction.php" >
                <i class="ni ni-book-bookmark text-green"></i>
                <span class="nav-link-text">Document</span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Employers</h5>
                      <h5 class="card-title text-uppercase text-muted mb-0">Agencys</h5>
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
                      <span class="h2 font-weight-bold mb-0"><?php if($_SESSION['status']=="1"){ echo $utils->getTotalJobseekerCnt($conn);}else{echo "---";} ?></span>
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
    <div class="row" style="padding: 10px 40px;">
        <input type="search" id="searchtitle" class="searchboox" placeholder="Search.." style="width:40%;margin-left:30%;border-radius:5%;"/>
    </div>


                                <!-- Footer -->
                              <footer class="footer pt-0">
                                <div class="row align-items-center justify-content-lg-between">
                                   <div class="col-lg-6">
                                       <div class="copyright text-center  text-lg-left  text-muted">
                                          &copy; 2020 <a href="https://www.innerworkindia.com.com" class="font-weight-bold ml-1"                                           target="_blank">INNERWORK</a>
                                       </div>
                                   </div>

                                </div>

                              </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>

  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
<script src="https://incruiter.com/assets/datatable/dataTables.select.min.js"></script>

     <script src="https://incruiter.com/assets/datatable/jquery.dataTables.min.js"></script>

     <script src="https://incruiter.com/assets/datatable/dataTables.bootstrap4.min.js"></script>

     <script src="https://incruiter.com/assets/datatable/dataTables.buttons.min.js"></script>

    <script src="https://incruiter.com/assets/js/argon.js?v=1.0.0"></script>

 <script src="https://incruiter.com/assets/js/argon2.js?v=1.0.0"></script>


</body>
<script>
$(document).on('click','.show_model',function(){
  $('.quick-view').css('visibility','visible');
  $('.quick-view').css('opacity','100');
  var id = $(this).attr('data-id');
  var j_id = $(this).attr('data-j_id');

  console.log('upload_id = '+id+' , J_id = '+j_id);


  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  });
  $.ajax({
      url: 'https://incruiter.com/account/recruiter/r_resume-quick-view',
      method: 'post',
      data: {
          id: id,
          j_id:j_id
      },
      success: function(data) {
          $('.slider').css('display','none');

    $('.contents').html(data);

        $( ".quick-view" ).animate({
          opacity: 1,
          right:0
          }, 1000, function() {
          // Animation complete.
          });



      }

  });
});

function hide(){
  $('.quick-view').css('visibility','hidden');
  $('.quick-view').css('opacity','0');
  $('.quick-view').css('right','-250%');

}

$('.show_job').click(function(){
  $('.quick-view').css('visibility','visible');
  $('.quick-view').css('opacity','100');
  var id = $(this).attr('data-id');


  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  });
  $.ajax({
      url: 'https://incruiter.com/account/recruiter/r_job-quick-view',
      method: 'post',
      data: {
          j_id: id
      },
      success: function(data) {



          $( ".quick-view" ).animate({
opacity: 1,
right:0
}, 1000, function() {
  $('.slider').css('display','none');

    $('.contents').html(data);
});


      }

  });
});

</script>

</html>
