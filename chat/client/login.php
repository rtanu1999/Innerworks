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
	$contact=$_POST['contact'];

	if(empty($username)){
	echo"<script type='text/javascript'>alert('Please Enter Your Name!')</script>";
     	}

        else  if(empty($contact)){
	echo"<script type='text/javascript'>alert('Please Enter Your Contact!')</script>";
        }

	else if( !preg_match("/^[6-9][0-9]{9}$/", $contact) ) {
         echo"<script type='text/javascript'>alert('Please Enter Valid Contact!')</script>";
	}

	else if(!preg_match("/^[a-zA-Z .]+$/",$username)){
         echo"<script type='text/javascript'>alert('Please Enter Valid Name!')</script>";
	}

        else
	{

		$logincheck=$user->login_check($username,$contact);

	             if($logincheck){
		              $user->insert_login_details($logincheck);
		              header('location:index.php');

		            }
	              else{
            	          $user->insert_login_client($username,$contact);
			$logincheck=$user->login_check($username,$contact);

                           $user->insert_login_details($logincheck);
		            header('location:index.php');

	          }


	}

	//$logincheck = $user->login_check($username,$contact);

	//if($logincheck){
	//	$user->insert_login_details($logincheck);
	//	header('location:index.php');
	//}


}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat Message</title>
	<style type="text/css">
	body{
         background:  black;
         }@media screen and (min-width: 480px) {
          }
		input[type="text"],input[type="text"]{
			padding: 6px 14px 6px 14px;
			width: 51%;
			margin: 15px;
		}
		input[type="submit"]{
			background:grey;
			padding: 8px 12px 8px 12px;	}
	</style>
</head>
<body>

	<div style="position: absolute;top: 20%;left: 30%;border:2px solid grey;padding: 60px 60px;background: yellow;text-align: center">
		<center><img src="image\logo.png" height="200px" width="250px"alt="Innerwork Solution Private limited"><br>
      <p>Please enter Your details here:</p>
		<form method="post" action="#">
			<input type="text" name="username" placeholder="Enter name">
			<input type="text" name="contact" placeholder="Enter contact"> <br>

			<input type="submit" name="submit" value="submit"><br><br>
			<?php echo  $msg ? $msg : '' ;?>
		</form>
	</div>

</body>
</html>
