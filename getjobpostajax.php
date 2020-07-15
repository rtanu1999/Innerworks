<?php

//fetch_data.php
 include_once 'DbConnection/DbConnectionHelper.php';

if(isset($_POST["action"]))
{
       $qry="select * from jobpost where status=1";
	  // if(isset($_POST["loc"]) && !empty($_POST["loc"]) )
		  if(isset($_POST["sectitle"]) && !empty($_POST["sectitle"]))
	{
		$qry .= "
		 AND jobTitle like '%".$_POST["sectitle"]."%'
		";
	}
		   if(isset($_POST["loc"]))
	{
		$loc_filter = implode("','", $_POST["loc"]);
		$qry .= "
		  AND location IN('".$loc_filter."')
		";

	}
	 if(isset($_POST["type"]))
	{
		$type_filter = implode("','", $_POST["type"]);
		$qry .= "
		  AND type IN('".$type_filter."')
		";

	}
	 if(isset($_POST["exp"]))
	{
		$exp_filter = implode("','", $_POST["exp"]);
		$qry .= "
		  AND exp IN('".$exp_filter."')
		";

	}
  if(isset($_POST["sal"]))
 {
   $sal_filter = implode("','", $_POST["sal"]);
   $qry .= "
     AND maxSalary IN('".$sal_filter."')
   ";

 }
 if(isset($_POST["skills"]))
{
  $skills_filter = implode("','", $_POST["skills"]);
  $qry .= "
    AND skills IN('".$skills_filter."')
  ";

}
if(isset($_POST["edu"]))
{
 $edu_filter = implode("','", $_POST["edu"]);
 $qry .= "
   AND education IN('".$edu_filter."')
 ";

}
        $query = $conn->prepare($qry);
		 $query->execute();
        if($query->rowCount() > 0)
        {


        $data = $query->fetchAll();
		 $output ='';

        foreach($data as $row) {


			$output .= '
			<div class="jobs" id="main-jobs" >
			<div class="single-job-card">
			<div class="row">
			<div class="col-sm-12 col-xs-9">
			<div class="col-12">
			<div class="job-card-description">
			<div class="internships-tabs">

			<div class="nav nav-pills" style="width:100%;height:100%;background-color:#ffc114;padding-left: 1%">
			<div class="job-title">

                <b><h4 class="truncate-normal" title="'. $row['jobTitle'] .'" data-etracking="true" ><a id="j_title" href="#" onclick="javascript:fillIn(this.innerHTML);">'. $row['jobTitle'] .'</a></h4></b>
                </div></div>
                <div class="company-name"><p class="truncate-normal"style = "padding-left: 1%;" title="' .$row['company'] .'" data-etracking="true"><a href="#" onclick="javascript:fillInComp(this.innerHTML);" >' .$row['company'] .'</a></p></div>
                <div class="job-locations"><p class="truncate-normal" style = "padding-left: 1%;" title="Location(s)" data-etracking="true"><a href="#" onclick="javascript:fillInLoc(this.innerHTML);" > '. $row['location'] .'</a></p></div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="row job-info no-margin-left no-margin-right" style="margin-left:1%;">

        <ul class="list-group" style="paddding-left:6% !important;">
          <li class="list-group-item" title="' .$row['type'] .'" data-etracking="true"><i class="fa fa-briefcase"></i>&nbsp;' .$row['type'] .'
           </li>
          <li class="list-group-item" title="Compensation" data-etracking="true" data-ecategory="job_card_compensation" onclick="javascript:fillInsalary(this.innerHTML);">
        <i class="fa fa-inr" ></i>' .$row['maxSalary'] .'
          </li>
          <li class="list-group-item" title="Qualification" data-etracking="true" data-ecategory="job_card_start_date">
            <i class="fa fa-user" ></i>' .$row['education'] .'
          </li>
          </ul></div>
         <div class="row no-margin-left no-margin-right job-lowest-section">
          <div class="col-sm-3 col-xs-3 text-right visible-xs">

        </div>

        <div class="col-sm-12 col-xs-9">

            <div class="text-right" style="padding-right:6%;">




                 <div class="job-apply-button" >
                    <a href="job_details.php?id='. $row['id'] .'"  class="btn btn-primary" title="Apply Now" style="font-size:18px;width:100%;height:100%;background-color:#ffc114;border: 0px;">Apply Now</a>


                </div>




            </div>

        </div>
    </div>

    </div>




        </div>
        </div>


			';
		}
	}
	else
	{
		$output = '<h4>No Job Found</h4>';
	}
	//echo '<pre>'; print_r($_POST["loc"]); echo '</pre>';
	echo $output;
}



