
<html lang="en">
    <head>
     <meta charset="UTF-8">
    <title> Innerwork Freelancer Login | Innerwork Employer Login</title>
<link rel="stylesheet" href="css/demo.css">
     <link rel="stylesheet" type="text/css" href="css/registrationstyle.css">
    <?php include "CommonFiles.php"?>

      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=UA-154697763-1&amp;l=dataLayer&amp;cx=c"></script><script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/releases/ADnAC3ZykfbIOflWgrKNsVVT/recaptcha__en.js"></script><script src="https://incruiter.com/assets/login/jquery-3.2.1.min.js.download" type="text/javascript"></script>
      <script src="https://incruiter.com/js/fabricjs.min.js" type="text/javascript"></script>
      <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-147476811-1"></script>

      <link rel="stylesheet" type="text/css" href="css/recuiterchoicestyle.css">
          <link rel="stylesheet" href="css/job.css">
    <link rel="stylesheet" href="css/collage.css">
    <style>
    #h_inner font{
      font-family: Monotype Corsiva !important;
    }
    </style>
      <script src="https://www.google.com/recaptcha/api.js" async="" defer=""></script>
      <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'UA-147476811-1');
          function correctCaptcha1(response) {
                if (response.length === 0) {
                    $('#enquiry_btn1').prop('disabled', false);
                } else {
                    $('#enquiry_btn1').prop('disabled', false);
                    $('#check3').html('');
                }
            }
      </script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script src="https://www.googletagmanager.com/gtag/js?id=UA-154697763-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-154697763-1');
      </script>

</head>
<body>
<?php include_once 'Header.php'; ?>

<section id="banner">
    <div class="container">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <h2></h2>
            <p><a href="index">Home</a> <span>/</span> Agency | Freelance </p>
        </div>
    </div>
