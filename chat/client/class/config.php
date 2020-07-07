<?php


class config{

	public $pdo ;
	
			
	public function db(){
		$this->pdo = new PDO('mysql:host=localhost;dbname=chatlive;charset=utf8mb4','root','');
		return $this->pdo;
	}

}



?>