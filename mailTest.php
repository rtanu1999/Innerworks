<?php

$mailSending = "manoli.sam@bootestech.in";
$body = "Hello Sam Manoli, How are you dude";

require 'PHPMailer/PHPMailerAutoload.php';
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "mail.bootestech.in";
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = "response@bootestech.in";
$mail->Password = "123@Response";

$mail->From = "response@bootestech.in";
$mail->FromName = "Website Response - Test";
$mail->AddAddress($mailSending);

$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Enquiry From Website -- ". $_SERVER['REMOTE_ADDR'];
$mail->Body    = $body;
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
    echo "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Alert!</strong> Message Has Not Been Sent.</div>";
//                            echo "Mailer Error: " . $mail->ErrorInfo;
    exit;
}
echo  "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Success!</strong> Thanks For Contacting Us.</div>";









/////////////////////////////////////////////// Extra Code /////////////////////////////////////////////////
$userSubject = "Thanks For Job Post on Innerwork";
$userBody = "Dear " . $cpname . "," . "<br/>" . "Welcome to Innerwork and thanks for Job Post our admin will contact you soon.";
$userBody = wordwrap($userBody, 70);
$userHeaders = "MIME-Version: 1.0" . "\r\n";
$userHeaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$userHeaders .= 'From: <info@innerworkindia.com>' . "\r\n";
mail($email, $userSubject, $userBody, $userHeaders);