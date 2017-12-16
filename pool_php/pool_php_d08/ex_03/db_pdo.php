<?php

	class My_PDO extends PDO
	{
		const ERROR_LOG_FILE = "/home/yann/Rendu/pool_php_d08/ex_03/error.log";
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
			echo "Success\n";
		}
		elseif($db)
		{
			$pdo = new My_PDO("mysql:host=".$host."::".$port.";dbname=".$db, $username, $password);
			echo "Success\n";
		}
		else
		{
			echo "Error: Not enough parameters to try a connection.\n";
		}
		return($pdo);
	}
	catch(Exception $e)
	{
		echo ("PDO ERROR: <".$e->getMessage()."> storage in <".My_PDO::ERROR_LOG_FILE.">.\n");
		file_put_contents(My_PDO::ERROR_LOG_FILE, $e->getMessage()."\n",FILE_APPEND);
	}
}
?>