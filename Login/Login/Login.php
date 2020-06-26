<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/62c6b753c2.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </head>


  <body>
    <?php include('authenticate.php');
    
    ?>
    <form class="Login-Form" action="" method="post">
      <h1><b>Log-In</b></h1><br>
      <div class="form-group">
        <i class="fas fa-user" aria-hidden="true">  </i>
        <input type="text" class="transparent-input" name="username" placeholder="Username" value="<?php if(isset($_COOKIE['Username'])){echo $_COOKIE["Username"];}?>">
      </div>
      <div class="form-group">
        <i class="fas fa-lock">  </i>
        <input type="password" class="transparent-input" name="password" placeholder="Enter your password" value="<?php if(isset($_COOKIE['Password'])){echo $_COOKIE["Password"];}?>" >
      </div><br>
      <input type="checkbox" name="check" value="1"><label>Remember Password</label><br>
      <button type="submit" class="btn btn-outline-light btn-lg buttonx" name="login" value="login"><b>Log-In</b></button><br><br>
      <a href="forgot_password.php" class="links">Forgot password?</a><br>
      <p class="links">Don't have an account? <br><a href="Register.php" class="links">Register Here.</a></p>
    </form>

  </body>
</html>
