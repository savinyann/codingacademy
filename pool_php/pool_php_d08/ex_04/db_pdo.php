<?php

class My_PDO extends PDO
{
	const ERROR_LOG_FILE = "/home/yann/Rendu/pool_php_d08/ex_04/error.log";
}

// Try to connect to a DB. If failed, throw an exception, and write it in a file.
// By default, it will try to connect to a local server, but you have to specify 
// which DB you want to use.
function connect_db($db = FALSE, $host = "localhost", $username = "root", $password = "root", $port = FALSE)
{
	if(!$port && $db)
	{
		$pdo = new My_PDO("mysql:host=".$host.";dbname=".$db, $username, $password);
		echo ($pdo) ? "Connection to DB successful\n" : "";
	}
	elseif($db)
	{
		$pdo = new My_PDO("mysql:host=".$host."::".$port.";dbname=".$db, $username, $password);
		echo ($pdo) ? "Connection to DB successful\n" : "";	
	}
	else
	{
		echo "Error: Not enough parameters to try a connection.\n";
		error_log("Error: Not enough parameters to try a connection.\n",3,My_PDO::ERROR_LOG_FILE);
	}
	return($pdo);
}


if($argc < 6)
	{
		echo "Bad params! Usage: php connect_db.php host username password port db\n";
		//This is not an error, because it does not begin with "error". If you think it is an error, then add the following line:
		//error_log("Bad params! Usage: php connect_db.php host username password port db\n",3,My_PDO::ERROR_LOG_FILE);
		return;
	}
	else
	{
		try
		{
			$gecko = connect_db($argv[5],$argv[1],$argv[2],$argv[3],$argv[4]);
			$attributes = array("AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS", "ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION", "TIMEOUT");
			foreach ($attributes as $value)
			{
				echo "PDO::ATTR_$value: ";
				echo $gecko->getAttribute(constant("PDO::ATTR_$value"))."\n";
			}
		}
		catch(Exception $e)
		{
			echo ("Error connection to DB\n");
			error_log($e->getMessage()."\n",3,My_PDO::ERROR_LOG_FILE);
		}
	}
?>