<?php

    class DbConnect {
        private $serverName = "localhost";
        private $userName = "innerwor_innerwork";
        private $password = "0703#InnerW@";        
        
        public function connect(){
            try{
                $conn = new PDO("mysql:host=".$this->serverName.";dbname=innerwor_innerwork", $this->userName, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
                //echo "Connection OK!";
            }
            catch(PDOException $e)
            {
                echo "Something Went Wrong With Database Please Refresh page & Try Again\n";
                echo $e->getMessage();
            }
        }
    }
?>