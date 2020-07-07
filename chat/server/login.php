<?php
require_once 'class/user.php';
session_start();
$msg='';
if(isset($_SESSION['user']))
{
 header('location:index.php');
}
$user = new user();

if(isset($_POST['submit'])){

	$username=$_POST['username'];
	$password=$_POST['password'];


	if(empty($username)||empty($password)){
	echo"<script type='text/javascript'>alert('Please Enter Your Details!')</script>";
     	}
	//if(empty($password)){
	//echo"<script type='text/javascript'>alert('Please Enter Your Password!')</script>";
       // }
	else
	{

		$logincheck = $user->login_check($username,$password);

		if($logincheck){
		$user->insert_login_details($logincheck);
		header('location:index.php');
		}
		else{
		
		echo"<script type='text/javascript'>alert('Incorrect Username or Password!!')</script>";
		
	       }
	}


}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat Message</title>
	<style type="text/css">
		input[type="text"],input[type="password"]{
			padding: 6px 14px 6px 14px;
			width: 51%;
			margin: 15px;
		}
		input[type="submit"]{
			background:grey;
			padding: 8px 12px 8px 12px;width: 51%;
			margin: 15px;	}	
	</style>
</head>
<body>

	<div style="position: absolute;top: 20%;left: 30%;border:2px solid grey;padding: 60px 60px;background: yellow;text-align: center">
		<center><img src="image\logo.png" height="200px" width="250px"alt="Innerwork Solution Private limited"> 
		<form method="post" action="">
			<input type="text" name="username" placeholder="Enter username">
			<input type="password" name="password" placeholder="Enter Your password"> <br>

			<input type="submit" name="submit" value="submit"><br><br>
			<?php echo  $msg ? $msg : '' ;?>
		</form>
	</div>
		
</body>
</html>

