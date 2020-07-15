<?php

//fetch_data.php
 include_once 'DbConnection/DbConnectionHelper.php';

if(isset($_POST["action"]))
{
       $qry1="select name,email,mobileNum,city,exp,education,skill,file from jobseeker";
	   $qry2="select name,email,mobno,city,exp,education,skill,fnamee from internship";
	   $qry = "(select name,email,mobileNum,city,exp,education,skill,file from jobseeker) UNION (select name,email,mobno,city,exp,education,skill,fnamee from internship)";
	  // if(isset($_POST["loc"]) && !empty($_POST["loc"]) )
		  if(isset($_POST["sectitle"]) && !empty($_POST["sectitle"]))
	{$name=$_POST['sectitle'];
		$qry = "(".$qry1." WHERE name like '%$name%' or city like '%$name%' or skill like '%$name%' or exp like '%$name%' or education like '%$name%' ) "."UNION" . " (".$qry2." WHERE name like '%$name%' or city like '%$name%' or skill like '%$name%' or exp like '%$name%' or education like '%$name%' ) ";




	}
		   if(isset($_POST["loc"]))
	{
		$loc_filter = implode("','", $_POST["loc"]);

			$qry = "(".$qry1." WHERE city IN('".$loc_filter."')) "."UNION" . " (".$qry2." WHERE city IN('".$loc_filter."'))";




	}

	 if(isset($_POST["exp"]))
	{
		$exp_filter = implode("','", $_POST["exp"]);
		  $qry = "(".$qry1." WHERE exp IN('".$exp_filter."')) "."UNION" . " (".$qry2." WHERE exp IN('".$exp_filter."'))";

	}

 if(isset($_POST["skills"]))
{
  $skills_filter = implode("','", $_POST["skills"]);
  		  $qry = "(".$qry1." WHERE skill IN('".$skills_filter."')) "."UNION" . " (".$qry2." WHERE skill IN('".$skills_filter."'))";


}
if(isset($_POST["edu"]))
{
 $edu_filter = implode("','", $_POST["edu"]);
 	  $qry = "(".$qry1." WHERE education IN('".$edu_filter."')) "."UNION" . " (".$qry2." WHERE education IN('".$edu_filter."'))";


}
        $query = $conn->prepare($qry);
		 $query->execute();
        if($query->rowCount() > 0)
        {


        $data = $query->fetchAll();
		 $output ='';

        foreach($data as $row) {

         $Resume_file_raw = $row['file'];
            $Resume_file = str_replace(" ","%20",$Resume_file_raw);


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

                <b><h4 class="truncate-normal" title="'. $row['name'] .'" data-etracking="true" >'. $row['name'] .'</h4>
                </b>
                </div></div>
                <div class="company-name"><p class="truncate-normal" style = "padding-left: 1%;margin-bottom:-15px;" title="' .$row['mobileNum'] .'" data-etracking="true">' .$row['mobileNum'] .'</p>
                <p class="truncate-normal" style = "padding-left: 1%;margin-bottom:-10px;" title="email" data-etracking="true"><a href="mailto:' .$row['email'] .'">' .$row['email'] .'</a></p></div>
                <div class="job-locations"><p class="truncate-normal" style = "padding-left: 1%;" title="Location(s)" data-etracking="true">'. $row['city'] .'</p></div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="row job-info no-margin-left no-margin-right">

        <ul class="list-group" style="paddding-left:6% !important;">
          <li class="list-group-item" title="' .$row['exp'] .'" data-etracking="true">Experience: ' .$row['exp'] .'
           </li>
          <li class="list-group-item" title="Compensation" data-etracking="true" data-ecategory="job_card_compensation">
        Skills: ' .$row['skill'] .'
          </li>
          <li class="list-group-item" title="Qualification" data-etracking="true" data-ecategory="job_card_start_date">
          Education: ' .$row['education'] .'
          </li>
          <li class="list-group-item" title="Resume" data-etracking="true" data-ecategory="job_card_start_date">
          View Resume:<a href=\"https://innerworkindia.com/Resume/{$Resume_file}\"> ' .$row['file'] .'</a>
          </li>
          </ul></div>


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
