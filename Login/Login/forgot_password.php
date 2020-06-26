<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$connection= new mysqli("localhost", "root", "", "login");

if($_POST)
{
  $email= $_POST['email'];
  $selectquery= mysqli_query($connection, "select * from login where email= '{$email}'") or die(mysqli_error($connection));
  $count = mysqli_num_rows($selectquery);
  $roww= mysqli_fetch_array($selectquery);

  if ($count>0) {
    //echo $roww['password'];
    require 'vendor/autoload.php';
    $mail =  new PHPMailer(true);
    try{
      $mail->SMTDebug = 0;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'busyworld4@gmail.com'; //enter sender's email
      $mail->Password = '..'; //enter password
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      $mail->setFrom('busyworld4@gmail.com', 'Busy World');
      $mail->addAddress($email, $email);

      $mail->isHTML(true);
      $mail->Subject= 'Forgot Password';
      $mail->Body= "Hi $email your password is {$roww['password']}";
      $mail->AltBody= "Hi $email your password is {$roww['password']}";

      $mail->send();
      echo "your password has been sent on your email id.";

    }
    catch(Exception $e)
    {
      echo "password could not be sent";
      echo "Mailer Error" . $mail->ErrorInfo;
    }
  }
  else {
    echo "<script> alert('email not found');</script>";
  }
}

 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forgot password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/62c6b753c2.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </head>


  <body>
    <form class="Login-Form" action="" method="post">
      <h1><b>Password recovery</b></h1><br>
      <div class="form-group">
        <i class="fas fa-user" aria-hidden="true"></i>
        <input type="email" class="transparent-input" name="email" placeholder="Enter your email">
      </div><br>
      <p>enter email to recover password</p><br>
      <button type="submit" class="btn btn-outline-light btn-lg buttonx" name="login" value="login"><b>Recover</b></button><br><br>
    </form>

  </body>
</html>