if(isset($_POST["fill"])){
    $title=$_POST["title"];
    $qry="select * from jobpost where status=1 and jobTitle='$title'";


    
       $query = $conn->prepare($qry);
		 $query->execute();
        if($query->rowCount() > 0)
        {


        $data = $query->fetchAll();
		 $output ='';

        foreach($data as $row) {


			$output .= '
			<div class="jobs" id="main-jobs" >
			<div class="single-job-card">
			<div class="row">
			<div class="col-sm-12 col-xs-9">
			<div class="col-12">
			<div class="job-card-description">
			<div class="internships-tabs">

			<div class="nav nav-pills" style="width:100%;height:100%;background-color:#ffc114;padding-left: 1%">
			<div class="job-title">

                <b><h4 class="truncate-normal" title="'. $row['jobTitle'] .'" data-etracking="true"><a href="#" target="_blank"  id="j_title" >'. $row['jobTitle'] .'</a></h4></b>
                </div></div>
                <div class="company-name"><p class="truncate-normal"style = "padding-left: 1%;" title="' .$row['company'] .'" data-etracking="true"><a href="#" target="_blank" >' .$row['company'] .'</a></p></div>
                <div class="job-locations"><p class="truncate-normal" style = "padding-left: 1%;" title="Location(s)" data-etracking="true"><a href="#" target="_blank" > '. $row['location'] .'</a></p></div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="row job-info no-margin-left no-margin-right" style="margin-left:1%;">

        <ul class="list-group" style="paddding-left:6% !important;">
          <li class="list-group-item" title="' .$row['type'] .'" data-etracking="true"><i class="fa fa-briefcase"></i>&nbsp;' .$row['type'] .'
           </li>
          <li class="list-group-item" title="Compensation" data-etracking="true" data-ecategory="job_card_compensation">
        <i class="fa fa-inr" ></i>' .$row['maxSalary'] .'
          </li>
          <li class="list-group-item" title="Qualification" data-etracking="true" data-ecategory="job_card_start_date">
            <i class="fa fa-user" ></i>' .$row['education'] .'
          </li>
          </ul></div>
         <div class="row no-margin-left no-margin-right job-lowest-section">
          <div class="col-sm-3 col-xs-3 text-right visible-xs">

        </div>

        <div class="col-sm-12 col-xs-9">

            <div class="text-right" style="padding-right:6%;">




                 <div class="job-apply-button" >
                    <a href="job_details.php?id='. $row['id'] .'"  class="btn btn-primary" title="Apply Now" style="font-size:18px;width:100%;height:100%;background-color:#ffc114;border: 0px;">Apply Now</a>


                </div>




            </div>

        </div>
    </div>

    </div>




        </div>
        </div>


			';
		}
	}
	else
	{
		$output = '<h4>No Job Found</h4>';
	}
	//echo '<pre>'; print_r($_POST["loc"]); echo '</pre>';
	echo $output;
}