</section>
    <div style="width: 500px; height: 500px; position: fixed; user-select: none; opacity: 0; z-index: -1;">
       <canvas id="mycanvas" width="625" height="625" style="position: absolute; width: 500px; height: 500px; left: 0px; top: 0px; touch-action: none; user-select: none;"></canvas>
       <canvas width="500" height="500" style="position: absolute; width: 500px; height: 500px; left: 0px; top: 0px; touch-action: none; user-select: none;"></canvas>
    </div>
    <div class="limiter">
       <div class="container-login100">
          <div class="wrap-login100 p-t-0 p-b-30" style="width: 800px">
            <span class="text-dark login100-form-title p-t-20 p-b-45" style="font-family: 'Raleway';font-weight: bold;">Recruiter Registration
             <h5>Agency</h5>
            </span>
            <form action="recruiterregistration.php" method="post" class="login100-form" enctype="multipart/form-data" onsubmit="return myfun()" id="detailsform">
               <input type="hidden" name="_token" value="qMzG0IFi1lTA9IAvzHBlXS2OtPaL3bb1pPsj2qil">
               <input type="hidden" name="pic" id="p_pic" value="">
               <div class="col-md-12 validate-input m-b-10 text-center">
                   <div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <label class="radio_btns btn btn-primary active" data-id="1" style="cursor: pointer;width:100px;height:50px;background-color:#ffc114;;"><input type="radio" name="type" value="agency" id="option1" autocomplete="off" checked="" class="btn" style="font-family: 'Raleway';font-weight: bold;font-size:30px">Agency</label>
                       <label class="radio_btns btn btn-primary " data-id="2" style="cursor: pointer;background-color:#ffc114;width:100px;height:45px;"><input type="radio" name="type" value="freelancer" id="option2" autocomplete="off" class="btn" style="font-family: 'Raleway';font-weight: bold;font-size:30px;"> Freelancer</label>
                   </div>
               </div>
               <div class="company_div col-md-12 validate-input m-b-10">
                   <input class="input100 company_name" type="text" style="font-family: 'Raleway';font-weight: bold;" name="companyname" placeholder="Company Name" required="">
                   <span class="focus-input100"></span>
                   <span class="symbol-input100"><i class="fa fa-copyright"></i></span>
               </div>
               <div class="fullname_div col-md-12 validate-input m-b-10">
                  <input class="input100 full_name" type="text" value="" style="font-family: 'Raleway';font-weight: bold;" name="fullname" placeholder="Full Name">
                  <span class="focus-input100"></span>
                  <span class="symbol-input100"><i class="fa fa-user"></i></span>
               </div>
               <div class="website_div col-md-12  validate-input m-b-10">
                   <input class="input100 " type="text" style="font-family: 'Raleway';font-weight: bold;" name="website" placeholder="Website" required="" value="">
                   <span class="focus-input100"></span>
                   <span class="symbol-input100"><i class="fa fa-globe"></i></span>
               </div>
               <div class="col-md-12 validate-input m-b-10">
                    <input class="input100" type="text" style="font-family: 'Raleway';font-weight: bold;" name="mobile" placeholder="Mobile" required="" value="" pattern="{0-9}[10]" maxlength="10">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"><i class="fas fa-mobile-alt"></i></span>
               </div>
               <div class="col-md-12 validate-input m-b-10">
                    <input class="company_address input100" type="text" style="font-family: 'Raleway';font-weight: bold;" name="address" placeholder="Company Address" required="" value="">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"><i class="fas fa-map-marker-alt"></i></span>
               </div>
               <div class="col-md-12 validate-input m-b-10">
                    <select onchange="print_city('state', this.selectedIndex);" id="sts" name="state" class="form-control input100" style="height:50px;font-family: 'Raleway';font-weight: bold;border-radius:50px;" required="">
                        <option value="">Select State</option>
                        <option value="Andaman &amp; Nicobar">Andaman Nicobar</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadra &amp; Nagar Haveli">Dadra Nagar Haveli</option>
                        <option value="Daman &amp; Diu">Daman Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu &amp; Kashmir">Jammu &amp; Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Orissa">Orissa</option>
                        <option value="Pondicherry">Pondicherry</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttaranchal">Uttaranchal</option>
                        <option value="West Bengal">West Bengal</option>
                   </select>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"><i class="fas fa-map-marked-alt"></i></span>
               </div>
               <div class="col-md-12 validate-input m-b-10">
                   <select id="state" name="city" style="height:50px;font-family: 'Raleway';font-weight: bold;border-radius:50px;" class="form-control input100" required=""></select>
                   <span class="focus-input100"></span>
                   <span class="symbol-input100"><i class="fas fa-map-marked-alt"></i></span>
               </div>
               <div class="col-md-12 validate-input m-b-10">
                   <input class="input100" type="text" style="font-family: 'Raleway';font-weight: bold;" name="postcode" placeholder="Post Code" required="" value="">
                   <span class="focus-input100"></span>
                   <span class="symbol-input100"><i class="fas fa-paper-plane"></i></span>
               </div>
                <div class="col-md-12 validate-input m-b-10">
                    <select  id="sts" name="experience" class="form-control input100" style="height:50px;font-family: 'Raleway';font-weight: bold;border-radius:50px;" required="">
                        <option value="">Experience</option>
                        <option value="1">2</option>
                        <option value="2">3</option>
                        <option value="3">4</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>

                   </select>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"><i class="fas fa-map-marked-alt"></i></span>
               </div>

                <div class="col-md-12 pull-left validate-input m-b-10">
                     <input class="input100" type="text" value="" style="font-family: 'Raleway';font-weight: bold;" name="keyword" placeholder="Keywords e.g.IT,non IT,HR etc" required="">
                     <span class="focus-input100"></span>
                     <span class="symbol-input100"><i class="fa fa-user"></i></span>
               </div>
               <div class="contact_person_div col-md-12 validate-input m-b-10">
                     <input class="input100" type="text" style="font-family: 'Raleway';font-weight: bold;" name="contactperson" placeholder="Contact Person Name" required="" value="">
                     <span class="focus-input100"></span>
                     <span class="symbol-input100"><i class="fa fa-user"></i></span>
               </div>
               <div class="col-md-12 validate-input m-b-10">
                     <input class="input100" type="email" value="" style="font-family: 'Raleway';font-weight: bold;padding-left:53px;margin-bottom:0%;" name="email" placeholder="Email" required="" id="email">
                     <span class="focus-input100"></span>
                     <span class="symbol-input100"><i class="fa fa-user"></i></span>
               </div>
               <div class="col-md-12 validate-input m-b-10">
                     <input class="input100" type="password" style="font-family: 'Raleway';font-weight: bold;" name="password" id="password" placeholder="Password" required="" value="">
                     <span class="focus-input100"></span>
                     <span class="symbol-input100"></span>
               </div>
               <br>
                  <div class=" col-md-6 col-xs-12 validate-input m-b-10">

                     <span class="focus-input100" id="messages"style="background:white; height: 20px;color: red;padding-left: 20px;" ></span>
                     <span class="symbol-input100"></span>
               </div>
               <div class="col-md-12 validate-input m-b-10">
                     <input class="input100" type="password" style="font-family: 'Raleway';font-weight: bold;" name="passwordconfirmation" id="passwordconfirmation" required="" placeholder="Confirm Password" value="">
                     <span class="focus-input100"></span>
                     <span class="symbol-input100"></span>
               </div><br>
                  <div class=" col-md-6 col-xs-12 validate-input m-b-10">

                     <span class="focus-input100" id="messages1"style="background:white; height: 20px;color: red;padding-left: 20px;" ></span>
                     <span class="symbol-input100"></span>
               </div>
               <div class="col-md-12 validate-input m-b-10"><b>About US</b><br>
                     <textarea rows="4" class="form-control" placeholder="A few words about you ..." name="comment" style="width: 100%;border-radius: 20px;"></textarea>
                     <span class="focus-input100"></span>
                     <span class="symbol-input100"></span>
               </div>

               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
               <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
               <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
               <script type="text/javascript">
                    $('.selectpicker').selectpicker();
                    setTimeout(function(){
                        $(".selectpicker").click();
                        $(".selectpicker").click();
                        $(".selectpicker").click();
                        $(".selectpicker").click();
                    },1000);
               </script>
               <div class="col-md-12 validate-input m-b-10">
                    <span class=" p-4 mb-2 font-weight-bold">Specialist Sector</span>               <div class="city-checkbox bg-light p-3 input100" style="height: 140px;overflow-y: auto;padding-top: 10px;" id="location-filter">
                        <ul style="font-family: 'Raleway';">
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Aerospace" type="checkbox">Aerospace</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Automotive" type="checkbox">Automotive</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Agriculture, Fishing, Forestry" type="checkbox">Agriculture, Fishing, Forestry</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Accountancy" type="checkbox">Accountancy</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Arts &amp; Heritage" type="checkbox">Arts &amp; Heritage</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Banking, Insurance, Finance" type="checkbox">Banking, Insurance, Finance</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Hotel, Catering &amp; Hospitality" type="checkbox">Hotel, Catering &amp; Hospitality</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Construction, Real Estate, Property" type="checkbox">Construction, Real Estate, Property</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Customer Services, ITES, BPO" type="checkbox">Customer Services, ITES, BPO</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Education, Schools, Colleges" type="checkbox">Education, Schools, Colleges</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Electronics, Semiconductors" type="checkbox">Electronics, Semiconductors</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Engineering, Manufacturing, Utilities" type="checkbox">Engineering, Manufacturing, Utilities</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Environment" type="checkbox">Environment</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Fashion, Art &amp; Design" type="checkbox">Fashion, Art &amp; Design </label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Food &amp; Drink Manufacturing, FMCG, Cosmetics" type="checkbox">Food &amp; Drink Manufacturing, FMCG, Cosmetics</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Telecom, ISP" type="checkbox">Telecom, ISP</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Hospital, Healthcare" type="checkbox">Hospital, Healthcare</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Human Resources &amp; Training" type="checkbox">Human Resources &amp; Training </label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Industrial Products, Heavy Machinery" type="checkbox">Industrial Products, Heavy Machinery</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Consumer Durables" type="checkbox">Consumer Durables</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="IT, Software, Internet, Analytics" type="checkbox">IT, Software, Internet, Analytics</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Legal" type="checkbox">Legal</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Management" type="checkbox">Management</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Marketing, Advertising, PR" type="checkbox">Marketing, Advertising, PR</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Media, Television, Creative, Animation, Gaming" type="checkbox">Media, Television, Creative, Animation, Gaming</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Not for Profit, Charities" type="checkbox">Not for Profit, Charities </label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Oil, Gas, Alternative Energy" type="checkbox">Oil, Gas, Alternative Energy </label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Pharmaceutical &amp; Medical" type="checkbox">Pharmaceutical &amp; Medical </label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Chemicals, Plastic, Rubber" type="checkbox">Chemicals, Plastic, Rubber</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Public Sector &amp; Services" type="checkbox">Public Sector &amp; Services </label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Publishing" type="checkbox">Publishing</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Purchasing &amp; Supply Chain" type="checkbox">Purchasing &amp; Supply Chain </label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Rail" type="checkbox">Rail</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Retail, Wholesale" type="checkbox">Retail, Wholesale </label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Water Treatment, Waste Management" type="checkbox">Water Treatment, Waste Management</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Security" type="checkbox">Security</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Senior Executive Appointments" type="checkbox">Senior Executive Appointments</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Sports, Wellness, Fitness" type="checkbox">Sports, Wellness, Fitness</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Logistics, Courier, Transport" type="checkbox">Logistics, Courier, Transport</label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Travel, Leisure, Tourism" type="checkbox">Travel, Leisure, Tourism </label></div>
                            </li>
                            <li style="list-style:none">
                                <div class="checkbox font-weight-bold"><label style="font-family: 'Raleway';font-size:15px;"><input name="ssector[]" value="Other" type="checkbox">Other</label></div>
                            </li>
                       </ul>
                    </div>
                  </div>
               <div class="nature_div col-md-12 validate-input m-b-10">
                   <span class=" p-4 mb-2 font-weight-bold">Nature Of Business</span>         <input type="radio" id="permanent" name="nature" value="permanent" required=""><label for="permanent">Permanent</label>&nbsp;&nbsp;
                   <input type="radio" id="contract" name="nature" value="contract" required=""><label for="contract">Contract</label>&nbsp;&nbsp;
                   <input type="radio" id="both" name="nature" value="both" required=""><label for="both">Both</label>
                </div>
               <div class="staff_div col-md-12 validate-input m-b-10">
                     <input class="input100" type="number" style="font-family: 'Raleway';font-weight: bold;" name="noofstaffs" placeholder="Number Of Staff" required="" value="">
                     <span class="focus-input100"></span>
                     <span class="symbol-input100"><i class="fas fa-users"></i></span>
               </div>
               <div class="office_div col-md-12 col-xs-12 validate-input m-b-10">
                     <input class="input100" type="number" style="font-family: 'Raleway';font-weight: bold;" name="noofoffices" placeholder="Number Of Offices" required="" value="">
                     <span class="focus-input100"></span>
                     <span class="symbol-input100"><i class="far fa-building"></i></span>
               </div>
               <div class="placement_div col-md-12 col-xs-12 validate-input m-b-10">
                     <input class="input100" type="number" style="font-family: 'Raleway';font-weight: bold" name="noofplacements" placeholder="Approx Number Of Placements in past 12 months" required="" value="">
                     <span class="focus-input100"></span>
                     <span class="symbol-input100"><i class="fas fa-briefcase"></i></span>
               </div>
              <div class="image_div col-md-12 validate-input m-b-10">
                   <div style="font-family: 'Raleway';font-weight: bold;">Upload Image:

                 <input type="file" id="img" name="file"/ style="font-family: 'Raleway';font-weight: bold;display:inline-block;">
                    </div>

               </div>


               <script>
                    $(".radio_btns").click(function(){

                    if($(this).attr('data-id')=='2'){

                       $(".login100-form-title h5").text("Freelancer");
                    $(".website_div").css('display','none');
                    $(".website_div input").removeAttr('required');

                    $(".nature_div").css('display','none');
                    $(".nature_div input").removeAttr('required');


                    $(".staff_div").css('display','none');
                    $(".staff_div input").removeAttr('required');


                    $(".office_div").css('display','none');
                    $(".office_div input").removeAttr('required');


                    $(".company_div").css('display','none');
                    $(".company_div input").removeAttr('required');


                    $(".contact_person_div").css('display','none');
                    $(".contact_person_div input").removeAttr('required');

                    $(".fullname_div").css('display','block');
                    $(".fullname_div input").attr('required','requried');

                    $(".company_address").attr('placeholder','Address');

                    }
                    else if($(this).attr('data-id')=='1'){

                       $(".login100-form-title h5").text("Agency");
                    $(".fullname_div").css('display','none');
                    $(".fullname_div input").removeAttr('required');

                    $(".company_div").css('display','block');
                    $(".company_div input").attr('required','required');


                    $(".website_div").css('display','block');
                    $(".website_div input").attr('required','required');

                    $(".nature_div").css('display','block');
                    $(".nature_div input").attr('required','required');


                    $(".staff_div").css('display','block');
                    $(".staff_div input").attr('required','required');


                    $(".office_div").css('display','block');
                    $(".office_div input").attr('required','required');


                    $(".contact_person_div").css('display','block');
                    $(".contact_person_div input").attr('required','required');


                    $(".company_address").attr('placeholder','Company Address');

                    }
                    });
                  </script>
               <script type="text/javascript">
                        var checkbox="";
                        if(checkbox==''){
                            $(".radio_btns").eq(0).addClass('active');
                        }
                        else if(checkbox=='freelancer'){
                            $(".radio_btns").eq(1).click();
                        }
                  </script>

               <div class="container-login100-form-btn p-t-10">
                     <p style="font-family: 'Raleway';font-weight: bold">
                        <input type="checkbox" id="privacy" name="privacy" required="">
                        <label for="privacy">I accept <a style="font-family: 'Raleway';font-weight: bold;color: #F5AF00;" href="">Privacy Policy</a></label><br>
                        <input type="checkbox" id="terms" name="terms" required="">
                        <label for="terms">I accept <a style="font-family: 'Raleway';font-weight: bold;color: #F5AF00;" href="">Terms & Conditions</a></label>
                     </p>
               </div>

               <div class="container-login100-form-btn p-t-10">
                     <button class="choice" style="font-family: 'Raleway';font-weight: bold;" type="button" onclick="checkunique();" name="ab" id="ab">Register
                        <div class="mybtn_loader">
                           <div class="spinner"></div>
                        </div>
                     </button>
                    <button class="choice" style="font-family: 'Raleway';font-weight: bold;display:none;" type="submit" name="submit" id="insert">Register
                        <div class="mybtn_loader">
                           <div class="spinner"></div>
                        </div>
                     </button>
                  </div>
               <div class="container-login100-form-btn p-t-10">
                     <p style="font-family: 'Raleway';font-weight: bold">Already have an account? <a href="recruiterlogin.php" style="font-family: 'Raleway';font-weight: bold;color: #F5AF00;">Login here!</a></p>
                  </div>
             </form>
           </div>
         </div>
      </div>
      <script src="js/recstyleextra.js" type="text/javascript"></script>
      <script language="javascript">print_state("sts");
            $(".login100-form").submit(function(){
            $(".mybtn_loader").css('display','flex');
            $(".login100-form-btn").attr('disabled','disbaled');
            });
            var canvas = new fabric.Canvas('mycanvas');
            canvas.setDimensions({width:500,height:500});
            $(".canvas-container").css("position", "fixed").css('opacity','0').css("z-index", "-1");
            canvas.backgroundColor= '#1523AD';
            canvas.renderAll();
            var aname = new fabric.Textbox('',{
            fill:'#ffffff',
            left: 0,
            width: 500,
            textAlign: 'center',
            fontSize: 150,
            top: 170,
            fontWeight: 'bold',
            fontFamily: 'Raleway',
            });
            canvas.add(aname);
            $(".company_name").keyup(function(){
            let cname = $(this).val();
            var fletter ='';
            var sletter='';
            cname = cname.split(" ");
            for (var i = 0; i < cname.length; i++) {
            if(i>1){
                break;
            }
            fletter += cname[i].substring(0,1);
            }
            canvas.remove(aname);
            aname = new fabric.Textbox(fletter.toUpperCase(),{
            fill:'#ffffff',
            left: 0,
            width: 500,
            textAlign: 'center',
            fontSize: 150,
            top: 170,
            fontWeight: 'bold',
            fontFamily: 'Raleway',
            });
            canvas.add(aname);
            $("#p_pic").val(canvas.toDataURL());
            });
            $(".full_name").keyup(function(){
            let cname = $(this).val();
                var fletter ='';
                var sletter='';
                cname = cname.split(" ");
                for (var i = 0; i < cname.length; i++) {
                if(i>1){
                    break;
                }
                fletter += cname[i].substring(0,1);
                }
                canvas.remove(aname);
                aname = new fabric.Textbox(fletter.toUpperCase(),{
                fill:'#ffffff',
                left: 0,
                width: 500,
                textAlign: 'center',
                fontSize: 150,
                top: 170,
                fontWeight: 'bold',
                fontFamily: 'Raleway',
                });
                canvas.add(aname);
                $("#p_pic").val(canvas.toDataURL());
            });
          $(".full_name").keyup();
          $(".company_name").keyup();
      </script>
      <script type="text/javascript">
                    function myfun(){
                    var a=document.getElementById("password").value;
                    var b=document.getElementById("passwordconfirmation").value;
                    if(a==""){
                       document.getElementById("messages").innerHTML="**Please fill password";


                        return false;
                    }
                    else
                    {
                      document.getElementById("messages").innerHTML="";

                    }
                    if(a.length<5){
                       document.getElementById("messages").innerHTML="**Password must be greater";
                         /*alert("password must be greater");*/
                        return false;
                    }
                    else
                    {
                      document.getElementById("messages").innerHTML="";

                    }
                    if(a.length>25){


                        document.getElementById("messages").innerHTML="**Password length must be smaller than 25";
                        return false;
                    }
                    else
                    {
                      document.getElementById("messages").innerHTML="";

                    }
                    if(a!=b){


                        document.getElementById("messages1").innerHTML="**Password must be same";
                        return false;
                    }
                    else
                    {
                      document.getElementById("messages1").innerHTML="";

                    }
                }



