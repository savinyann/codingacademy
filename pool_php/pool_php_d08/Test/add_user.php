<?php
	include_once "db_pdo.php";
	include_once "SQLquery.php";

function add_user($login, $password, $email, $is_admin)
{
	$usage = "Usage: php add_user.php login password email is_admin\n";
	if(!is_string($login))
	{
		echo "First parameter must be a string. $usage";
		return;
	}
	if(!is_string($password))
	{
		echo "Second parameter must be a string. $usage";
		return;
	}
	if(!is_string($email))
	{
		echo "Third parameter must be a string. $usage";
		return;
	}
	if(!is_bool($is_admin))
	{
		echo "Fourth parameter must be a bool. $usage";
		return;
	}
	try
	{
		$gecko = connect_db("gecko");
		if ($gecko->query("SELECT is_active FROM users") == FALSE)
		{
			var_dump($gecko->exec("SELECT is_active FROM users"));
			$gecko->exec("ALTER TABLE users ADD is_active TINYINT(4) DEFAULT 1");
			echo "Column is_active added to table users from gecko.\n";
		}

		$query = "INSERT INTO users VALUES (NULL,?,?,?,CURDATE(),?,1)";
		$array = array($login,$password,$email,$is_admin);
		SQLquery($gecko, $query, $array);
		echo "User added to DB\n";
	}
	catch(Exception $e)
	{
		echo "Error MySQL, user not added, more infos in ".My_PDO::ERROR_LOG_FILE.".\n";
		file_put_contents(My_PDO::ERROR_LOG_FILE, $e->getMessage()."\n",FILE_APPEND);

	}
}
?>