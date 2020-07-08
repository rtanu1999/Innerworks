<?php


class config{

	public $pdo ;


	public function db(){
		$this->pdo = new PDO('mysql:host=localhost;dbname=innerwor_chatlive;charset=utf8mb4','innerwor_innerwork','0703#InnerW@');
		return $this->pdo;
	}

}



?>
