<?php
	include_once "db_pdo.php";

function add_user($login, $password, $email, $is_admin)
{
	$usage = "Usage: php add_user.php login password email is_admin\n";
	if(!is_string($login))
	{
		//echo "First parameter must be a string. $usage";
		return;
	}
	if(!is_string($password))
	{
		//echo "Second parameter must be a string. $usage";
		return;
	}
	if(!is_string($email))
	{
		//echo "Third parameter must be a string. $usage";
		return;
	}
	try
	{
		$gecko = connect_db("gecko");		
		$add_entry = $gecko->prepare("INSERT INTO users (name, password, email, created_at, is_admin) VALUES (?,?,?,CURDATE(),?)");
		$add_entry->execute(array($login,$password,$email,$is_admin));
		//echo "User added to DB\n";
	}
	catch(Exception $e)
	{
		//echo "Error MySQL, user not added, more infos in ".My_PDO::ERROR_LOG_FILE.".\n";
		file_put_contents(My_PDO::ERROR_LOG_FILE, $e->getMessage()."\n",FILE_APPEND);

	}
}
?>