if(isset($_POST["fillcomp"])){
    $comp=$_POST["comp"];
 //   echo $loc;
    $qry="select * from jobpost where status=1 and company='$comp'";


    
       $query = $conn->prepare($qry);
		 $query->execute();
        if($query->rowCount() > 0)
        {


        $data = $query->fetchAll();
		 $output ='';

        foreach($data as $row) {


			$output .= '
			<div class="jobs" id="main-jobs" >
			<div class="single-job-card">
			<div class="row">
			<div class="col-sm-12 col-xs-9">
			<div class="col-12">
			<div class="job-card-description">
			<div class="internships-tabs">

			<div class="nav nav-pills" style="width:100%;height:100%;background-color:#ffc114;padding-left: 1%">
			<div class="job-title">

                <b><h4 class="truncate-normal" title="'. $row['jobTitle'] .'" data-etracking="true"><a href="#" target="_blank"  id="j_title" >'. $row['jobTitle'] .'</a></h4></b>
                </div></div>
                <div class="company-name"><p class="truncate-normal"style = "padding-left: 1%;" title="' .$row['company'] .'" data-etracking="true"><a href="#" target="_blank" >' .$row['company'] .'</a></p></div>
                <div class="job-locations"><p class="truncate-normal" style = "padding-left: 1%;" title="Location(s)" data-etracking="true"><a href="#" target="_blank" > '. $row['location'] .'</a></p></div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="row job-info no-margin-left no-margin-right" style="margin-left:1%;">

        <ul class="list-group" style="paddding-left:6% !important;">
          <li class="list-group-item" title="' .$row['type'] .'" data-etracking="true"><i class="fa fa-briefcase"></i>&nbsp;' .$row['type'] .'
           </li>
          <li class="list-group-item" title="Compensation" data-etracking="true" data-ecategory="job_card_compensation">
        <i class="fa fa-inr" ></i>' .$row['maxSalary'] .'
          </li>
          <li class="list-group-item" title="Qualification" data-etracking="true" data-ecategory="job_card_start_date">
            <i class="fa fa-user" ></i>' .$row['education'] .'
          </li>
          </ul></div>
         <div class="row no-margin-left no-margin-right job-lowest-section">
          <div class="col-sm-3 col-xs-3 text-right visible-xs">

        </div>

        <div class="col-sm-12 col-xs-9">

            <div class="text-right" style="padding-right:6%;">




                 <div class="job-apply-button" >
                    <a href="job_details.php?id='. $row['id'] .'"  class="btn btn-primary" title="Apply Now" style="font-size:18px;width:100%;height:100%;background-color:#ffc114;border: 0px;">Apply Now</a>


                </div>




            </div>

        </div>
    </div>

    </div>




        </div>
        </div>


			';
		}
	}
	else
	{
		$output = '<h4>No Job Found</h4>';
	}
	//echo '<pre>'; print_r($_POST["loc"]); echo '</pre>';
	echo $output;
}






if(isset($_POST["fillloc"])){
    $loc=$_POST["loc"];
 //  echo $loc;
    $qry="select * from jobpost where status=1 and location='$loc'";


    
       $query = $conn->prepare($qry);
		 $query->execute();
        if($query->rowCount() > 0)
        {


        $data = $query->fetchAll();
		 $output ='';

        foreach($data as $row) {
            
			$output .= '
			<div class="jobs" id="main-jobs" >
			<div class="single-job-card">
			<div class="row">
			<div class="col-sm-12 col-xs-9">
			<div class="col-12">
			<div class="job-card-description">
			<div class="internships-tabs">

			<div class="nav nav-pills" style="width:100%;height:100%;background-color:#ffc114;padding-left: 1%">
			<div class="job-title">

                <b><h4 class="truncate-normal" title="'. $row['jobTitle'] .'" data-etracking="true"><a href="#" target="_blank"  id="j_title" >'. $row['jobTitle'] .'</a></h4></b>
                </div></div>
                <div class="company-name"><p class="truncate-normal"style = "padding-left: 1%;" title="' .$row['company'] .'" data-etracking="true"><a href="#" target="_blank" >' .$row['company'] .'</a></p></div>
                <div class="job-locations"><p class="truncate-normal" style = "padding-left: 1%;" title="Location(s)" data-etracking="true"><a href="#" target="_blank" > '. $row['location'] .'</a></p></div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="row job-info no-margin-left no-margin-right" style="margin-left:1%;">

        <ul class="list-group" style="paddding-left:6% !important;">
          <li class="list-group-item" title="' .$row['type'] .'" data-etracking="true"><i class="fa fa-briefcase"></i>&nbsp;' .$row['type'] .'
           </li>
          <li class="list-group-item" title="Compensation" data-etracking="true" data-ecategory="job_card_compensation" >
        <i class="fa fa-inr" ></i>' .$row['maxSalary'] .'
          </li>
          <li class="list-group-item" title="Qualification" data-etracking="true" data-ecategory="job_card_start_date">
            <i class="fa fa-user" ></i>' .$row['education'] .'
          </li>
          </ul></div>
         <div class="row no-margin-left no-margin-right job-lowest-section">
          <div class="col-sm-3 col-xs-3 text-right visible-xs">

        </div>

        <div class="col-sm-12 col-xs-9">

            <div class="text-right" style="padding-right:6%;">




                 <div class="job-apply-button" >
                    <a href="job_details.php?id='. $row['id'] .'"  class="btn btn-primary" title="Apply Now" style="font-size:18px;width:100%;height:100%;background-color:#ffc114;border: 0px;">Apply Now</a>


                </div>




            </div>

        </div>
    </div>

    </div>




        </div>
        </div>


			';
		}
	}
	else
	{
		$output = '<h4>No Job Found</h4>';
	}
	//echo '<pre>'; print_r($_POST["loc"]); echo '</pre>';
	echo $output;
}





