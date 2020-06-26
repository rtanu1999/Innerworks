<section id="topBar">
    <div class="container-fluid">
        <div class="col-md-6">
            <p>
                <button type="button" id="showMenu" onclick="openNav()"><i class="fa fa-bars"></i> </button>
                <span>InnerWork</span>
            </p>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <a href="logout">Log Out <i class="fa fa-sign-out-alt"></i></a>
        </div>
    </div>
</section>

<div id="mySidenav" class="sidenav">
    <button type="button" id="hideMenu" onclick="closeNav()"><i class="fa fa-close"></i> </button>
    <ul>
        <li><a href="dashboard" id="dashboardPage"> <span>Dashboard</span></a></li>
        <li><a href="allJobSeeker" id="jobseekerPage"><span>Jobseeker</span></a></li>
        <li><a href="allJobPost" id="employerPage"><span>Jobpost</span></a></li>
        <li class="">
            <a href="#productsSubmenu" data-toggle="collapse" aria-expanded="false">Blogs</a>
            <ul class="collapse list-unstyled" id="productsSubmenu">
                <li><a href="viewAllBlogs">View All Blogs</a></li>
                <li><a href="addBlog">Add New Blog</a></li>
            </ul>
        </li>
        <li><a href="allagency.php" id="agency"> <span>Agency</span></a></li>
        <li><a href="allfreelancer.php" id="freelancer"> <span>Freelancer</span></a></li>
        <li><a href="security" id="securityPage"><span>Security</span></a></li>
        <li><a href="secret"><span>Log Out</span></a></li>
    </ul>
</div>