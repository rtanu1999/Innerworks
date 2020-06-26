<?php
include_once 'checkAdminSession.php';
include "../DbConnection/DbConnectionHelper.php";
include_once 'Utils.php';
$utils = new Utils();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>InnerWork|Admin|Dasboard</title>
    <?php include 'CommonFiles.php'; ?>

    <link rel="stylesheet" href="css/dashboard.css">
    <script src="js/menu.js"></script>

</head>
<body>
<div id="main">
    <?php include 'Header.php'; ?>

    <div id="main">
        <div id="mySidenav" class="sidenav">
            <button type="button" id="hideMenu" onclick="closeNav()"><i class="fa fa-close"></i> </button>
            <ul>
                <li><a href="dashboard" id="dashboardPage"><span>Dashboard</span></a></li>
                <li><a href="newsletterSubscriptions" id="newsletterPage"> <span>Contact</span></a></li>
                <li><a href="jobseeker" id="enquiriesPage"><span>JobSeeker</span></a></li>
                <li><a href="allagency.php" id="agency"> <span>Agency</span></a></li>
                <li><a href="allfreelancer.php" id="freelancer"> <span>Freelancer</span></a></li>
                <li><a href="security" id="securityPage"> <span>Security</span></a></li>
                <li><a href="../login"><span>Log Out</span></a></li>
            </ul>
        </div>
        <section id="banner">
            <div class="container-fluid">
                <div class="col-md-4">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <p class="floatRight">
                        <a href="dashboard">Home</a>
                        <i class="fa fa-angle-double-right"></i>
                        <span>Dashboard</span>
                    </p>
                </div>
            </div>
        </section>

        <section id="dash">
            <div class="container">
                <div class="col-md-3 col-xs-12">
                    <a href="allJobSeeker">
                        <div class="col-md-12 col-xs-12 dashBox bg3">
                            <div class="col-md-3 col-xs-3 padNone">
                                <img src="img/users.png" alt="">
                            </div>
                            <div class="col-md-9 col-xs-9 padNone">
                                <h1><?php echo $utils->getTotalJobseekerCnt($conn); ?></h1>
                                <h3>Job Seeker</h3>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 view bor3">
                            <div class="col-md-10 padNone">
                                <p class="col3">View Details</p>
                            </div>
                            <div class="col-md-2 padNone">
                                <span class="circle bor3"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-xs-12">
                    <a href="allJobPost">
                        <div class="col-md-12 col-xs-12 dashBox bg1">
                            <div class="col-md-3 col-xs-3 ">heade
                                <img src="img/reports.png" alt="">
                            </div>
                            <div class="col-md-9 col-xs-9">
                                <h1><?php echo $utils->getTotalJobpostCnt($conn); ?></h1>
                                <h3>Job Post</h3>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 view bor1">
                            <div class="col-md-10 padNone">
                                <p class="col1">View Details</p>
                            </div>
                            <div class="col-md-2 padNone">
                                <span class="circle bor1"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-xs-12">
                    <a href="viewAllBlogs">
                        <div class="col-md-12 col-xs-12 dashBox bg2">
                            <div class="col-md-3 col-xs-3">
                                <img src="img/assistance.png" alt="">
                            </div>
                            <div class="col-md-9 col-xs-9">
                                <h1><?php echo $utils->getTotalBlogsCnt($conn); ?></h1>
                                <h3>All Blogs</h3>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 view bor2">
                            <div class="col-md-10 padNone">
                                <p class="col2">Blog</p>
                            </div>
                            <div class="col-md-2 padNone">
                                <span class="circle bor2"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-xs-12">
                    <a href="allinterns">
                        <div class="col-md-12 col-xs-12 dashBox bg4">
                            <div class="col-md-3 col-xs-3">
                                <img src="img/assistance.png" alt="">
                            </div>
                            <div class="col-md-9 col-xs-9">
                                <h1><?php echo $utils->getTotalinternsCnt($conn); ?></h1>
                                <h3>Internship Applicants</h3>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 view bor4">
                            <div class="col-md-10 padNone">
                                <p class="col4">Interns</p>
                            </div>
                            <div class="col-md-2 padNone">
                                <span class="circle bor4"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-xs-12">
                    <a href="allfreelancer">
                        <div class="col-md-12 col-xs-12 dashBox bg4">
                            <div class="col-md-3 col-xs-3">
                                <img src="img/assistance.png" alt="">
                            </div>
                            <div class="col-md-9 col-xs-9">
                                <h1><?php echo $utils->getTotalfreelancerCnt($conn); ?></h1>
                                <h3>Freelancer</h3>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 view bor4">
                            <div class="col-md-10 padNone">
                                <p class="col4">Freelancer</p>
                            </div>
                            <div class="col-md-2 padNone">
                                <span class="circle bor4"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-xs-12">
                    <a href="allagency">
                        <div class="col-md-12 col-xs-12 dashBox bg4">
                            <div class="col-md-3 col-xs-3">
                                <img src="img/assistance.png" alt="">
                            </div>
                            <div class="col-md-9 col-xs-9">
                                <h1><?php echo $utils->getTotalagencyCnt($conn); ?></h1>
                                <h3>Agency</h3>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 view bor4">
                            <div class="col-md-10 padNone">
                                <p class="col4">Agency</p>
                            </div>
                            <div class="col-md-2 padNone">
                                <span class="circle bor4"></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>