<?php

class Query
{
	private $_pdo;
	private static $instance;


	private function __clone(){}
	private function __construct()
	{
		$this->_pdo = $this->connect_db("MVC_Rush");
	}


	public static function getInstance()
	{
		if(!isset(self::$instance))
		{
			self::$instance = new self();
		}
		return(self::$instance);
	}


	public function SQLquery($query, $variable = array())
	{
		$res = $this->_pdo->prepare($query);
		$check = $res->execute($variable);
		$result = $res->fetchAll();
		if($check)
		{
			return($result);
		}
		else
		{
			return(-1);
		}
	}


	private function connect_db($db = FALSE, $host = "localhost", $username = "root", $password = "root", $port = FALSE)
	{
			$pdo = new PDO("mysql:host=".$host.";dbname=".$db, $username, $password);
			return($pdo);
	}
}
?>