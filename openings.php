<?php
        include_once 'DbConnection/DbConnectionHelper.php';
		?>
<!doctype html>
<html lang="en">
    <?php include_once 'Header.php'; ?>
<head>
  <style>
  label {

    font-weight: normal !important;
}
@media only screen and (max-width: 521px){
  #le {display: none;}
  #mi{display:block;
  flex: 100% !important; width:150% !important;}
  #ch{padding:10px !important;}
  .internships-tabs{width:inherit;}
  .btn{width:50%;}
  .col-12{width:138%;}
}
</style>
    <meta charset="UTF-8">
    <title>Openings</title>
    <?php include "CommonFiles.php"?>
	<script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <link rel="stylesheet" href="css/openings.css">
	 <link href="css/stylesearch.css" rel="stylesheet">
	 <link href="css/opening.css"  rel="stylesheet">
	 <link href="css/common.css"  rel="stylesheet">
   <link href="css/demo.css"  rel="stylesheet">

	<!-- <link href="css/style1.css"  rel="stylesheet">-->
</head>
<body>


<section id="banner">
    <div class="container">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <h2>Openings</h2>
            <p><a href="index">Home</a> <span>/</span> Openings</p>
        </div>
    </div>
</section>


<section id="opening">
     <div class="row" style="padding: 10px 40px;">

             <input type="search" id="searchtitle" class="searchboox" placeholder="Search Jobs|Internships.." style="width:75%;"/>



   </div>
        <div class="row" id="ch" style="padding: 40px;">
  <div class="column" id = "le" style = "flex: 25%;max-width: 25%;padding: 0 4px;font-weight:normal;">

     	<div id="filtersection" style="display:block;padding: 10px 20px 20px 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin: 20px 0px;
    font-weight:normal !important;">
     	    <h3>Search by</h3><hr>
     	    <div class="list-group">
					<h5 style="font-weight:bold;">Type</h5>
					<div class = "col-12"style="padding-left: 0;padding-right: 0;">
                    <?php

                    $query1 = "SELECT DISTINCT(type) FROM jobpost where type IS NOT NULL";
                    $statement = $conn->prepare($query1);
                    $statement->execute();
                    $result1 = $statement->fetchAll();
                    foreach($result1 as $row1)
                    {
                    ?>
                    <div class="list-group-item ">
                        <label><input type="checkbox" class="common_selector type" value="<?php echo $row1['type']; ?>" > <?php echo $row1['type']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                </div>
                </div>
	<div class="list-group">
					<h5 style="font-weight:bold;">Location</h5>
                    <div class = "col-12"style="padding-left: 0;padding-right: 0;">
					<?php

                    $query = "SELECT DISTINCT location FROM jobpost where location IS NOT NULL";
                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item ">
                        <label><input type="checkbox" class="common_selector loc" value="<?php echo $row['location']; ?>"  > <?php echo $row['location']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

				<div class="list-group">
					<h5 style="font-weight:bold;">Experience</h5>
						<div class = "col-12"style="padding-left: 0;padding-right: 0;">
					<?php
                   $query2 = "SELECT DISTINCT(exp) FROM jobpost WHERE exp IS NOT NULL";
                    $statement = $conn->prepare($query2);
                    $statement->execute();
                    $result2 = $statement->fetchAll();
                    foreach($result2 as $row2)
                    {
                    ?>
                    <div class="list-group-item ">
                        <label><input type="checkbox" class="common_selector exp" value="<?php echo $row2['exp']; ?>"  > <?php echo $row2['exp']; ?></label>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                </div>

                <div class="list-group">
              					<h5 style="font-weight:bold;">Salary</h5>
                                  <div class = "col-12"style="padding-left: 0;padding-right: 0;">
              					<?php

                                  $query = "SELECT DISTINCT maxSalary FROM jobpost where maxSalary IS NOT NULL";
                                  $statement = $conn->prepare($query);
                                  $statement->execute();
                                  $result = $statement->fetchAll();
                                  foreach($result as $row)
                                  {
                                  ?>
                                  <div class="list-group-item ">
                                      <label><input type="checkbox" class="common_selector sal" value="<?php echo $row['maxSalary']; ?>"  > <?php echo $row['maxSalary']; ?></label>
                                  </div>
                                  <?php
                                  }

                                  ?>
                                  </div>
                              </div>
                              <div class="list-group">
                                      <h5 style="font-weight:bold;">Skills</h5>
                                                <div class = "col-12"style="padding-left: 0;padding-right: 0;">
                                      <?php

                                                $query = "SELECT DISTINCT skills FROM jobpost where skills IS NOT NULL";
                                                $statement = $conn->prepare($query);
                                                $statement->execute();
                                                $result = $statement->fetchAll();
                                                foreach($result as $row)
                                                {
                                                ?>
                                                <div class="list-group-item ">
                                                    <label><input type="checkbox" class="common_selector skills" value="<?php echo $row['skills']; ?>"  > <?php echo $row['skills']; ?></label>
                                                </div>
                                                <?php
                                                }

                                                ?>
                                                </div>
                                            </div>
                                            <div class="list-group">
                                          					<h5 style="font-weight:bold;">Education</h5>
                                                              <div class = "col-12"style="padding-left: 0;padding-right: 0;">
                                          					<?php

                                                              $query = "SELECT DISTINCT education FROM jobpost where education IS NOT NULL";
                                                              $statement = $conn->prepare($query);
                                                              $statement->execute();
                                                              $result = $statement->fetchAll();
                                                              foreach($result as $row)
                                                              {
                                                              ?>
                                                              <div class="list-group-item ">
                                                                  <label><input type="checkbox" class="common_selector edu" value="<?php echo $row['education']; ?>"  > <?php echo $row['education']; ?></label>
                                                              </div>
                                                              <?php
                                                              }

                                                              ?>
                                                              </div>
                                                          </div>
                <p id="clearfilter" style="font-weight:bold; color:red;cursor: pointer;"></p>
  </div>
  </div>

  <div class="column" id='mi'style = "flex: 50%;max-width:100%;padding: 0 4px;overflow-y: scroll;overflow-x: hidden;max-height: 940px;padding-top:1.5%;">
    <div class="list-group" style="display:block;box-sizing:border-box;">
					 <div class="filter_data">



		</div>
    </div>

  </div>

<div class="column ri" style = "flex: 25%;max-width: 25%;padding: 0 4px;">


  </div>





    </div>
</section>

<?php include "CommonFiles.php"?>
<style>
.input-group>.custom-select:not(:last-child), .input-group>.form-control:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}</style>
    <link rel="stylesheet" href="css/job.css">
    <link rel="stylesheet" href="css/collage.css">
    <script src="https://kit.fontawesome.com/62c6b753c2.js" crossorigin="anonymous"></script>
    <!--javascpt-->
    <link rel="stylesheet" href="css1/chat.css">
    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/62c6b753c2.js" crossorigin="anonymous"></script>
    <link rel="icon" href="css/logo.png" type="image/icon type">
    <link rel="icon" type="png" href="images/profile.png">
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&family=Ubuntu&display=swap" rel="stylesheet">
    <!--bootstrap cdn-->

   <!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <h2><span class="heading">Innerwork</span></h2>
                <p>Innerwork is emerging as a leader in the next phase of HR Services</p>
                <a href="about" class="btton">Read More <i class="fa fa-angle-double-right"></i></a>
                  <ul class="contactSocial">
                    <li><a href="https://www.facebook.com/Innerworkolution/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCuwkBl5yeSlnxSYarnIlZsA" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/innerworksolutions/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="https://www.facebook.com/InnerworkSolution" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="https://twitter.com/innverwork" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://in.pinterest.com/innerwork123/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="https://www.quora.com/profile/Innerwork-India" target="_blank"><i class="fa fa-quora"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="row">
                    <h3>Quick Links</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="links">
                            <li><a href="index">Home</a></li>
                            <li><a href="about">About Us</a></li>
                            <li><a href="hr-consultancy">HR Services</a></li>
                            <li><a href="it-services">IT Services</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="links">
                            <li><a href="digital-marketing">Digital Marketing</a></li>
                            <li><a href="jobseeker">Job Seeker</a></li>
                            <li><a href="contact">Contact Us</a></li>
                            <li><a href="termsandconditions">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="contactDetail" style="color:#01131b;">
                    <h3>Reach Us</h3>
                    <p><i class="fa fa-map"></i> <span>#80, 4th cross, Aswath Nagar, Marathahalli, Bangalore - 560037</span></p>
                    <p><i class="fa fa-phone"></i><span><a href="tel:(080)-4209-2269)"> (080)-4209-2269)</href></span></p>
                    <p><i class="fa fa-envelope"></i><sapn><a href="mailto:Info@innerworkindia.com">Info@innerworkindia.com</a></sapn></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="footerBottm">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; 2020 Innerwork. All right reserved.</p>
            </div>
            <div class="col-md-6">
                <p class="copyright">
                    Website Design & Developed By</i> <a href="http://www.innerworkindia.com" target="_blank">Innerwork Solutions</a>
                </p>
            </div>
        </div>
    </div>

