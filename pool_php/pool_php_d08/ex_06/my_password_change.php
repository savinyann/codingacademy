<?php

// Change the password of the user associated with $email
function my_password_change($PDO, $email, $password = "")
{
	if(!is_object($PDO) || !is_a($PDO, "PDO"))
	{
		echo "Bad parameter: First parameter must be an PDO object.\n";
	}
	if(!is_string($email))
	{
		echo "Bad parameter: Second parameter must be a string.\n";
	}
	if(!is_string($password))
	{
		echo "Bad parameter: Third parameter must be a string.\n";
	}
	$email_exist = $PDO->prepare('SELECT name FROM users WHERE email = ?');
	$email_exist->execute(array($email));

	if($password == "" || $email_exist->fetch() == FALSE)
	{
		throw new Exception("", 1);
	}

	$hashed_pwd = password_hash($password,PASSWORD_DEFAULT);
	$chg_passwd = $PDO->prepare('UPDATE users SET password = ? WHERE email = ?');
	$chg_passwd->execute(array($hashed_pwd,$email));

	$check_pwd = $PDO->prepare('SELECT password FROM users WHERE email = ?');
	$check_pwd->execute(array($email));
	$check_pwd = $check_pwd->fetch()["password"];
	return(password_verify($password,$check_pwd));
}
?>