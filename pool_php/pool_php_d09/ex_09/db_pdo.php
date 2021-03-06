<?php

	class My_PDO extends PDO
	{
		const ERROR_LOG_FILE = "error.log";
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
			//echo "Connection to DB successful\n";
		}
		elseif($db)
		{
			$pdo = new My_PDO("mysql:host=".$host."::".$port.";dbname=".$db, $username, $password);
			//echo "Connection to DB successful\n";
		}
		else
		{
			//echo "Bad params! Usage: php add_user.php login password password_conf role\n";
			return;
		}
		return($pdo);
	}
	catch(Exception $e)
	{
		
		//echo ("Error connection to DB\n");
		file_put_contents(My_PDO::ERROR_LOG_FILE, $e->getMessage()."\n",FILE_APPEND);
		exit();
	}
}
?>