</section>


<script type="text/javascript">
    (function () {
        var options = {
             whatsapp: "+91 9887888469", // WhatsApp number
            call_to_action: "Message Us", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>

<!-- Tawk.to -->
<!--Start of Tawk.to Script-->

<!--<button class="open-button btn btn-secondary" onclick="openForm()"><i class="fas fa-comment-dots"></i></button>
    <div class="container" id="containerr">
      <div class="msg-header-img1">
        <img src="css1/logo.png" alt="">
      </div>
      <div class="msg-header">
        <div class="active">
          <h4>Welcome to Innerchat</h4>
        </div>

      </div>
      <div class="chat-page" id="chatpage">
        <div class="msg-inbox" id="msginbox">
          <div class="chats">
            <div class="msg-page" id= "msgpage">
              <div class="received-chats">
                <div class="received-chats-img">
                <img src="css1/logo.png" alt="">
                </div>
                <div class="received-msg">
                  <div class="received-msg-inbox">
                  <p>Hey! Welcome to Innerwork Solutions. How may I help you?</p>
                  <span class ="time" id="time"></span>
                  </div>
                </div>
              </div>-->
                <!-- <div class="outgoing-chats">
                  <div class="outgoing-chats-msg">
                      <p>Hii!! This is message from</p>
                      <span class ="time">11:01 pm | October 11</span>
                  </div>
                  <div class="outgoing-chats-img">
                  <img src="user.jpg" alt="">
                  </div>
              </div> -->





        <!--    </div>
          </div>
        </div>
      </div>
      <div class="msg-bottom">

            <div class="input-group" style="
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100%;
">
              <input type="text" class="form-control" placeholder="write a message....." id="result" style="position: relative;
    -ms-flex: 1 1 0%;
    flex: 1 1 0%;
    min-width: 0;
    margin-bottom: 0;">
              <div class="input-group-append" style="margin-left: -1px;display: flex;">
                <span class="input-group-text"><button type="submit" name="button" onclick="results()"><i class="fas fa-paper-plane paper"></i></button> <button type="button" onclick="closeForm()"><i class="fas fa-power-off"></i></button></span>
              </div>
            </div>

      </div>
    </div>
    <script type="text/javascript">
    var time = getCurrentTime();
    document.getElementById("time").innerHTML = time;
    function getCurrentTime(){
    var now=new Date();
    var hh=now.getHours();
    var min=now.getMinutes();
    var ampm=(hh>=12)?'PM':'AM';
    hh=hh%12;
    hh=hh?hh:12;
    hh=hh<10?'0'+hh:hh;
    min=min<10?'0'+min:min;
    var time=hh+":"+min+" "+ampm;
    return time;
    }
    function results() {
    var txt=jQuery('.form-control').val();
    if( txt != ''){
    var html='<div style="overflow: hidden; margin: 0;"><div style="float: left; width: 46%; margin-left: 45%;"><p style = "background-color: #000000;  color: #fff; font-size: 14px; border-radius: 10px; padding: 5px 10px 5px 12px; margin: 0; width: 100%;">'+txt+'</p><span style = "color: #777; font-size: 12px; margin: 8px 0 0; display: block;">'+getCurrentTime()+'</span></div><div style = "width: 20px; float: right;"><img src="user.jpg" alt="" style = "border-radius: 50%;"></div></div>';
   var html1 = '<div><div style = "display: inline-block; width: 20px; float: left;"><img src="css/logo.png" alt="" style = "border-radius: 50%;"></div><div style="display: inline-block; padding: 0 0 0 10px; vertical-align: top; width: 92%;"><div style= "width: 70%;"><form id="frm" name="myForm" method="post" action="save1.php"><p style = "background-color: #f0a500;  color: black; font-size: 14px; border-radius: 10px; padding: 5px 10px 5px 12px; margin: 0; width: 100%;"><a href="chat/client/login.php" style = "color: black">Click here to chat Further</a><br><br></p></form><span style = "color: #777; font-size: 12px; margin: 8px 0 0; display:block;">'+getCurrentTime()+'</span></div></div></div>';
    	jQuery('.msg-page').append(html);
     jQuery('.msg-page').append(html1);
    document.getElementById('result').value = ''};
    var btn = document.createElement("div").style.display="none";
     btn.innerHTML = result;
     document.getElementById("msgpage").appendChild(btn);
  }
  document.addEventListener("keydown", function(event){if(event.keyCode == 13){ results(); }})
  function openForm() {
  document.getElementById("containerr").style.display = "block";
  document.getElementById("open-button").style.display = "none";
}

function closeForm() {
  document.getElementById("containerr").style.display = "none";
  document.getElementById("open-button").style.display = "block";
}

    </script>-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5e7f141369e9320caabde55f/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>

<!--End of Tawk.to Script-->

<style>
#loading
{
	text-align:center;
	background: url('loader.gif') no-repeat center;
	height: 150px;
}
.searchboox
 {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 1px;
  font-size: 16px;
  background-color: white;
  background-image: url('img/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  transition: width 0.4s ease-in-out;
  height:41px;
}

.searchboox:focus
{
  width: 80%;
}

</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');

        var action = 'fetch_data';
        var sectitle = $('#searchtitle').val();
       // var maximum_price = $('#hidden_maximum_price').val();
        var loc = get_filter('loc');
        var type = get_filter('type');
        var exp = get_filter('exp');
        var sal = get_filter('sal');
        var skills = get_filter('skills');
        var edu = get_filter('edu');
        $.ajax({
            url:"getjobpostajax.php",
            method:"POST",
            data:{action:action, sectitle:sectitle, loc:loc, type:type, exp:exp, sal:sal, skills:skills, edu:edu},
            success:function(data){

                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
            $('#clearfilter').html('Clear Filter');
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });
$('#searchtitle').keyup(function(){
        filter_data();
    });
$('#filtersectionbtn').click(function() {
    $('#filtersection').toggle();
});
$('#clearfilter').click(function() {
    $(".type").prop("checked", false);
	$(".loc").prop("checked", false);
	$(".exp").prop("checked", false);
  $(".sal").prop("checked", false);
  $(".skills").prop("checked", false);
  $(".edu").prop("checked", false);
	 $('#clearfilter').html('');
	 $('#searchtitle').val('');

	filter_data();
});
});
    
    
    


        function fillIn(title){
      //      alert(title);
            $.ajax({
			
                url:"getjobpostajax.php",
                type:"POST",
                async:false,
                data:{
                    "fill":1,
                    "title":title
                },
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        }

    
        function fillInComp(title){
          // alert(title);
            $.ajax({
			
                url:"getjobpostajax.php",
                type:"POST",
                async:false,
                data:{
                    "fillcomp":1,
                    "comp":title
                },
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        }
    
    
    
            function fillInLoc(title){
          // alert(title);
            $.ajax({
			
                url:"getjobpostajax.php",
                type:"POST",
                async:false,
                data:{
                    "fillloc":1,
                    "loc":title
                },
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        }
    
    
        
            function fillInsalary(title){
                var title2 = title.replace(' <i class="fa fa-inr" aria-hidden="true"></i>', "");
         //  alert(title2);
            $.ajax({
			
                url:"getjobpostajax.php",
                type:"POST",
                async:false,
                data:{
                    "fillsal":1,
                    "sal":title2
                },
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        }
</script>
</body>
</html>
