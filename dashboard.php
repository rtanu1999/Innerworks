<?php
include('loginpage.php');
include('update.php');

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
                                 <span class="h2 font-weight-bold mb-0"><?php echo $utils->getTotalfreelancerCnt($conn); ?></span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">ACTIVE EMPLOYERS|AGENCYS</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $utils->getTotalagencyCnt($conn); ?></span>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">open jobs</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $utils->getTotalJobpostCnt($conn); ?></span>
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
                      <span class="h2 font-weight-bold mb-0"><?php echo $utils->getTotalJobseekerCnt($conn); ?></span>
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

<div class="row">
  <div class="col-lg-6 col-md-12 col-12 mt-2">
    
    <div class="card jobs-no-analytics">
      <div class="card-body">
        <h5 class="card-title job_title">Jobs</h5>
        <h3 class="text-center font-weight-bold">No Analytics Available</h3>
      </div>
    </div>
  </div>
  
  <div class="col-lg-6 col-md-12 col-12 mt-2">
    
    <div class="card resumes-no-analytics">
      <div class="card-body">
        <h5 class="card-title resume_title">Resumes</h5>
        <h3 class="text-center font-weight-bold">No Analytics Available</h3>
      </div>
    </div>
  </div>
 
</div>
<br>
<div class="row">
   
   <div class="col-lg-6 col-md-12 col-12 mt-2">
    
    <div class="card candidates-no-analytics">
      <div class="card-body">
        <h5 class="card-title candidate_title">Candidates</h5>
        <h3 class="text-center font-weight-bold">No Analytics Available</h3>
      </div>
    </div>
  </div>

  
  <div class="col-lg-6 col-md-12 col-12 mt-2">
    
    <div class="card hires-no-analytics">
      <div class="card-body">
        <h5 class="card-title">Number of Hires</h5>
        <h3 class="text-center font-weight-bold">No Analytics Available</h3>
      </div>
    </div>
  </div>
