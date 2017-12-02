<?php

	class My_PDO extends PDO
	{
		const ERROR_LOG_FILE = "/home/yann/Rendu/pool_php_d08/ex_09/error.log";
	}


//Try to connect to a DB. If failed, throw an exception, and write it in a file.
//By default, it will try to connect to a local server.
function connect_db($db = FALSE, $host = "localhost", $username = "root", $password = "root", $port = FALSE)
{
	try
	{
		if(!$port && $db)
		{
			$pdo = new My_PDO("mysql:host=".$host.";dbname=".$db, $username, $password);
			echo "Connection to DB successful\n";
		}
		elseif($db)
		{
			$pdo = new My_PDO("mysql:host=".$host."::".$port.";dbname=".$db, $username, $password);
			echo "Connection to DB successful\n";
		}
		else
		{
			echo "Bad params! Usage: php add_user.php login password password_conf role\n";
			exit();
		}
		return($pdo);
	}
	catch(Exception $e)
	{
		
		echo ("Error connection to DB\n");
		error_log($e->getMessage()."\n",3,My_PDO::ERROR_LOG_FILE);
		exit();
	}
}
?>