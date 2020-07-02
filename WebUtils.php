<?php
class WebUtils
{
    public function userWelcomeMailToJobPost($userName, $userEmail, $mail)
    {
        try{

            $mailSending = $userEmail;
            $body = "Hello ".$userName.", ". "<br/>". " Welcome to Innerwork and thanks for Job Post our admin will contact you soon." .  "<br/>";
            $body .= "Kindly contact us for any further query at +91 9487980784 or info@innerworkindia.com Visit us: www.innerworkindia.com";

            $mail->IsSMTP();
            $mail->Host = "mail.innerworkindia.com";
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->Username = "response@innerworkindia.com";
            $mail->Password = "Digital@inner#123";

            $mail->From = "response@innerworkindia.com";
            $mail->FromName = "Innerwork Solutions";
            $mail->AddAddress($mailSending);

            $mail->IsHTML(true);                                  // set email format to HTML

            $mail->Subject = "Thanks For Job Post on Innerwork";
            $mail->Body    = $body;
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

            if(!$mail->Send())
            {
                return false;
            }
            else
            {
                return true;
            }

        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function adminMailToJobPost1($userName, $userNumber, $userEmail, $userCompanyName, $jobTitle, $mail)
    {
        try{

            //$mailSending = "info@innerworkindia.com";
            $mailSending = "hr@innerworkindia.com";
            $body = "Dear Innerwork," . "<br/>" . "Please check below details, anyone post a new JOB." . "<br/><br/>" . "Customer Name : " . $userName . "<br/>" . "Phone Number : " . $userNumber . "<br/>" . "Email Address : " . $userEmail . "<br/>" . "Company Name : " . $userCompanyName . "<br/>" . "Job Title : " . $jobTitle;

            $mail->IsSMTP();
            $mail->Host = "mail.innerworkindia.com";
            $mail->Port = 465; // 465
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->Username = "response@innerworkindia.com";
            $mail->Password = "Digital@inner#123";

            $mail->From = "response@innerworkindia.com";
            $mail->FromName = "Innerwork Solutions";
            $mail->AddAddress($mailSending);

            $mail->IsHTML(true);                                  // set email format to HTML

            $mail->Subject = "Enquiry From Website - Job Post";
            $mail->Body    = $body;
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

            if(!$mail->Send())
            {
                return false;
            }
            else
            {
                return true;
            }

        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    public function adminMailToJobPost2($userName, $userNumber, $userEmail, $userCompanyName, $jobTitle, $mail)
    {
        try{

          //  $mailSending = "info@innerworkindia.com";
            $mailSending = "internship@innerworkindia.com";
            $body = "Dear Innerwork," . "<br/>" . "Please check below details, anyone post a new JOB." . "<br/><br/>" . "Customer Name : " . $userName . "<br/>" . "Phone Number : " . $userNumber . "<br/>" . "Email Address : " . $userEmail . "<br/>" . "Company Name : " . $userCompanyName . "<br/>" . "Job Title : " . $jobTitle;

            $mail->IsSMTP();
            $mail->Host = "mail.innerworkindia.com";
            $mail->Port = 465; // 465
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->Username = "response@innerworkindia.com";
            $mail->Password = "Digital@inner#123";

            $mail->From = "response@innerworkindia.com";
            $mail->FromName = "Innerwork Solutions";
            $mail->AddAddress($mailSending);

            $mail->IsHTML(true);                                  // set email format to HTML

            $mail->Subject = "Enquiry From Website - Job Post";
            $mail->Body    = $body;
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

            if(!$mail->Send())
            {
                return false;
            }
            else
            {
                return true;
            }

        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function adminMailToJobSeeker2($mail, $userName, $contactNumber, $userEmail, $userCity, $education)
    {
        try{

            $mailSending = "internship@innerworkindia.com";
            $body = "Dear Innerwork," . "<br/>" . "Please check below details of new Job Seeker." . "<br/><br/>" . "Name : " . $userName . "<br/>" . "Phone Number : " . $contactNumber . "<br/>" . "Email Address : " . $userEmail . "<br/>" . "City : " . $userCity . "<br/>" . "Education : " . $education;

            $mail->IsSMTP();
            $mail->Host = "mail.innerworkindia.com";
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->Username = "response@innerworkindia.com";
            $mail->Password = "Digital@inner#123";

            $mail->From = "response@innerworkindia.com";
            $mail->FromName = "Innerwork Solutions";
            $mail->AddAddress($mailSending);

            $mail->IsHTML(true);                                  // set email format to HTML

            $mail->Subject = "Enquiry From Website - Job Seeker";
            $mail->Body    = $body;
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

            if(!$mail->Send())
            {
                return false;
            }
            else
            {
                return true;
            }

        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }


    public function adminMailToJobSeeker1($mail, $userName, $contactNumber, $userEmail, $userCity, $education)
    {
        try{

            $mailSending = "hr@innerworkindia.com";
            $body = "Dear Innerwork," . "<br/>" . "Please check below details of new Job Seeker." . "<br/><br/>" . "Name : " . $userName . "<br/>" . "Phone Number : " . $contactNumber . "<br/>" . "Email Address : " . $userEmail . "<br/>" . "City : " . $userCity . "<br/>" . "Education : " . $education;

            $mail->IsSMTP();
            $mail->Host = "mail.innerworkindia.com";
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->Username = "response@innerworkindia.com";
            $mail->Password = "Digital@inner#123";

            $mail->From = "response@innerworkindia.com";
            $mail->FromName = "Innerwork Solutions";
            $mail->AddAddress($mailSending);

            $mail->IsHTML(true);                                  // set email format to HTML

            $mail->Subject = "Enquiry From Website - Job Seeker";
            $mail->Body    = $body;
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

            if(!$mail->Send())
            {
                return false;
            }
            else
            {
                return true;
            }

        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function userMailToJobSeeker($mail, $userName, $userEmail)
    {
        try{
            $mailSending = $userEmail;
            $body = "Dear ".$userName."," . "<br/>" . "Welcome to Innerwork and thanks for Submit your details our admin will contact you soon.";

            $mail->IsSMTP();
            $mail->Host = "mail.innerworkindia.com";
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->Username = "response@innerworkindia.com";
            $mail->Password = "Digital@inner#123";

            $mail->From = "response@innerworkindia.com";
            $mail->FromName = "Innerwork Solutions";
            $mail->AddAddress($mailSending);

            $mail->IsHTML(true);                                  // set email format to HTML

            $mail->Subject = "Welcome to Innerwork";
            $mail->Body    = $body;
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

            if(!$mail->Send())
            {
                return false;
            }
            else
            {
                return true;
            }

        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function userContactForm($mail, $userName, $userEmail)
    {
        try{
            $mailSending = $userEmail;
            $body = "Dear ".$userName."," . "<br/>" . "Welcome to Innerwork and thanks for Submit your details our admin will contact you soon.";

            $mail->IsSMTP();
            $mail->Host = "mail.innerworkindia.com";
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->Username = "response@innerworkindia.com";
            $mail->Password = "Digital@inner#123";

            $mail->From = "response@innerworkindia.com";
            $mail->FromName = "Innerwork Solutions";
            $mail->AddAddress($mailSending);

            $mail->IsHTML(true);                                  // set email format to HTML

            $mail->Subject = "Welcome to Innerwork";
            $mail->Body    = $body;
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

            if(!$mail->Send())
            {
                return false;
            }
            else
            {
                return true;
            }

        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function adminContactForm($mail, $userName, $phone, $email, $msg)
    {
        try{
            $mailSending = "info@innerworkindia.com";
            $body = "Dear Innerwork," . "<br/>" . "Please check below details anyone try to contacting you." . "<br/><br/>" . "Name : " . $userName . "<br/>" . "Phone Number : " . $phone . "<br/>" . "Email Address : " . $email . "<br/>" . "Message : " . $msg;

            $mail->IsSMTP();
            $mail->Host = "mail.innerworkindia.com";
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->Username = "response@innerworkindia.com";
            $mail->Password = "Digital@inner#123";

            $mail->From = "response@innerworkindia.com";
            $mail->FromName = "Innerwork Solutions";
            $mail->AddAddress($mailSending);

            $mail->IsHTML(true);                                  // set email format to HTML

            $mail->Subject = "Enquiry From Website - Contact Form";
            $mail->Body    = $body;
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

            if(!$mail->Send())
            {
                return false;
            }
            else
            {
                return true;
            }

        }
        catch(PDOException $e)
        {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

}
