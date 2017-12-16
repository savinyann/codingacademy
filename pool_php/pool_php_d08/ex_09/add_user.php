<?php
	include_once "db_pdo.php";

function add_user($login, $password, $role, $email)
{
	$gecko = connect_db("gecko");
	try
	{
		$is_admin = ($role == "ADM") ? 1 : 0;
		if ($gecko->query("SELECT is_active FROM users") == FALSE)
		{
			$gecko->exec("ALTER TABLE users ADD is_active TINYINT(4) DEFAULT 1");
			echo "Column 'is_active' added to table users from gecko.\n";
		}
		if ($gecko->query("SELECT role FROM users") == FALSE)
		{
			$gecko->exec("ALTER TABLE users ADD role VARCHAR(6)");
			$gecko->exec("UPDATE users SET role = 'GLOBAL'");
			echo "Column 'role' added to table users from gecko.\n";
		}
		$check_login = $gecko->prepare("SELECT id FROM users WHERE name = ?");
		$check_login->execute(array($login));
		if($check_login->fetch())
		{
			echo "This login has already been picked.\n";
			return(TRUE);
		}
		$id = $gecko->query("SELECT id FROM users ORDER BY id desc LIMIT 1");
		$add_entry = $gecko->prepare("INSERT INTO users VALUES (NULL,?,?,?,CURDATE(),?,1,?)");
		$add_entry->execute(array($login,$password,$email,$is_admin,$role));
		$check = $gecko->query("SELECT id FROM users ORDER BY id desc LIMIT 1");
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

$error = FALSE;
$usage = "Usage: php add_user.php login password password_conf role [email]\n";
if($argc < 5)
{
	echo $error_param = "Bad param: $usage";
	error_log($error_param,3,My_PDO::ERROR_LOG_FILE);
	return(NULL);
}
if(empty($argv[5]))
{
	$argv[5] = "Unknow";
}
if(strlen($argv[1]) > 20)
{
	echo $error_login = "login must contain less than 20 characters.\n";
	error_log($error_login,3,My_PDO::ERROR_LOG_FILE);
	$error = TRUE;
}
if($argv[2] != $argv[3])
{
	echo $error_password = "Passwords don't match\n";
	error_log($error_password,3,My_PDO::ERROR_LOG_FILE);
	$error = TRUE;
}
$argv[4] = strtoupper($argv[4]);
if($argv[4] != "ADM" && $argv[4] != "GLOBAL" && $argv[4] != "INVITE")
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
	$password = hash("sha256", $argv[2]);
}
add_user($argv[1],$password,$argv[4], $argv[5]);
?>