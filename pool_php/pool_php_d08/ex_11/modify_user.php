<?php
	include_once "db_pdo.php";

function modify_user($PDO, $id, $column, $value)
{
	try
	{
		if($column == "login")
		{
			$check_login = $PDO->prepare("SELECT id FROM users WHERE name = ?");
			$check_login->execute(array($value));
			if($check_login->fetch())
			{
				echo "This login has already been picked.\n";
				return(TRUE);
			}
		}
		$check_id = $PDO->prepare("SELECT id FROM users WHERE id = ?");
		$check_id->execute(array($id));
		if($check_id->fetch())
		{
			$modify_entry = $PDO->prepare("UPDATE users SET $column = ? WHERE id = ?");
			$modify_entry->execute(array($value, $id));
		}
		else
		{
			echo "\t user # $id unknown!\n";
		}
	}
	catch(Exception $e)
	{
		echo "Error MySQL, user not added, more infos in My_PDO::ERROR_LOG_FILE\n";
		error_log($e->getMessage()."\n",3,My_PDO::ERROR_LOG_FILE);
	}
}


function modifyuser_admin($PDO, $id, $column, $value, $conf_value)
{
	$error = FALSE;
	if($column == "login" && strlen($value) > 20)
	{
		echo $error_login = "login must contain less than 20 characters.\n";
		error_log($error_login,3,My_PDO::ERROR_LOG_FILE);
		$error = TRUE;
	}
	if($column == "password" && $value != $conf_value)
	{
		echo $error_password = "Passwords don't match\n";
		error_log($error_password,3,My_PDO::ERROR_LOG_FILE);
		$error = TRUE;
	}
	elseif($column == "password")
	{
		$value = hash("sha256", $value);
	}
	if($column == "role")
	{
		$value = strtoupper($value);
		if($value != "ADM" && $value != "GLOBAL" && $value != "INVITE")
		{
			echo $error_role = "Bad role: ADM|GLOBAL|INVITE\n";
			error_log($error_role,3,My_PDO::ERROR_LOG_FILE);
			$error = TRUE;
		}
	}
	$value = ($column == "email") ? strtolower($value) : $value;
	if($error == TRUE)
	{
		return(NULL);
	}
	modify_user($PDO, $id, $column, $value);
}


function selfmodify($PDO, $id, $column, $value, $conf_value)
{
	if($column == "role" || $column == "created_at" || $column == "id" || $column == "is_admin")
	{
		echo "You can not modify this value.\n";
		return(TRUE);
	}
	$error = FALSE;
	if($column == "login" && strlen($value) > 20)
	{
		echo $error_login = "login must contain less than 20 characters.\n";
		error_log($error_login,3,My_PDO::ERROR_LOG_FILE);
		$error = TRUE;
	}
	if($column == "password" && $value != $conf_value)
	{
		echo $error_password = "Passwords don't match\n";
		error_log($error_password,3,My_PDO::ERROR_LOG_FILE);
		$error = TRUE;
	}
	elseif($column == "password")
	{
		$value = hash("sha256", $value);
	}
	if($column == "role")
	{
		$value = strtoupper($value);
		if($value != "ADM" && $value != "GLOBAL" && $value != "INVITE")
		{
			echo $error_role = "Bad role: ADM|GLOBAL|INVITE\n";
			error_log($error_role,3,My_PDO::ERROR_LOG_FILE);
			$error = TRUE;
		}
	}
	$value = ($column == "email") ? strtolower($value) : $value;
	if($error == TRUE)
	{
		return(NULL);
	}
	modify_user($PDO, $id, $column, $value);
}
?>