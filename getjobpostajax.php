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

               

                <div class="job-share">
													    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#ffc114;"><i class="fa fa-share-alt fa-lg"></i></a>
                                                          <div class="dropdown-menu " aria-labelledby="navbarDropdown" style="margin:0;

    padding: .25rem 1.5rem;
    clear: both;
    font-weight: 400;
    color: #ffc114;
    text-align: inherit;
    white-space: nowrap;
    border: 0;">
          
         
         <a class="dropdown-item" style = "background-color: #fff;border-color:#fff;" href="https://twitter.com/intent/tweet?text=<?php echo $jtitle .' - ' .$jcompany; ?> https://innerworkindia.com/job_details.php?id=<?php echo $jid;?>" target= "_blank"><img src="img/we.jpg" style="height :30px"><p style="display: inline;color:black;font-size: 14px;">  Twitter</p></a>
          <a class="dropdown-item"style = "background-color: #fff;border-color:#fff;" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Finnerworkindia.com%2Fjob_details.php%3Fid=<?php echo $jid; ?>&amp;src=sdkpreparse" target= "_blank"><img src="img/fb.jpg" style="height :30px"><p style="display: inline;color:black;font-size: 14px;">  Facebook</p></a>
        <a class="dropdown-item" style = "background-color: #fff;border-color:#fff;" href=" https://wa.me/919887888469" target= "_blank"><img src="img/wp.jpg" style="height :30px"><p style="display: inline;color:black;font-size: 14px;">  Whatsapp</p></a>
        <a class="dropdown-item" style = "background-color: #fff;border-color:#fff;"href="https://www.linkedin.com/shareArticle?mini=true&url=https://innerworkindia.com/Dev_Site/job_details.php?id=23&title=&summary=&source=" target= "_blank"><img src="img/link.png" style="height :30px"><p style="display: inline;color:black;font-size: 14px;">  Linkedin</p></a>
        </div>
                </div>
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
