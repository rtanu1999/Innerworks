
<html>
    <head>
    <title>Recruiter login</title>
        <link rel="stylesheet" type="text/css" href="css/recuiterchoicestyle.css">
    </head>
    <body>
    <?php include_once 'Header.php'; ?>

<section id="banner">
    <div class="container">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <h2></h2>
            <p><a href="index">Home</a> <span>/</span> Agency | Freelance </p>
        </div>
    </div>
</section>

        <center>

        <p style="font-size: 30px"><b>Recruiter Login!</b></p><br>
        <?php
        if(isset($_GET["invalid"])){
            echo "<p style='color:red'>Invalid username/password</p>";
        }
        ?>
        <form action="loginpage.php" method="post">
              <div class="wrap-input100 validate-input">
             <input id="place" class="enterinfo" type="email" name="email" placeholder="Email" required="" style="padding-left:53px;">
             <span class="focus-input100"></span>
             <span class="symbol-input100">
             <i class="fa fa-user"></i></span>
        </div>
        <div class="wrap-input100 validate-input">
             <input class="enterinfo" type="password" name="password" placeholder="Password" required="">
             <span class="focus-input100"></span>
             <span class="symbol-input100">
             <i class="fa fa-lock"></i></span>
        </div>
        <button class="choice" type="submit" name="submit">Login</button>
        <p style="font-family: 'Raleway';font-weight: bold">Don't have an account? <a href="recruiter.php" style="font-family: 'Raleway';font-weight: bold;color: #F5AF00">Register here!</a></p>
        </form></center>
<?php include_once 'Footer.php'; ?>
    </body>
</html>
