<?php 
	class Api extends Rest {
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
		        $this->returnResponse(INVALID_USER_PASS, "No such email exists!");
		    }
		    
		    $stmt = $this->dbConn->prepare("SELECT * FROM app_users WHERE email = :email AND password = :password");
		    $stmt->bindParam(":email", $email);
		    $stmt->bindParam(":password", $password);
		    $stmt->execute();
		    $user = $stmt->fetch(PDO::FETCH_ASSOC);
		    if(!is_array($user)){
		        $this->returnResponse(INVALID_USER_PASS, ["message" => "Password is incorrect."]);
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
		    
		    $data = ['userId' => $user['id'], 'token' => $token];
		    $this->returnResponse(SUCCESS_RESPONSE, $data);
		    } catch(Exception $e){
		        $this->throwError(JWT_PROCESSING_ERROR, $e->getMessage());
		    }
		    
		}
		
		public function signUpUser(){
		    $name = $this->validateParameters('name', $this->param['name'], STRING);
		    $email = $this->validateParameters('email', $this->param['email'], STRING);
		    $phone = $this->validateParameters('phone', $this->param['phone'], INTEGER);
		    $password = $this->validateParameters('password', $this->param['password'], STRING);
		    $location = $this->validateParameters('location', $this->param['location'], STRING);
		    $isIntern = $this->validateParameters('isIntern', $this->param['isIntern'], INTEGER);
		    $isJob = $this->validateParameters('isJob', $this->param['isJob'], INTEGER);
		    
		    try{
		        $stmt = $this->dbConn->prepare("SELECT * FROM app_users WHERE email = :email");
		        $stmt->bindParam(":email", $email);
		        $stmt->execute();
		        $user = $stmt->fetch(PDO::FETCH_ASSOC);
		        if(is_array($user)){
		            //if($user['isIntern']==$isIntern || $user['isJob']==$isJob)
		                $this->returnResponse(USER_COLLISION, "A user with the same credentials already exists.");
		        }
		    
		        $stmt = $this->dbConn->prepare("INSERT INTO app_users (name, email, phone, password, location, isIntern, isJob)
		        VALUES (:name, :email, :phone, :password, :location, :isIntern, :isJob)");
		        $stmt->bindParam(":name", $name);
		        $stmt->bindParam(":email", $email);
		        $stmt->bindParam(":phone", $phone);
		        $stmt->bindParam(":password", $password);
		        $stmt->bindParam(":location", $location);
		        $stmt->bindParam(":isIntern", $isIntern);
		        $stmt->bindParam(":isJob", $isJob);
		        
		        $stmt->execute();
		        
		        $data = ['message' => "User registered successfully!"];
		        $this->returnResponse(SUCCESS_RESPONSE, $data);
		    } catch(Exception $e){
		        $this->throwError(JWT_PROCESSING_ERROR, $e->getMessage());
		    }
		}
	}
?>