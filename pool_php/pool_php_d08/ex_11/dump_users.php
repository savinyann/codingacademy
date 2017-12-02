<?php
include_once "db_pdo.php";

function show_users()
{
	$gecko = connect_db("gecko");
	$tables = array();
	$data = $gecko->query("SELECT id, name, email, created_at, is_admin, is_active, role FROM users");
	display($data);
}


function dump_users($filter = NULL, $value = NULL, $exact)
{
	$gecko = connect_db("gecko");
	try
	{
		if($exact == "TRUE")
		{	
			$data = $gecko->prepare("SELECT id, name, email, created_at, is_admin, is_active, role FROM users WHERE $filter = ?");
		}
		else
		{
			$value = "%".$value."%";
			$data = $gecko->prepare("SELECT id, name, email, created_at, is_admin, is_active, role FROM users WHERE $filter LIKE ?");
		}
		$data->execute(array($value));
		display($data);
	}
	catch(Exception $e)
	{
		echo "Error MySQL. More infos in My_PDO::ERROR_LOG_FILE\n";
		error_log($e->getMessage()."\n",3,My_PDO::ERROR_LOG_FILE);
	}
}


function display($data)
{
	$empty_data = TRUE;
	//echo "id\tname\tpassword\temail\tcreated_at\tis_admin\tis_active\trole\n";
	while($line = $data->fetch())
	{
		foreach ($line as $key => $value)
		{
			if($key == "id" && !is_integer($key))
			{
				echo "[$value]";
			}
			elseif ($key == "is_active" && !is_integer($key))
			{
				echo ($value == "1") ? "\tactive" : "\tinactive";
			}
			elseif ($key == "is_admin" && !is_integer($key))
			{
				echo ($value == "1") ? "\tadmin" : "\tnot_admin";
			}
			elseif(!is_integer($key)) 
			echo "\t$value";
		}
		$empty_data = FALSE;
		echo "\n";
	}	
	echo ($empty_data == FALSE) ? "" : "No result match your search\n";
}


function dump($PDO, $command)
{
	if(count($command) == 1)
	{
		show_users();
	}
	else
	{
		$command[3] = strtoupper($command[3]);
	 	if($command[1] == "password")
		{
			echo "Don’t try to filter the password, it’s not possible\n";
			exit();
		}
		elseif(($command[3] != "TRUE" && $command[3] != "FALSE"))
		{
			echo "Parameter exact must be TRUE or FALSE.\n";
			exit();
		}
		dump_users($command[1],$command[2],$command[3]);
	}
}
?>