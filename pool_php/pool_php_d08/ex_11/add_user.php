<?php
	include_once "db_pdo.php";

function add_user($PDO, $login, $password, $role, $email)
{
	try
	{
		$is_admin = ($role == "ADM") ? 1 : 0;
		if($column == "name")
		{
			$check_login = $PDO->prepare("SELECT id FROM users WHERE name = ?");
			$check_login->execute(array($value));
			if($check_login->fetch())
			{
				echo "This login has already been picked.\n";
				return(TRUE);
			}
		}
		$id = $PDO->query("SELECT id FROM users ORDER BY id desc LIMIT 1");
		$add_entry = $PDO->prepare("INSERT INTO users VALUES (NULL,?,?,?,CURDATE(),?,1,?)");
		$add_entry->execute(array($login,$password,$email,$is_admin,$role));
		$check = $PDO->query("SELECT id FROM users ORDER BY id desc LIMIT 1");
		$id = $id->fetch();
		$check = $check->fetch();
		if($id[0] + 1 == $check[0])
		{
			echo "User added to DB\n";
		}
	}
	catch(Exception $e)
	{
		echo "Error MySQL, user not added, more infos in My_PDO::ERROR_LOG_FILE\n";
		error_log($e->getMessage()."\n",3,My_PDO::ERROR_LOG_FILE);
	}
}

function adduser($PDO, $login, $password, $password_conf, $role, $email = "Unknow")
{
	$error = FALSE;
	if(strlen($login) > 20)
	{
		echo $error_login = "login must contain less than 20 characters.\n";
		error_log($error_login,3,My_PDO::ERROR_LOG_FILE);
		$error = TRUE;
	}
	if($password != $password_conf)
	{
		echo $error_password = "Passwords don't match\n";
		error_log($error_password,3,My_PDO::ERROR_LOG_FILE);
		$error = TRUE;
	}
	$role = strtoupper($role);
	if($role != "ADM" && $role != "GLOBAL" && $role != "INVITE")
	{
		echo $error_role = "Bad role: ADM|GLOBAL|INVITE\n";
		error_log($error_role,3,My_PDO::ERROR_LOG_FILE);
		$error = TRUE;
	}
	if($error == TRUE)
	{
		return(NULL);
	}
	else
	{
		$password = hash("sha256", $password);
	}
	add_user($PDO, $login,$password,$role, $email);
}
?>