<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employer</title>
    <?php include "CommonFiles.php"?>
    <link rel="stylesheet" href="css/job.css">
    <link rel="stylesheet" href="css/collage.css">
    <link rel="stylesheet" href="recuiterchoicestyle.css">
</head>
<body>
<?php include_once 'Header.php'; ?>

<section id="banner">
    <div class="container">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <h2>Employer </h2>
            <p><a href="index">Home</a> <span>/</span> Employer</p>
        </div>
    </div>
</section>
<section>
    <center>
        <p style="font-size: 30px"><b>Employer Portal!</b></p><br>
        <a href="recruiterlogin"><button class="choice" >Login</button></a>
        <a href="recruiter"><button class="choice" >Register</button></a>
        </center>
    </section>

<!--<section id="jobApplication">-->
<!--    <div class="container">-->
<!--        <div class="row formDetail">-->
<!--            <div class="col-md-12">-->
<!--                <div id="twoD">-->
<!--                    <div id="employerFormSubmitResult"></div>-->
<!--                    <form action="recruiterForm.php" method="post" class="formJob" >-->
<!--                        <div class="row">-->
<!--                            <div class="col-md-4">-->
<!--                                <label for="companyName">Company Name</label>-->
<!--                                <input type="text" name="companyName" id="companyName" class="form-control" required>-->
<!--                            </div>-->
<!--                            <div class="col-md-8">-->
<!--                                <label for="companyAddress">City</label>-->
<!--                                <input type="text" name="companyAddress" id="companyAddress" class="form-control" required>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="row">-->
<!--                            <div class="col-md-4">-->
<!--                                <label for="contactPerson">Contact Person</label>-->
<!--                                <input type="text" name="contactPerson" id="contactPerson" class="form-control" required>-->
<!--                            </div>-->
<!--                            <div class="col-md-4">-->
<!--                                <label for="emailAddress">Email Address</label>-->
<!--                                <input type="email" name="emailAddress" id="emailAddress" class="form-control" required>-->
<!--                            </div>-->
<!--                            <div class="col-md-4">-->
<!--                                <label for="">Which Service You are Looking For</label>-->
<!--                                <select name="lookingService" id="lookingService" class="form-control" onchange="return getDetails(this.value)" required>-->
<!--                                    <option selected disabled>Select Service</option>-->
<!--                                    <option value="1">HR Services</option>-->
<!--                                    <option value="2">IT Services</option>-->
<!--                                    <option value="3">Start Up Support</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <input type="button" onclick="return submitEmployerForm()" value="Submit" name="employerSubmitForm" class="form-control" />-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->


<?php include_once 'Footer.php'; ?>
</body>
</html>


