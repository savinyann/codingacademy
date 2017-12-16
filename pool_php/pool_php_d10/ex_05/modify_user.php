<?php
include_once "db_pdo.php";
include_once "get_user.php";

function modify_user($db, $login, $password, $email, $old_email)
{
	$used_mail = get_user($db, "email", $email)["email"];
	if($used_mail != NULL && $used_mail != $old_email)
	{
		echo "Email is already use. Choose another one.<br>";
		return(NULL);
	}
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
		$gecko = connect_db($db);
		
		$query = "UPDATE users SET name = ?, password = ?, email = ? WHERE email = ?";
		$array = array($login, $password, $email, $old_email);
		SQLquery($gecko, $query, $array);
		echo "Change done. User updated.\n";
		//echo "User added to DB\n";
	}
	catch(Exception $e)
	{
		//echo "Error MySQL, user not added, more infos in ".My_PDO::ERROR_LOG_FILE.".\n";
		file_put_contents(My_PDO::ERROR_LOG_FILE, $e->getMessage()."\n",FILE_APPEND);

	}
}
?>