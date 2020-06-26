<?php
    require_once('functions.php');
    class ApiLogIn extends Rest{
        public $dbConn;
		public function __construct(){
			parent::__construct();
			$db = new DbConnect;
			$this->dbConn = $db->connect();
		}
        
        public function logInUser(){
		    $email = $this->validateParameters('email', $this->param['email'], STRING);
		    $password = $this->validateParameters('password', $this->param['password'], STRING);
		    
		    try{
		    $stmt = $this->dbConn->prepare("SELECT * FROM app_users WHERE email = :email");
		    $stmt->bindParam(":email", $email);
		    $stmt->execute();
		    $user = $stmt->fetch(PDO::FETCH_ASSOC);
		    if(!is_array($user)){
		        $this->returnResponse(INVALID_USER_PASS, ["code" => INVALID_USER_PASS, "message" => "The given email ID is not registered."]);
		    }
		    
		    $stmt = $this->dbConn->prepare("SELECT * FROM app_users WHERE email = :email AND password = :password");
		    $stmt->bindParam(":email", $email);
		    $stmt->bindParam(":password", $password);
		    $stmt->execute();
		    $user = $stmt->fetch(PDO::FETCH_ASSOC);
		    if(!is_array($user)){
		        $this->returnResponse(INVALID_USER_PASS, ["code" => INVALID_USER_PASS, "message" => "Password is incorrect."]);
		    }
		     
		    /*if($user['active'] == 0){
		        $this->returnResponse(USER_NOT_ACTIVE, "User is not active. Please contact the administrator.");
		    }*/
		    
		    $payload = [
		        'iat' => time(),
		        'iss' => 'localhost',
		        'exp' => time() + (60),
		        'userId' => $user['id']
		    ];
		    $token = JWT::encode($payload, SECRETE_KEY);
		    
		    $data = ["code" => SUCCESS_RESPONSE, "message" => "Login Successful", 'userId' => $user['id'], 'token' => $token];
		    $this->returnResponse(SUCCESS_RESPONSE, $data);
		    } catch(Exception $e){
		        $this->throwError(JWT_PROCESSING_ERROR, $e->getMessage());
		    }
		    
		}
    }
    
    $api_login = new ApiLogIn;
    $api_login->logInUser();
?>