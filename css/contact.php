<?php
$result = $name = $phone = $email = $msg = "";
if(isset($_POST['submit']))
{
    if(isset($_POST['name']) && !empty($_POST['name']))
    {
        if(isset($_POST['phone']) && !empty($_POST['phone']))
        {
            if(preg_match('/^[0-9]{10}+$/', $_POST['phone']))
            {
                if(isset($_POST['email']) && !empty($_POST['email']))
                {
                    if(isset($_POST['msg']) && !empty($_POST['msg']))
                    {
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $msg = $_POST['msg'];

                        $to = "info@innerworkindia.com";
                        $subject = "Enquiry From Website";
                        $body = "Dear Innerwork," . "<br/>" . "Please check below details anyone try to contacting you." . "<br/><br/>" . "Name : " . $name . "<br/>" . "Phone Number : " . $phone . "<br/>" . "Email Address : " . $email . "<br/>" . "Message : " . $msg;
                        $body = wordwrap($body,70);
                        // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers .= 'From: <info@innerworkindia.com>' . "\r\n";

                        mail($to, $subject, $body, $headers);

                        $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Thanks For Contacting Us.</div>";

                    }
                    else
                    {
                        $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Your Message.</div>';
                    }
                }
                else
                {
                    $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Email Address.</div>';
                }
            }
            else
            {
                $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Valid Phone Number.</div>';
            }
        }
        else
        {
            $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Phone Number.</div>';
        }
    }
    else
    {
        $result =  '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> Please Enter Name.</div>';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us </title>
    <?php include "CommonFiles.php"?>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
<?php include_once 'Header.php'; ?>

<section id="banner">
    <div class="container">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <h2>Contact Us</h2>
            <p><a href="index">Home</a> <span>/</span> Contact Us</p>
        </div>
    </div>
</section>
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Hello, We are here to help you</h3>
            </div>
        </div>

        <div class="col-md-8 blackBg">
            <h1>Contact Us</h1>
            <div class="padWala">
                <h2>Just Say Hi!</h2>
                <p>Tell us more about you and we'll contact you soon:</p>
                <div class="row form">
                    <div class="col-md-12">
                        <div id="resultOfForm"><?php echo $result; ?></div>
                        <form action="<?=($_SERVER['PHP_SELF'])?>" method="post">
                            <input type="text" name="name" placeholder="Your Name" class="form-control" required>
                            <input type="text" name="phone" pattern="[0-9]{10}" placeholder="Your Phone Number" class="form-control" required>
                            <input type="email" name="email" placeholder="Your Email Address" class="form-control" required>
                            <textarea name="msg" placeholder="Your Message" class="form-control" required></textarea>
                            <input type="submit" value="Submit Now" name="submit" class="form-control" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 drop">
            <h3>Drop In Our Office</h3>
            <div class="address">
                <p><i class="fa fa-map"></i> <span>#80, 4th cross, Aswath Nagar, Marathahalli, Bangalore - 560037</span></p>
                <p><i class="fa fa-envelope"></i> <span>Info@innerworkindia.com</span></p>
                <p><i class="fa fa-phone"></i> <span>+91 9887888469 / +91 9487980784</span></p>
            </div>
            <h4>Follow Us</h4>
            <ul class="socialContact">
                <li><a href="https://www.facebook.com/InnerworkSolution/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.linkedin.com/in/innerwork-solution-8a286919b" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="https://instagram.com/innerwork__solutions?igshid=nyewgunv5ra1" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/innverwork " target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://in.pinterest.com/innerwork123/ " target="_blank"><i class="fa fa-pinterest"></i></a></li>
            </ul>
        </div>
    </div>
    <br/>
    <div class="container">
<!--        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1889.949419526094!2d73.78570534722499!3d18.66853495960919!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x317c2935822b50!2sVISION+SERVICES!5e0!3m2!1sen!2sin!4v1551676906891" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>-->
    </div>
</section>

<?php include_once 'Footer.php'; ?>
</body>
</html>