</script>

 <div  class="container" style="background: #ecf5f7;">
        <div class="row">
            <div class="col-md-6">
                <img src="img/freelancerHr.jpg" alt="">
            </div>
            <div style = "line-height: 26px;text-align: justify;" class="col-md-6">
                <h5 style = "color: #fec21b;font-size: 19px;">Earn More Money</h5>
                <h2 style = "text-align: left;font-size: 22px;colour:black;">Be a Strong HR Bridge as Freelance Recruiter</h2>
                <p style = "line-height: 26px;text-align: justify;color:black;">The seamless digitalization aided by simple communication tools has revolutionized the way people work and execute tasks. How could recruitment, hiring or talent acquisition professionals miss the dynamism of digital revolution? Freelance recruiters are smartly leveraging the potential of digital assets, especially social networks and making a meaningful contribution in terms of helping companies hire suitable talents smoothly at a very competitive cost. If you want to be a strong bridge between companies and aspirants then Innerwork, a renowned HR Service provider in India, could help you explore opportunities as a freelance recruiter and shine like a bright star in the HR space.</p>

            </div>
        </div>
        <div  class="row aboutContent" id="testID">
                <p style = "line-height: 26px;text-align: justify; color:black;">If you are passionate about human resource management and have requisite skills to identify, filter, engage and attract suitable talents for companies, then you can make good money working as a freelance recruiter. If you love freedom, flexibility and want to experiment with some new recruitment ideas, then freelance recruitment is the best possible option for you. The recruitment scene is changing fast as companies are looking for specialized and customized recruitment solutions to find the best talent quickly and smoothly. The process is simple; companies engage you as a freelance recruiter to hire quality talent leveraging your internal and external network potential and pay you some percentage of the package. </p>
                <br/>
                <p style = "line-height: 26px;text-align: justify;color:black;">All you need is the passion for engaging with talents and helping companies find the best talents at a very competitive cost. As an HR professional, you know it that your communication skills-- verbal, written, & body language, is your strength, so you have to learn the art of neo-world virtual engagement. If you feel you need some insights on a dynamic shift happening in the recruitment space and some additional skills to be a perfect freelance recruiter, then Innerwork is the right place for you. </p>
                <br/>
                <p style = "line-height: 26px;text-align: justify;color:black;">Freedom and flexibility are there for you, but it doesn’t mean you have the liberty to be irresponsible. You have to set your career goals and be ready with the execution plan according to your time and resource involvements. Highly experience HR professional of Innerwork has trained hundreds of aspirants to explore the opportunity and earn handsome money on a regular basis. There is no doubt, like several others, you can also make 5-figure earning and live the best lifestyle. Recruitment is all about passion, potential, and people, so be ready to be a top-class freelance recruiter. </p>
                <br/>
                <p style = "line-height: 26px;text-align: justify;color:black;text-align: left;font-size: 22px;">Be the Part of Freelance Revolution</p>
                <p style = "line-height: 26px;text-align: justify;color:black;">The traditional 9-to-5 working is already a matter of past as freelancing has opened a vast pool of easily available and cost-effective talents for companies. The fluid workforce is the reality of workstations as people modern are looking for the right work-life balance. Several studies have shown that people working free of tension are delivering better results and are happier than their 9-5 counterparts. You could also be part of this revolution as a freelance recruiter and spread your wings to enjoy freedom and flexibility. Innerwork could help you hone your skills required to be a successful freelance recruiter.</p>
                <br/>
                <p style = "line-height: 26px;text-align: justify;color:black;text-align: left;font-size: 22px;">Innovative Approach </p>
                <p style = "line-height: 26px;text-align: justify;color:black;">The neo-workforce is different as their aspirations are not traditional, so the recruitment style also needs an innovative approach of engaging with suitable talents. The HR professionals of Innerwork could help you master the art of filtering, engaging and offering in the most innovative way for higher conversion rates and higher earnings in less time.    </p>
                <br/>
                <p style = "line-height: 26px;text-align: justify;color:black;text-align: left;font-size: 22px;">Affordability</p>
                <p style = "line-height: 26px;text-align: justify;color:black;">Companies hire a freelancer recruiter in the hope of getting better deals as compared to engaging an HR firm for hiring talents. You have to be very balanced in your offering so that it could be winsome game for the company, candidate, and of course you. </p>
                <br/>
                <p style = "line-height: 26px;text-align: justify;color:black;text-align: left;font-size: 22px;">Expertise and Experience</p>
                <p style = "line-height: 26px;text-align: justify;color:black;">The highly diversified pool of workforce requires a specialized recruitment process and companies are not in a position to hire full-time HR professionals to fill specialized vacancies. You, as a specialized freelance recruiter, could fill the gap and earn good money. You have to find your niche and position yourself accordingly to get quality deals. </p>
                <br/>
                <p style = "line-height: 26px;text-align: justify;color:black;text-align: left;font-size: 22px;">Advanced Skills</p>
                <p style = "line-height: 26px;text-align: justify;;color:black;">Your core skill as an HR professional isn’t enough in this dynamic job space. You have to learn advance tech-driven multi-faceted communication and task management skills to improve operational efficiency. Innerwork will help you learn all advance tools to improve your work efficiency. </p>
                <br/>
                <p style = "line-height: 26px;text-align: justify;color:black;text-align: left;font-size: 22px;">Art to Market </p>
                <p style = "line-height: 26px;text-align: justify;color:black;">You might be the best in the league of recruiters, but you have to make it known companies in search of quality HR professionals. In this era of networking, you have to be really a smart marketer to improve your visibility through engaging content. Innerwork professionals will help you position yourself through social media and specialized blogger.  </p>
                <br/>
                <p style = "line-height: 26px;text-align: justify;color:black;text-align: left;font-size: 22px;">Flexibility & Freedom </p>
                <p style = "line-height: 26px;text-align: justify;color:black;">Freelancing is all about freedom and flexibility. As a freelance recruiter, you have to maintain a perfect balance of freedom and responsibility to be a result-oriented and trustworthy HR professional. You have to learn the art of work-life balance for optimum operational efficiency a little above the client’s expectation.  </p>
                <br/>
                <p style = "line-height: 26px;text-align: justify;color:black;text-align: left;font-size: 22px;">Global Reach </p>
                <p style = "line-height: 26px;text-align: justify;color:black;">As a freelance recruiter, your market is global, so you need to be ready to meet the expectation of global clients. Innerwork experts will train you to handle some of the biggest job markets of the world and equip you with requisite skills to execute recruitments smoothly. In simple terms, better packages mean better earning.</p>
                <br/>
        </div>
    </div>
    <script>
        $(document).ready(function() {

    /* Count of paragraphs shown */
    var cutCount = 1;

    $("#testID p").each(function (i) {
        i++;
        if(i == cutCount) {
            $(this).append(' <a href="javascript:void(1)" onclick="$(\'#testID p\').show(); $(this).hide()">Read more</b>')
        }
        if(i > cutCount) {
           $(this).hide();
        }
    });

});




    </script>
<?php include_once 'Footer.php'; ?>
    </body>

</html>

<script type="text/javascript" src="JQuery.js"></script>
<script type="text/javascript">

        function checkunique(){

        var email=$('#email').val();
        $.ajax({

            url:"checkforunique.php",
            type:"POST",
            async:false,
            data:{
                "unique":1,
                "email":email
            },
            success:function(data){

                if(data=="1"){

                    $("#insert").click();
                }
                else{
                    alert("Email already exists");
                }
            }
        });
    }
</script>
