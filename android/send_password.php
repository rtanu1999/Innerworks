<?php
    require_once('functions.php');
    require("PHPMailerAutoload.php");
    class ApiSendPassword extends Rest{
        public $dbConn;
		public function __construct(){
			parent::__construct();
			$db = new DbConnect;
			$this->dbConn = $db->connect();
		}
		
		public function sendPassword(){
            $email = $this->validateParameters('email', $this->param['email'], STRING);
            
            try{
                $stmt = $this->dbConn->prepare("SELECT * FROM app_users WHERE email = :email");
		        $stmt->bindParam(":email", $email);
		        $stmt->execute();
		        $user = $stmt->fetch(PDO::FETCH_ASSOC);
		        if(!is_array($user)){
		            $this->returnResponse(INVALID_USER_PASS, ["code" => INVALID_USER_PASS, "message" => "The given email ID is not registered."]);
		        }
		        
		        $email_to = "mahapatraakash@gmail.com";
		        //$email_to = $email;
		        $password = $user['password'];
		        $subject = "Password for Innerwork India app";
                $body ='<p>Hi '.$email.'!</p>';
                $body .='<p>The password for your Innerwork India account is <b>'.$password.'</b>.</p>';
                $body.='<p>Please use this password to log in to your account.';
 
                $email_from = "noreply@innerworkindia.com"; // Enter Sender Email
                $sender_name = "Innerwork Solutions Pvt. Ltd"; // Enter Sender Name
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->Host = "mail.innerworkindia.com"; // Enter Your Host/Mail Server
                $mail->SMTPAuth = true;
                $mail->Username = "noreply@innerworkindia.com"; // Enter Sender Email
                $mail->Password = "Admin@noreply";
                $mail->Port = 25;
                $mail->IsHTML(true);
                $mail->From = $email_from;
                $mail->FromName = $sender_name;
                $mail->Sender = $email_from; // indicates ReturnPath header
                $mail->AddReplyTo($email_from, "No Reply"); // indicates ReplyTo headers
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->AddAddress($email_to);
                if (!$mail->Send()){
                    $this->throwError(EMAIL_SENDING_ERROR, ["code" => EMAIL_SENDING_ERROR, "message" => "Error sending email to account. ".$mail->ErrorInfo]);
                }
		        $data = ["code" => SUCCESS_RESPONSE, "message" => "Password sent successfully to your email."];
		        $this->returnResponse(SUCCESS_RESPONSE, $data);
            } catch(Exception $e){
                $this->throwError(JWT_PROCESSING_ERROR, $e->getMessage());
            }
		    
		}
    }
    
    $api_send = new ApiSendPassword;
    $api_send->sendPassword();
?>