<?php
	require_once('constants.php');
	require_once('DbConnectionHelper.php');
	class Rest{
		protected $request;
		protected $serviceName;
		protected $param;
		public function __construct(){
			if($_SERVER['REQUEST_METHOD'] !== 'POST') {
				//echo "Method is not post!\n";
				http_response_code(400);
				$this->throwError(REQUEST_METHOD_NOT_VALID, 'Request Method is not valid.');
			}
			$filehandler = fopen("php://input", 'r');
			$this->request = stream_get_contents($filehandler);
			$this->validateRequest();
		}

		public function validateRequest() {
			/*if($_SERVER['CONTENT_TYPE'] !== 'application/json'){
				//http_response_code(101);
				$this->throwError(REQUEST_CONTENTTYPE_NOT_VALID, 'Request content_type not valid.');
			}*/

			$data = json_decode($this->request, true);
			
			/*if(!isset($data['name']) || $data['name'] == ""){
			    $this->throwError(API_NAME_REQUIRED, "API Name is Required");
			}*/
			//$this->serviceName = $data['name'];
			
			/*if(!is_array($data['param'])){
			    $this->throwError(API_PARAM_REQUIRED, "API Param is Required");
			}*/
			if(!is_array($data) || empty($data)==true )
			    $this->throwError(API_PARAM_REQUIRED, "Data is required!");
			    
			//$this->param = $data['param'];
			$this->param = $data;
		}

		/*public function processApi() {
		    $api = new Api;
		    $rMethod = new reflectionMethod('Api', $this->serviceName);
		    if(!method_exists($api, $this->serviceName)){
		        $this->throwError(API_DOES_NOT_EXIST, "API Does Not Exist.");
		    }
            $rMethod->invoke($api);
		}*/

		public function validateParameters($fieldName, $value, $dataType, $required=true) {
			if($required == true && empty($value) == true && !($dataType==INTEGER && $value==0)){
			    $this->throwError(VALIDATE_PARAMETER_REQUIRED, $fieldName. " parameter is required.");
			}
			
			switch($dataType){
			    case BOOLEAN:
			        if(!is_bool($value)){
			            $this->throwError(VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for ".$fieldName.". It should be boolean.");
			        }
			        break;
			    case INTEGER:
			        if(!is_numeric($value)){
			            $this->throwError(VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for ".$fieldName.". It should be numeric.");
			        }
			        break;
			    case STRING:
			        if(!is_string($value)){
			            $this->throwError(VALIDATE_PARAMETER_DATATYPE, "Datatype is not valid for ".$fieldName.". It should be string.");
			        }
			        break;
			}
			
			return $value;
		}

		public function throwError($code, $message){
			header("content-type: application/json");
			$errorMsg = json_encode(['status'=>$code, 'message'=>$message]);
			echo $errorMsg;
			exit;
		}

		public function returnResponse($code, $message) {
            header("content-type: application/json");
            $response = json_encode($message);
            echo $response;
            exit;
		}
	}
?>