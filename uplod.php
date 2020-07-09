<?PHP
include('loginpage.php');

include_once 'DbConnection/DbConnectionHelper.php';
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
				$sql="UPDATE agency SET adhar=:f1,pan=:f2,cv=:f3  WHERE email=:em";
				$stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':f1' => $filename1,
            ':f2' => $filename2,
            ':f3' => $filename3,
						':em' => $email
						  ));
		
						 $no=$stmt->rowCount();
						 if($no>0){
							 echo "Updated Successfully!!!!";
							 header('Location: freelanceraction.php?uploaded=1');}
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
