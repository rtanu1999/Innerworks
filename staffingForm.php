<?php
$result = $companyName = $companyAddress = $contactPerson = $emailAddress = $lookingService = $jobDescription = $keySkills = $experienceRequired = $educationRequired = $currentSalary = $expectedSalary = $noticePeriod = $location = $facility = "";
$lookingService = $_GET['lookingService'];
if($lookingService == "2") {
    if (isset($_GET['companyName']) && !empty($_GET['companyName'])) {
        if (isset($_GET['companyAddress']) && !empty($_GET['companyAddress'])) {
            if (isset($_GET['contactPerson']) && !empty($_GET['contactPerson'])) {
                if (isset($_GET['emailAddress']) && !empty($_GET['emailAddress'])) {
                    if (isset($_GET['jobDescription']) && !empty($_GET['jobDescription'])) {
                        if (isset($_GET['keySkills']) && !empty($_GET['keySkills'])) {
                            if (isset($_GET['experiencedRequired']) && !empty($_GET['experiencedRequired'])) {
                                if (isset($_GET['$educationRequired']) && !empty($_GET['educationRequired'])) {
                                    if (isset($_GET['currentSalary']) && !empty($_GET['currentSalary'])) {
                                        if (isset($_GET['expectedSalary']) && !empty($_GET['expectedSalary'])) {
                                            if (isset($_GET['noticePeriod']) && !empty($_GET['noticePeriod'])) {
                                                if (isset($_GET['location']) && !empty($_GET['location'])) {
                                                    if (isset($_GET['facility']) && !empty($_GET['facility'])) {

                                                        $companyName = $_GET['companyName'];
                                                        $companyAddress = $_GET['companyAddress'];
                                                        $contactPerson = $_GET['contactPerson'];
                                                        $emailAddress = $_GET['emailAddress'];
                                                        $jobDescription = $_GET['jobDescription'];
                                                        $keySkills = $_GET['keySkills'];
                                                        $experienceRequired = $_GET['experiencedRequired'];
                                                        $educationRequired = $_GET['educationRequired'];
                                                        $currentSalary = $_GET['currentSalary'];
                                                        $expectedSalary = $_GET['expectedSalary'];
                                                        $noticePeriod = $_GET['noticePeriod'];
                                                        $location = $_GET['location'];
                                                        $facility = $_GET['facility'];

                                                        $mailSending = "manoli.sam@bootestech.in";
                                                        $body = "Dear Vision Services," . "<br/>" . "Please check below details anyone try to contacting you as EMPLOYER." . "<br/><br/>";
                                                        $body .= "Company Name : " . $companyName . "<br/>";
                                                        $body .= "Company Address : " . $companyAddress . "<br/>";
                                                        $body .= "Contact Person : " . $contactPerson . "<br/>";
                                                        $body .= "Email Address : " . $emailAddress . "<br/>";;
                                                        $body .= "Job Description : " . $jobDescription . "<br/>";;
                                                        $body .= "Required Skills : " . $mySkills . "<br/>";;
                                                        $body .= "Required Experience : " . $experiencedRequired . "<br/>";;
                                                        $body .= "Education : " . $education . "<br/>";;
                                                        $body .= "Salary : " . $salary . "<br/>";;


                                                        require 'PHPMailer/PHPMailerAutoload.php';
                                                        require_once('PHPMailer/class.phpmailer.php');
                                                        require_once('PHPMailer/class.smtp.php');

                                                        $mail = new PHPMailer();
                                                        $mail->IsSMTP();
                                                        $mail->Host = "mail.bootestech.in";
                                                        $mail->Port = 465;
                                                        $mail->SMTPSecure = 'ssl';
                                                        $mail->SMTPAuth = true;
                                                        $mail->Username = "response@bootestech.in";
                                                        $mail->Password = "123@Response";

                                                        $mail->From = "response@bootestech.in";
                                                        $mail->FromName = "Website Response";
                                                        $mail->AddAddress($mailSending);

                                                        $mail->IsHTML(true);                                  // set email format to HTML

                                                        $mail->Subject = "Enquiry as EMPLOYER -- " . $_SERVER['REMOTE_ADDR'];
                                                        $mail->Body = $body;
                                                        $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

                                                        if (!$mail->Send()) {
                                                            $result = "Something Went Wrong";
                                                            exit;
                                                        }
                                                        $result = "Thanks For Contacting Us.";

                                                    } else {
                                                        $result = "Please Enter Salary";
                                                    }
                                                } else {
                                                    $result = "Please Enter Education Details";
                                                }
                                            } else {
                                                $result = "Please Enter Required Experience";
                                            }
                                        } else {
                                            $result = "Please Enter Skills";
                                        }
                                    } else {
                                        $result = "Please Enter Job Description";
                                    }
                                } else {
                                    $result = "Please Enter Email Address";
                                }
                            } else {
                                $result = "Please Enter Contact Person Name";
                            }
                        } else {
                            $result = "Please Enter Company Address";
                        }
                    } else {
                        $result = "Please Enter Company Name";
                    }
                }
            }
        }
    }
}
echo $result;
