<?php
$result = $companyName = $companyAddress = $contactPerson = $emailAddress = $lookingService = $jobDescription = $mySkills = $experiencedRequired = $education = $salary = "";
$lookingService = $_GET['lookingService'];
if($lookingService == "1") {
    if (isset($_GET['companyName']) && !empty($_GET['companyName'])) {
        if (isset($_GET['companyAddress']) && !empty($_GET['companyAddress'])) {
            if (isset($_GET['contactPerson']) && !empty($_GET['contactPerson'])) {
                if (isset($_GET['emailAddress']) && !empty($_GET['emailAddress'])) {
                    if (isset($_GET['jobDescription']) && !empty($_GET['jobDescription'])) {
                        if (isset($_GET['mySkills']) && !empty($_GET['mySkills'])) {
                            if (isset($_GET['experiencedRequired']) && !empty($_GET['experiencedRequired'])) {
                                if (isset($_GET['education']) && !empty($_GET['education'])) {
                                    if (isset($_GET['salary']) && !empty($_GET['salary'])) {

                                        $companyName = $_GET['companyName'];
                                        $companyAddress = $_GET['companyAddress'];
                                        $contactPerson = $_GET['contactPerson'];
                                        $emailAddress = $_GET['emailAddress'];
                                        $jobDescription = $_GET['jobDescription'];
                                        $mySkills = $_GET['mySkills'];
                                        $experiencedRequired = $_GET['experiencedRequired'];
                                        $education = $_GET['education'];
                                        $salary = $_GET['salary'];

                                        $mailSending = "manoli.sam@bootestech.in";
                                        $body = "Dear Vision Services," . "<br/>" . "Please check below details anyone try to contacting you as EMPLOYER." . "<br/><br/>";
                                        $body .= "Company Name : " . $companyName . "<br/>";
                                        $body .= "Company Address : " . $companyAddress . "<br/>";
                                        $body .= "Contact Person : " . $contactPerson . "<br/>";
                                        $body .= "Email Address : " . $emailAddress. "<br/>";;
                                        $body .= "Job Description : " . $jobDescription. "<br/>";;
                                        $body .= "Required Skills : " . $mySkills. "<br/>";;
                                        $body .= "Required Experience : " . $experiencedRequired. "<br/>";;
                                        $body .= "Education : " . $education. "<br/>";;
                                        $body .= "Salary : " . $salary. "<br/>";;


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

echo $result;

?>
