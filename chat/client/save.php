<?php

	include('dbcon.php');
	$name = $_POST['Name'];
	$phone=$_POST['Contact'];
        $email_id=$_POST['Email'];
	

	// Database connection
	//$conn = new mysqli('localhost','root','','details');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		
		$stmt = $conn->prepare("insert into login(username,phone,email_id) values(?,?,?)");
		$stmt->bind_param("sis", $name,$phone,$email_id);
		$execval = $stmt->execute();
		//echo $execval;
		//echo "Registration successfully...";
		 header("Location:login.php");
		$stmt->close();
		$conn->close();
	}
?>