<?php
include('loginpage.php');
include('update.php');
if(!isset($_SESSION['type'])){
    header('location:recruiterlogin.php');
}
include_once 'DbConnection/DbConnectionHelper.php';
?>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-147188985-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-147188985-1');
</script>
    <link rel="stylesheet" href="css/job.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
table.tbl {
    width: 100%;
}
table{
  border: 2px;
    background-color: transparent;
    border-spacing: 0;
    border-collapse: collapse;
    display: table;

    box-sizing: border-box;
border:1px solid lightgrey;

}
table,th,td{border:1px solid lightgrey;}
thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
}
table.tbl tr th {
    font-family: GraphikRegular;
    border: 1px solid #d3d3d3;
    background: #f9b805;
    color: #fff;
    text-align: center;
    padding: .5%;
    font-size: 13px;
}

</style>

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
            <a class="nav-link" href="job.php">
              <i class="ni ni-single-02 text-yellow"></i>
              <span class="nav-link-text">Job | Internship Posting</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="posts.php">
              <i class="ni ni-single-02 text-yellow"></i>
              <span class="nav-link-text">Your Job Posts</span>
            </a>
          </li>
               </ul>
       </div>
     </div>
  </div>
</nav>
<div class="main-content" id="panel" style="width:fit-content;">
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
  <div class="container-fluid mt--6" style="padding-bottom:10px;">
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


        <?php

        $stmt = $conn->prepare('select * from jobpost where recruiterid=?');
        $stmt->bindParam(1,$_SESSION['recruiterid']);
        $stmt->execute();
        if($stmt->rowCount() > 0)
        {
        ?>
        <table class="tbl">
            <thead>
            <tr>
                <th style="width:3%;">Sr. No.</th>
                <th style="width:7%;">Job Title</th>
                <th style="width:7%;">Company</th>
                <th style="width:7%;">Type</th>
                <th style="width:10%;">Email</th>
                <th style="width:7%;">Job Type</th>
                <th style="width:6%;">Location</th>

                <th style="width:6%;">Salary</th>
                <th style="width:11%;">Job description</th>
                <th style="width:6%;">Experience</th>
                <th style="width:5%;">Education Required</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $cnt = 1;
            $data = $stmt->fetchAll();
            foreach($data as $row)
            {
                $dbStatus = $row['status'];
                ?>
                <tr id="<?php echo $row['id']; ?>">
                    <td><?php echo $cnt; ?></td>
                    <td><a href="dash_details?id=<?php echo $row['id']; ?>" target="_blank"><button  class="btn btn-info" style = "width:100%"><?php echo $row['jobTitle']; ?></button></a></td>
                    <td><?php echo $row['company']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['jobType']; ?></td>
                    <td><?php echo $row['location']; ?></td>

                    <td><?php echo $row['maxSalary']; ?></td>

                    <td><?php echo $row['j_desc']; ?></td>
                    <td><?php echo $row['exp']; ?></td>
                    <td><?php echo $row['education']; ?></td>



                </tr>
                <?php
                $cnt++;
            }
            ?>
            </tbody>
        </table>
            <?php
        }
        else
        {
            echo "<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Info!</strong> There is no Enquiries available yet.</div>";
        }
        ?>
      </div>
  </div>
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



</body>
</html>
