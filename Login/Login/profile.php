<?php
session_start();
$emails=$_SESSION['email'];
$con=mysqli_connect('localhost','innerwor_login','a0303#1998k','innerwor_login');
$query=mysqli_query($con,"select * from profile where email='$emails'");
$num=mysqli_num_rows($query);
 while($ar=mysqli_fetch_array($query)){
        $id=$ar['id'];
        $companyName=$ar['companyName'];
        $website=$ar['website'];
        $contactPerson=$ar['contactPerson'];
        $companyAddress=$ar['companyAddress'];
        $city=$ar['city'];
        $mobile=$ar['mobile'];
        $email=$ar['email'];
        $state=$ar['state'];
        $code=$ar['code'];
        $business=$ar['business'];
        $experience=$ar['experience'];
        $key1=$ar['key1'];
        $key2=$ar['key2'];
        $img = $ar['image'];
        $_SESSION['states']=$state;
        $_SESSION['businesss']=$business;
        $_SESSION['experiences']=$experience;
        $_SESSION['img']=$img;
 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link  rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="container">


        <div class="leftbox">
            <div>
                <img src="image/logo.png" alt="img" height="60px" width="70px" >
                <a href="#">Dashboard</a>
                <a href="profile.php">My Profile</a>
            </div>
        </div>



        <div class="rightbox">
            <div class="divtop">
                <div>
                    <span>Profile</span>
                    <span><?php echo $companyName; ?></span>
                </div>
                <section>
                    <h1>Hello</h1>
                    <h1><?php echo $contactPerson;?></h1>
                </section>    
            </div>
            <form action="backendprofile.php" method="post" enctype="multipart/form-data">
            <div class="divbottom">
                <div class="bottomchild">
                    <h3>My account</h3>
                    <div class="div-nav1">
                        <div class="div-na1">
                            <div>
                                <img src="<?php  echo $img; ?>"  alt="p" height="50px" width="60px"><br>
                                <label class="custom">
                                <input type="file" id="file" name="myFile">
                                Choose File
                                </label>
                                
                            </div>
                        </div>    
                        <div class="div-na2">
                            <span>Company Name*</span><br>
                            <input type="text" value="<?php echo $companyName; ?>" name="companyName" placeholder="Enter Company Name"><br>
                            <span>Website*</span><br>
                            <input type="text" value="<?php echo $website; ?>" name="website" placeholder="Enter Website"><br>
                        </div>
                    </div>


                    <div class="div-nav2">
                            <div class="div-nb1">
                                <span>Contact Person*</span><br>
                                <input type="text" value="<?php echo $contactPerson; ?>" name="contactPerson" placeholder="Enter Name"><br>
                                <span>Company Address*</span><br>
                                <input type="text" value="<?php echo $companyAddress; ?>" name="companyAddress" placeholder="Enter Address"><br>
                                <span>City*</span><br>
                                <input type="text" value="<?php echo $city; ?>" name="city" placeholder="Enter City"><br>
                                <span>Specialist Sector*</span><br>
                                <div>
                                    <input type="checkbox" name="Other" value="Other" id=""><span>Other</span><br>
                                    <input type="checkbox" name="JavaTech" value="JavaTech" id=""><span>JavaTech</span><br>
                                    <input type="checkbox" name="PhpTech" value="PhpTech" id=""><span>PhpTech</span><br>
                                    <input type="checkbox" name="HtmlTech" value="HtmlTech" id=""><span>HtmlTech</span><br>
                                    <input type="checkbox" name="JsTech" value="JsTech" id=""><span>JsTech</span><br>
                                    <input type="checkbox" name="PythonTech" value="PythonTech" id=""><span>PythonTech</span><br>
                                    <input type="checkbox" name="ItTech" value="ItTech" id=""><span>ItTech</span><br>
                                </div>

                            </div>
                            <div class="div-nb2">
                                <span>Mobile*</span><br>
                                <input type="text" value="<?php echo $mobile; ?>" name="mobile" placeholder="Enter Number"><br>
                                <span>State*</span><br>
                                <select name="state" >
                                    <option value><?php if($state != ""){echo $state;}else{echo "Select State";} ?></option>
                                    <option value="Chennai">Chennai</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Mumbai">Mumbai</option>
                                    <option value="Kolkata">Kolkata</option>
                                </select><br>
                                <span>Postal Code*</span><br>
                                <input type="text" name="code" value="<?php echo $code;?>"><br>
                                <span>Nature of Business*</span><br>
                                <select name="business" id="">
                                    <option value><?php if($state != ""){echo $business;}else{echo "Select Business";} ?></option>
                                    <option value="Telecom">Telecom</option>
                                    <option value="Itcompany">Itcompany</option>
                                    <option value="Rawmaterial">Rawmaterial</option>
                                </select><br>
                                <span>Experience*</span><br>
                                <select name="experience">
                                    <option value><?php if($state != ""){echo $experience;}else{echo "Select Experience";} ?></option>
                                    <option value="1year">1 year</option>
                                    <option value="2years">2 years</option>
                                    <option value="3years">3 years</option>
                                </select><br>
                            </div> 
                    </div>
                    <div class="div-nav3">
                        <span>Keywords*</span><br>
                        <input type="text" name="key1" value="<?php echo $key1; ?>" placeholder="Enter Php,Java"><br>
                        <input type="text" name="key2" value="<?php echo $key2; ?>" placeholder="Enter Html,Css"><br>
                        <label>eg.IT,non IT, HR etc</label><br>
                        <span>Abou Us*</span><br>
                        <textarea placeholder="Eg.- We are consultancy based in Bangalore. We have more than 10+ years of experience in the field of recruitment and have 20+ recruiters in our company..We have recruited for various companies in both IT and NON-IT domains. We are specialized in bulk hiring and IT hiring." name="" id="" cols="30" rows="10"></textarea>
                       <div> <input type="submit" value="Update Profile" name="submit"></div>
                   </div>



                </div>
                
            </div>
            
            </form>
            <div style=" background:rgb(242, 244, 245);padding:30px;text-align:center; color:rgb(87, 85, 85);font-size:14px;">
                <span>© 2019 - We are running Beta Version - <a href="#" class="lasta">InnerWork</a></span>
            </div>
            
        </div>
        
        


    </div>
    <script>
        var file=document.getElementById("file");
    </script>
</body>
</html>