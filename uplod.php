<?PHP
include('loginpage.php');

include_once 'DbConnection/DbConnectionHelper.php';

require 'PHPMailer/PHPMailerAutoload.php';
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
	if(isset($_POST['save']))
	{
		$filename1 = $_FILES['myfile1']['name'];
    	$tempname1 = $_FILES['myfile1']['tmp_name'];

    	$target_dir1 = "recruiterdocuments/aadhar/".$filename1;

    	$filename2 = $_FILES['myfile2']['name'];
    	$tempname2 = $_FILES['myfile2']['tmp_name'];

    	$target_dir2 = "recruiterdocuments/PAN/".$filename2;

    	$filename3 = $_FILES['myfile3']['name'];
    	$tempname3 = $_FILES['myfile3']['tmp_name'];

    	$target_dir3 = "recruiterdocuments/CV/".$filename3;

    	if(move_uploaded_file($tempname1,$target_dir1)&&move_uploaded_file($tempname2,$target_dir2)&&move_uploaded_file($tempname3,$target_dir3))
    	{ $email=$_SESSION['email'];
				echo $_SESSION['type'];
				if(isset($_SESSION['type'])=="Agency")
				{
					$com_type=$_POST['com_type'];
				$sql="UPDATE agency SET regis_certi=:f1,pan=:f2,gst=:f3,com_type=:c1  WHERE email=:em";
				$stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':f1' => $filename1,
            ':f2' => $filename2,
            ':f3' => $filename3,
						':c1' => $com_type,
						':em' => $email
						  ));

						 $no=$stmt->rowCount();
						 if($no>0){
							 echo "Updated Successfully!!!!";
							 sendmails();
							 header('Location: agency.php?uploaded=1');}
				else{
					$email=$_SESSION['email'];

					$sql="UPDATE freelancer SET adhar=:f1,pan=:f2,cv=:f3  WHERE email=:em";
					$stmt = $conn->prepare($sql);
					$stmt->execute(array(
							':f1' => $filename1,
							':f2' => $filename2,
							':f3' => $filename3,
							':em' => $email
								));
								header('Location: freelanceraction.php?uploaded=1');

			}

    	}
		}
    	else{
    	    header('Location: freelanceraction.php?uploaded=0');
    	}

	}
?>
<?php 
function sendmails(){
          
                $email=$_SESSION['email'];
             $mail = new PHPMailer();
            
			$body="<div style='height:40px;width:auto;background-color:#e6e6e6;'></div><div style='height:120px;width:auto;background-color:#008CBA;'><br><center>
            	<center><h1>Thank You!</h1><p style='color:white;'> Documents Uploaded Successfully!!</p>
            <p style='color:white;'>We will verify your documents and contact you soon.</p></center><br><span></span>
                </div><div style='height:30px;width:auto;background-color:#e6e6e6;'>
            </div><br>";
            $body .= "Kindly contact us for any further query at +91 9487980784 or info@innerworkindia.com Visit us: www.innerworkindia.com<br><br>";
              
            $mail->IsSMTP();
            $mail->Host = "mail.innerworkindia.com";
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
           //  $mail->SMTPDebug  = 1;
            $mail->SMTPAuth = true;
            $mail->Username = "response@innerworkindia.com";
            $mail->Password = "Digital@inner#123";

            $mail->From = "response@innerworkindia.com";
            $mail->FromName = "Innerwork Solutions";
            $mail->AddAddress($email);

            $mail->IsHTML(true);                                  // set email format to HTML

            $mail->Subject = "Thanks For submitting your details to Innerwork";
            $mail->Body    = $body;
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

            if(!$mail->Send()) {
              echo "Error while sending Email.";
              var_dump($mail);
            } else {
              echo "<center><br><h1>Account Successfully Registered</h1><br></center>";

            }




}

?>