if(isset($_POST["fillsal"])){
    $sal=$_POST["sal"];
 //  echo $sal;
    $sal = preg_replace('/\s+/','',$sal);
    $qry="select * from jobpost where status=1 and maxSalary='$sal'";


    
       $query = $conn->prepare($qry);
		 $query->execute();
        if($query->rowCount() > 0)
        {


        $data = $query->fetchAll();
		 $output ='';

        foreach($data as $row) {


			$output .= '
			<div class="jobs" id="main-jobs" >
			<div class="single-job-card">
			<div class="row">
			<div class="col-sm-12 col-xs-9">
			<div class="col-12">
			<div class="job-card-description">
			<div class="internships-tabs">

			<div class="nav nav-pills" style="width:100%;height:100%;background-color:#ffc114;padding-left: 1%">
			<div class="job-title">

                <b><h4 class="truncate-normal" title="'. $row['jobTitle'] .'" data-etracking="true"><a href="#" target="_blank"  id="j_title" >'. $row['jobTitle'] .'</a></h4></b>
                </div></div>
                <div class="company-name"><p class="truncate-normal"style = "padding-left: 1%;" title="' .$row['company'] .'" data-etracking="true"><a href="#" target="_blank" >' .$row['company'] .'</a></p></div>
                <div class="job-locations"><p class="truncate-normal" style = "padding-left: 1%;" title="Location(s)" data-etracking="true"><a href="#" target="_blank" > '. $row['location'] .'</a></p></div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="row job-info no-margin-left no-margin-right" style="margin-left:1%;">

        <ul class="list-group" style="paddding-left:6% !important;">
          <li class="list-group-item" title="' .$row['type'] .'" data-etracking="true"><i class="fa fa-briefcase"></i>&nbsp;' .$row['type'] .'
           </li>
          <li class="list-group-item" title="Compensation" data-etracking="true" data-ecategory="job_card_compensation" >
        <i class="fa fa-inr" ></i>' .$row['maxSalary'] .'
          </li>
          <li class="list-group-item" title="Qualification" data-etracking="true" data-ecategory="job_card_start_date">
            <i class="fa fa-user" ></i>' .$row['education'] .'
          </li>
          </ul></div>
         <div class="row no-margin-left no-margin-right job-lowest-section">
          <div class="col-sm-3 col-xs-3 text-right visible-xs">

        </div>

        <div class="col-sm-12 col-xs-9">

            <div class="text-right" style="padding-right:6%;">




                 <div class="job-apply-button" >
                    <a href="job_details.php?id='. $row['id'] .'"  class="btn btn-primary" title="Apply Now" style="font-size:18px;width:100%;height:100%;background-color:#ffc114;border: 0px;">Apply Now</a>


                </div>




            </div>

        </div>
    </div>

    </div>




        </div>
        </div>


			';
		}
	}
	else
	{
		$output = '<h4>No Job Found</h4>';
	}
	//echo '<pre>'; print_r($_POST["loc"]); echo '</pre>';
	echo $output;
}


?>
