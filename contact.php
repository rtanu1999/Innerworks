<?php
require 'PHPMailer/PHPMailerAutoload.php';
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
$mail = new PHPMailer();

include_once 'WebUtils.php';
$utils = new WebUtils();

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

                        //adminMail
                        $mailSendToAdmin = $utils->adminContactForm($mail, $name, $phone, $email, $msg);
                        if($mailSendToAdmin)
                        {
                            //userMail
                            $mailSendToUser = $utils->userContactForm($mail, $name, $email);
                            if($mailSendToUser)
                            {
                                $result = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Thanks For Contacting Us.</div>";
                            }
                        }

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
    <title>Contact Us- Innerwork | Innerwork address | Innerwork Location</title>
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
                <h3>Contact Innerwork</h3>
            </div>
        </div>

        <div class="col-md-8 blackBg">
            <div class="padWala">
                <h2>Hello! We are here to help you!</h2>
                <p>Tell us more about you and we'll contact you soon:</p>
                <div class="row form">
                    <div class="col-md-12">
                        <div id="resultOfForm"><?php echo $result; ?></div>
                        <form action="<?=($_SERVER['PHP_SELF'])?>" method="post">
                            <input type="text" name="name" placeholder="Your Name" class="form-control" required>
                            <!--<input type="text" name="phone" pattern="[0-9]{10}" placeholder="Your Phone Number" class="form-control" required>-->
                            
                            <input type="text" name="phone" pattern="[0-9]{10}" maxlength="10" placeholder="Your Phone Number" class="form-control" required>
                            
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
                <p><i class="fa fa-phone"></i> <span>(080)-4209-2269</span></p>
            </div>
            <h4>Follow Us</h4>
            <ul class="socialContact">
                <li><a href="https://www.facebook.com/InnerworkSolution/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.linkedin.com/in/innerwork-solution-8a286919b" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="https://instagram.com/innerwork__solutions?igshid=nyewgunv5ra1" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/innverwork " target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://in.pinterest.com/innerwork123/ " target="_blank"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="https://youtu.be/LRL5GkFQTpA" target="_blank"><i class="fa fa-youtube"></i></a></li>
            </ul>
        </div>
    </div>
    <br/>
    <div class="container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.2070743715453!2d77.69972801482191!3d12.958597390864403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1232fbfd3173%3A0xcf98b558f607ed3b!2sInnerwork%20Solutions%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1589224813152!5m2!1sen!2sin" width="600" height="450" frameborder="1" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</section>

<?php include_once 'Footer.php'; ?>
</body>
</html>