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
            
                <b><h4 class="truncate-normal">'. $row['jobTitle'] .'</h4></b>
                </div></div>
                <div class="company-name"><p class="truncate-normal"style = "padding-left: 1%;">' .$row['company'] .'</p></div>
                <div class="job-locations"><p class="truncate-normal" style = "padding-left: 1%;">'. $row['location'] .'</p></div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="row job-info no-margin-left no-margin-right">

        <ul class="list-group">
          <li class="list-group-item"><i class="fa fa-briefcase"></i>' .$row['type'] .'
           </li>
          <li class="list-group-item">
        <i class="fa fa-inr" title="Compensation" data-etracking="true" data-ecategory="job_card_compensation"></i>' .$row['maxSalary'] .'
          </li>
          <li class="list-group-item">
            <i class="fa fa-user" title="Start Date" data-etracking="true" data-ecategory="job_card_start_date"></i>' .$row['education'] .'
          </li>
          </ul></div>
         <div class="row no-margin-left no-margin-right job-lowest-section">
          <div class="col-sm-3 col-xs-3 text-right visible-xs">
            
        </div>

        <div class="col-sm-12 col-xs-9">

            <div class="text-right">

               


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
