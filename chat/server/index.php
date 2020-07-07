<?php
include'class/user.php';
session_start();
if(!isset($_SESSION['user']))
{
 header('location:login.php');
}
$user_id=$_SESSION['user'];
$user = new USER();

//fetch user details
$result=$user->user_detail($user_id);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="function.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script src="https://kit.fontawesome.com/62c6b753c2.js" crossorigin="anonymous"></script>

<style>
/* Header */

.header{

	width: 100%;
	border-bottom: 2px solid #f2f2f2;
    height: 100px;
    padding: 20px;
    box-sizing: border-box;
}
.header a{
			padding: 10px;
			float: right;
}


/* details */

.details{
	text-align: center;
	width: 50%;
	display: block;
	margin-left: auto;
	margin-right: auto;
	margin-top: 100px;
}
table{
	border: 2px solid;
}

tr{
	padding: 10px;
	border: 2px solid;
}

td{
	padding: 10px;
}

table, tr, td {
    border: 1px solid black;
}
td{
	background-color:black;
	color:white;
}
.image_upload
{
 position: absolute;
 top:3px;
 right:3px;
}
.image_upload > form > input
{
    display: none;
}

.image_upload img
{
    width: 24px;
    cursor: pointer;
}
  body{
    color:black;
      }
  .header{
    background-color:black;
  }
  #user_details{
    background-color:#white;
  }
  .logout{
    color:#f0a500;
    font-weight: normal;
  }
img{
  width:100px;
  height:80px;
}
  .hi{
    color:#f0a500;
      font-weight: 300;
  }
  .logout:hover{
    color:white;
  }
  .hi:hover{
    color:white;
  }
  body{
    background-color:#f0a500;
  }
  .logo{
    float:left;
  }
  .circular{
    border-radius: 100%;
  }
  #user_model_details{
    background-color:black;
  }
  h4{
    color:white;
    font-weight:500;
  }
  .class{
    color:white;
    font-weight:200;
  }
</style>

</head>
<body>

	<div class="header">
		<img  class="logo circular" src="image/logo.png"><h4>Innerwork Solutions Pvt Ltd</h4>

		<a  class="logout" href="Logout.php">Logout</a>
		<a  class="hi" href="">Hi <?php echo($result['username']); ?></a>
	</div>
  <p style="margin-bottom:10px; text-align:center; margin-top: 100px;"><b>Please Select a client to chat with:</b></p>
	<div id="user_details"></div>
	<div id="user_model_details"></div>


</body>
</html>
