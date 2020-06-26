<?PHP
	if(isset($_POST['save']))
	{
		$filename1 = $_FILES['myfile1']['name'];
    	$tempname1 = $_FILES['myfile1']['tmp_name'];

    	$target_dir1 = "uploads/".$filename1;

    	$filename2 = $_FILES['myfile2']['name'];
    	$tempname2 = $_FILES['myfile2']['tmp_name'];

    	$target_dir2 = "uploads1/".$filename2;

    	$filename3 = $_FILES['myfile3']['name'];
    	$tempname3 = $_FILES['myfile3']['tmp_name'];

    	$target_dir3 = "uploads2/".$filename3;

    	if(move_uploaded_file($tempname1,$target_dir1)&&move_uploaded_file($tempname2,$target_dir2)&&move_uploaded_file($tempname3,$target_dir3))
    	{
    		header('Location: dashboard.php');
    	}
    	else{
    	    header('Location: freelanceraction.php');
    	}

	}
?> 