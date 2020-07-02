<?php
	$jid=$_GET['id'];

	if($jid==''){
		header("location:https://innerworkindia.com/openings");
	}
	include_once 'DbConnection/DbConnectionHelper.php';
	require 'PHPMailer/PHPMailerAutoload.php';
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
$mail = new PHPMailer();

include_once "WebUtils.php";
$utils = new WebUtils();



        try{

        $status = true;
        $stmt = $conn->prepare("select * from jobpost where id='$jid' and status = ?");
        $stmt->bindParam(1, $status);
        $stmt->execute();
        if($stmt->rowCount() > 0)
        {


        $data = $stmt->fetchAll();
        foreach($data as $row) {
			$jtitle=$row['jobTitle'];
			$jcompany=$row['company'];
			$jtype=$row['jobType'];
			$jmaxsal=$row['maxSalary'];
			$jlocattion=$row['location'];
			$jexp=$row['exp'];
			$jedu=$row['education'];
			$jdtime=$row['dateTime'];
			$jdesccc=$row['j_desc'];
			$jrefamt=$row['job_referalamt'];
			$about_comp=$row['about_comp'];
			$type=$row['type'];
			$skills=$row['skills'];
		    $email=$row['email'];
		    $name=$row['cpname'];
		    $cno=$row['cpnum'];
		}

        }


        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
        ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Details</title>
    <?php include "CommonFiles.php"?>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/openings.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/style1.css">
 <meta property="og:url"           content="https://innerworkindia.com/job_details.php?id?type=<?php echo $jid; echo $type; ?>" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Innerwork India" />
  <meta property="og:description"   content="<?php echo $jtitle;?>" />
  <meta property="og:image"         content="https://innerworkindia.com/img/logo.png" />
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0"></script>
<?php include_once 'Header.php'; ?>

<section id="banner">
    <div class="container">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <h2>Job Details</h2>
            <p><a href="index">Home</a> <span>/</span> Job Details</p>
        </div>
    </div>
</section>
<section id="internship-page">
    <div class="container">
<div class="row">
					<div class="col-sm-9 col-xs-12">

						<div id="internship-page-only">

							<div class="row">
								<div class="col-sm-12">
									<div class="job-summary-card">

										<div class="card-section-1">



											<div class="row">
												<div class="col-sm-8 col-xs-9">
													<div class="job-title">
													<h4 class="truncate-normal wrap-normal-mobile"><?php echo $jtitle; ?></h4>
													</div>

													<div class="company-name">
														<p class="truncate-normal"><?php echo $jcompany; ?></p>
													</div>

													<div class="job-locations">
														<p class="truncate-normal wrap-normal-mobile"><?php echo $jlocattion; ?>														</p>
													</div>
												</div>


										<div class="card-section-2">
										    <ul class="list-group" style="float:left;">
          <li class="list-group-item"><i class="fa fa-briefcase"></i><?php echo $type; ?>
           </li>
          <li class="list-group-item">
        <i class="fa fa-inr" title="Compensation" data-etracking="true" data-ecategory="job_card_compensation"></i><?php echo $jmaxsal; ?>
          </li>
          <li class="list-group-item">
            <i class="fa fa-user" title="Start Date" data-etracking="true" data-ecategory="job_card_start_date"></i><?php echo $jedu; ?>
          </li>
          <li class="list-group-item">
        <i class="fa fa-calendar" title="Compensation" data-etracking="true" data-ecategory="job_card_compensation"></i>Posted on <?php echo $jdtime; ?>
          </li>
          </ul>
										</div>
										</div></div>
										<div class="row">
												<div class="col-sm-12">
													<div class="share-apply-section pull-right">






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


																		<div class="apply-button pull-right text-center">
																			<a href="applyjob?id=<?php echo $jid;?>" id="applyjobpageLink" style="border: 0px;display: inline;width: 0%; margin-top: 0%;padding: 0%;">
																				<BUTTON style="padding: 10px 35px; border-radius: 3px; background: #ffc114; color: #fff; font-size: 1.6rem;
    font-weight: 600; float:right;">Apply Online</BUTTON></a></div>

																				 <i class="fa fa-spinner fa-spin loader_icon" style="display:none;"></i>
																			</a>
																		</div>


													</div>

												</div>
											</div>



											<div class="clearfix"></div>

										</div>

									</div>
								</div>
							</div></div><br><hr>

<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="internship-info-section">
										<div id="internship-details">
											<h3>Details</h3>
											<div class="details-section fixht">

														<h4>About Company:</h4>
														<p><?php echo $jtitle; ?></p>
														<p><?php echo $jlocattion; ?></p>
														<?php echo $about_comp; ?>
														<p><?php echo $name ?> :</p>
													    <p><b><?php echo $cno ?></b></p>
													    <a style="color:blue" href="mailto:someone@example.com"><b><?php echo $email ?></b></a>
											</div>
										</div>

										<div id="no-of-positions" style="">
											<h3><?php echo $type;?> Description:</h3>

											<p style="text-align: justify;-moz-text-align-last: justify;text-align-last: justify;"><?php echo $jdesccc;?></p>

										</div>
										<div id="no-of-positions" style="">
											<h3>Education Requirements</h3>
											<p><?php echo $jedu;?></p>

										</div>

										<div id="skills-required">
											<h3>Skills Required</h3>

												<ul class="list-inline">


														<li>-<?php echo $skills; ?></li>


												</ul>


										</div>


										<div id="application-deadline">
											<h3><?php if($type=="Job"){echo "SALARY";}else{echo "STIPEND";} ?></h3>

												<p> <?php if($jmaxsal=="Unpaid"){echo $jmaxsal;}else{ echo "Rs.".$jmaxsal;} ?></b></p>


										</div>


										<div class="text-center">


														<div class="apply-button text-center">
															<a href="applyjob?id=<?php echo $jid;?>" id="applyjobpageLink" style="border: 0px;display: inline;width: 0%; margin-top: 0%;padding: 0%;">
																				<BUTTON style="padding: 10px 35px; border-radius: 3px; background: #ffc114; color: #fff; font-size: 1.6rem;
    font-weight: 600; float:right;">Apply Online</BUTTON></a></div>

																 <i class="fa fa-spinner fa-spin loader_icon" style="display:none;"></i>
															</a>
														</div>


									</div>

									</div>
								</div>


							</div>

						</div>









				<!--<div class="fb-share-button" data-href="https://innerworkindia.com/openings" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Finnerworkindia.com%2Fopenings&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>-->
               <!-- <div class="details" id="acco1Details">
                    <p><b>Company : </b><?php //echo $row['company']; ?></p>
                    <p><b>Job Type : </b><?php //echo $row['jobType']; ?></p>
                    <p><b>Salary : </b><?php //echo $row['maxSalary']; ?></p>
                    <p><b>Job Location : </b><?php //echo $row['location']; ?></p>
                    <p><b>Salary : </b><?php //echo $row['maxSalary']; ?></p>
                    <p>Submit your cv to <strong>info@innerworkindia.com</strong> </p>
                </div>-->

</div>
        </div>

    </div>
</section>

<?php include_once 'Footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>
