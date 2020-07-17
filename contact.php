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
      <!-- <link rel="stylesheet" href="contact.css"> -->
      <style>
      .location-block .contentarea p {
      font-size: 13px;
      padding: 0 10px;
      min-height: auto;
      color:black !important;
  }
      .location-block .contentarea h5 a {
    color: #fff;
    padding: 10px 0;
    display: block;
    position: relative;
    transition-property: color;
    -webkit-transition-duration: .3s;
    transition-duration: .3s;
    backface-visibility: hidden;
    transform: translateZ(0);
}
      .location-block .contentarea {
    min-height: 150px;
    border: solid 2px #eaeaea;
    padding: 0 0 15px 0;
}
.location-block .contentarea h5 {
    background: #ffc114;
    color: #fff;
    margin: 0 0 10px;
    text-align: center;
    font-size: 18px;
}
.line-break {
    display:block;
}
      .padWala{}
      #contact h2{color: #fff;}
      #contact p{color: #fff;}
      .blackBg{background-color: #262624;padding: 1% 3%;}
      .form{border-radius: 10px;}
      .form input[type=text],input[type=email]{margin-bottom:3%;font-family:GraphikRegular;border: 0;border-bottom: 1px solid #666565;border-radius: 0;box-shadow: none;background: none;  color: #fff;}
      .form input[type=text]:focus{border-bottom:1px solid #ec3237;}
      .form input[type=email]:focus{box-shadow:none;border-bottom:1px solid #ec3237;}
      .form textarea{font-family:GraphikRegular;border: 0;height: 130px;border-bottom: 1px solid #666565;border-radius: 0;box-shadow: none;margin-bottom:2%;background: none;color: #fff;}
      .form textarea:focus{box-shadow:none;border-bottom:1px solid #ec3237;}
      textarea.form-control{height: 130px;}
      .form input[type=submit]{font-family:GraphikRegular;display: block;width:30%;color: #fff;font-weight: bold;text-align: center;transition: all ease .7s;font-size: 15px;background: #ffc114;border-radius:4px;letter-spacing:1px;border: 0;}
      .form input[type=submit]:hover{background:#fff;color:#ffc114;}
      .form input[type=submit]:focus{box-shadow:none;}
      #contact h4{color: #000;font-size: 21px;margin-bottom: 4%;margin-top: 16%;}
      .address{margin-top: 8%;}
      .drop{background: #d3d3d380;padding: 3%;height: auto;}
      .drop p{}
      .drop p i{color: #018fc9;display: block;float: left;width: 22px;height: 30px;overflow: hidden;line-height: 22px;}
      .drop p span{color: #333;}
      ul.socialContact{list-style-type: none;margin-left: -21%;}
      ul.socialContact li{float: left;margin-left: 7%;}
      ul.socialContact li a{}
      ul.socialContact li a i{transition: ease all 1s;color: #3b3c3c;width: 30px;height: 30px;line-height: 26px;font-size: 15px;border: 1px solid #3b3c3c;text-align: center;border-radius: 50px;}
      ul.socialContact li a:hover i{transform: rotate(360deg);color: #018fc9;border: 1px solid #018fc9;}

      </style>
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
            <div class="padWala">
                <h2>Just Say Hi!</h2>
                <p>Tell us more about you and we'll contact you soon:</p>
                <div class="row form">
                    <div class="col-md-12">
                        <div id="resultOfForm"><?php echo $result; ?></div>
                        <form action="<?=($_SERVER['PHP_SELF'])?>" method="post">
                            <input type="text" name="name" placeholder="Your Name" class="form-control" required>
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
                <li><a href="https://www.youtube.com/channel/UCuwkBl5yeSlnxSYarnIlZsA" target="_blank"><i class="fa fa-youtube"></i></a></li>
            </ul>
        </div>
    </div>
    <br/>
    <div class="container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.2070743715453!2d77.69972801482191!3d12.958597390864403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1232fbfd3173%3A0xcf98b558f607ed3b!2sInnerwork%20Solutions%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1589224813152!5m2!1sen!2sin" width="1143" height="450" frameborder="1" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
  <div class="container">
    <div style="margin-top: 30px !important;">
        <h2 style="color:black;"><b>Other Locations</b></h2></div>
        <div class="location-block clearfix">
        <div class="col-md-4 col-xs-12" style="padding-bottom:10px;">
        <div class="contentarea" style="height:auto !important;">
        <h5><a href=#>Kolkata</a></h5>
        <p><span class="line-break">229/3 Vivekananda Pally, Kolkata - 700065 (India)</span>
        <span class="line-break"><i class="fa fa-phone" aria-hidden="true">&nbsp;</i>  (080)-4209-2269)</span>
        <span class="line-break"><i class="fa fa-envelope-o" aria-hidden="true">&nbsp;</i> <a href="mailto:info@innerworkindia.com">info@innerworkindia.com</a></span></p>
                </div>
        </div>

        <div class="col-md-4 col-xs-12" style="padding-bottom:10px;">
        <div class="contentarea" style="height:auto !important;">
        <h5><a href=#>Delhi</a></h5>
        <p><span class="line-break">B-171/172, first fllor, Nehru Vihar, Delhi - 110054 (India)</span>
        <span class="line-break"> <i class="fa fa-phone" aria-hidden="true">&nbsp;</i>  (080)-4209-2269)</span>
        <span class="line-break"><i class="fa fa-envelope-o" aria-hidden="true">&nbsp;</i> <a href="mailto:info@innerworkindia.com">info@innerworkindia.com</a></span></p>
              </div>
        </div>
</div>






        </div>

    </div>


</section>

<?php include_once 'Footer.php'; ?>
</body>
</html>