</div>



   <script>
 
      var active_jobs = "0";
      var paused_jobs = "0";
      var rejected_jobs = "0";
      var closed_jobs = "0";
      var total_jobs = parseInt(active_jobs)+parseInt(paused_jobs)+parseInt(rejected_jobs)+parseInt(closed_jobs);
      $('.job_title').html('Jobs ('+total_jobs+')');

      if(total_jobs == 0){
        $('.jobs-analytics').hide();
        $('.jobs-no-analytics').show();
      }else{
            $('.jobs-analytics').show();
            $('.jobs-no-analytics').hide();
          var ctx = document.getElementById('jobsChart').getContext('2d');
          var data = {
              datasets: [{
                  data: [active_jobs, paused_jobs,rejected_jobs,closed_jobs],
                  backgroundColor: [ "#80effe", "#1be3fe", "#01c9e4","#019db2"]
              }],
    
              // These labels appear in the legend and in the tooltips when hovering different arcs
              labels: [
                  
                  'Active ('+active_jobs+')',
                  'Paused ('+paused_jobs+')',
                  'Rejected ('+rejected_jobs+')',
                  'Closed ('+closed_jobs+')'
              ]
            
          };
           // For a pie chart
      var myPieChart = new Chart(ctx, {
          type: 'pie',
          data: data
      });
      }
      
           


      // for resumes 
      var pending_resumes = "0";
      var accepted_resumes = "0";
      var rejected_resumes = "0";
      var scheduled_resumes = "0";
      var total_resumes =parseInt(pending_resumes)+parseInt(accepted_resumes)+parseInt(rejected_resumes)+parseInt(scheduled_resumes);
      $('.resume_title').html('Resumes ('+total_resumes+')');
 
      if(total_resumes == 0){
        $('.resumes-no-analytics').show();
        $('.resumes-analytics').hide();
      }else{
        $('.resumes-no-analytics').hide();
        $('.resumes-analytics').show();
        var resumeChart = document.getElementById('resumeChart').getContext('2d');
      var resume_date = {
          datasets: [{
              data: [pending_resumes, accepted_resumes, rejected_resumes ,scheduled_resumes],
              backgroundColor: [ "#80effe", "#1be3fe", "#01c9e4","#019db2"]
          }],

          // These labels appear in the legend and in the tooltips when hovering different arcs
          labels: [
              'Pending ('+pending_resumes+')',
              'Accepted ('+accepted_resumes+')',
              'Rejected ('+rejected_resumes+')',
              'Scheduled ('+scheduled_resumes+')'
              
          ]
      };
      // For a pie chart
       var myPieChart = new Chart(resumeChart, {
          type: 'pie',
          data: resume_date
      });
      }


      // for candidates
      var hire_candidates = "0";
      var hold_candidates = "0";
      var offered_candidates = "0";
      var rejected_candidates = "0";
      var total_candidates = parseInt(hire_candidates)+parseInt(hold_candidates)+parseInt(offered_candidates)+parseInt(rejected_candidates);
      $('.candidate_title').html('Candidates ('+total_candidates+')');

      if(total_candidates==0){
        $('.candidates-analytics').hide();
        $('.candidates-no-analytics').show();
      }else{
        $('.candidates-analytics').show();
        $('.candidates-no-analytics').hide();
        var candidateChart = document.getElementById('candidatesChart').getContext('2d');
        var data = {
            datasets: [{
                data: [hire_candidates, hold_candidates,offered_candidates,rejected_candidates],
                backgroundColor: [ "#80effe", "#1be3fe", "#01c9e4","#019db2"]
            }],
            labels: [
                
                'Hired  ('+hire_candidates+')',
                'Hold  ('+hold_candidates+')',
                'Offered  ('+offered_candidates+')',
                'Rejected  ('+rejected_candidates+')'
            ]
        };
        // For a pie chart
        var ChartCandidate = new Chart(candidateChart, {
            type: 'pie',
            data: data
        });
      }

      // number of hires
      var hireChart = document.getElementById('hiresChart').getContext('2d');
          var hires =  [["05",0],["04",0],["03",0]];
          var labels = [];
          var data = [];
          var months = [ "January", "February", "March", "April", "May", "June",
              "July", "August", "September", "October", "November", "December" ];
          for(var i = 0; i < 3;i++){
            var month_index =  parseInt(hires[i][0],10) - 1;
            labels[i] = months[month_index];
          }
          for(var i = 0; i < 3;i++){
            data[i] = hires[i][1];
          }
          let options = {
              
              legend: {
                      display: true,
                      position : 'bottom',
                      labels: {
                                fontColor: 'rgb(0,0,0)'
                            }
                        }
          };
        
          if(data.every(item => item === 0)){
            $('.hires-no-analytics').show();
            $('.hires-analytics').hide();
          }else{
            $('.hires-no-analytics').hide();
            $('.hires-analytics').show();
            var myChart = new Chart(hireChart, {
              type: 'bar',
              data: {
                  labels: labels,
                  datasets: [{
                      label: 'No. of Hires',
                      data:data,
                      backgroundColor: [ "#80effe", "#1be3fe", "#01c9e4","#019db2"],
                      borderWidth: 1
                  }]
              },
              options: options
          });
          }


   </script>

        

        <script>
          $('.interested').click(function(){
            $(this).append('<div class="mybtn_loader" style="display:flex;"><div class="spinner"></div></div>')
            
            var j_id = $(this).attr('data-j_id');
            var r_id = $(this).attr('data-r_id');
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "https://incruiter.com/account/recruiter/interest-to-job",
                method: 'post',
                data: {
                    j_id: j_id,
                    r_id:r_id
                      },
                success: function(data) {
                    if (data == 'Done') {
                        GrowlNotification.notify({
                            title: 'Successfully Marks as Interested!',
                            image: "https://incruiter.com/dist/img/success.png",
                            type: 'success',
                            position: 'top-right',
                            closeTimeout: 3000
                        });
                        setTimeout(() => {
                           
                            location.reload(true);

                        }, 1500);
                    }

                }

            });

          });

          
        </script>




   
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