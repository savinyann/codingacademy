<?php

// Yann applaud Didier and Wladimir.
function applaud()
{
	echo "Yann applaud Didier and Wladimir.";
}

// Hash the string $password with a randomly generated salt, using MD5 algorithm
// and return an array containing the hashed password and the salt.
function my_password_hash($password)
{
	if(is_string($password))
	{
		$password_hash = array();
		srand(time());
		$salt = rand();
		$password_hash["salt"] = $salt;
		$password_hash["hashed password"] = md5($password.$salt);
		return($password_hash);
	}
	else
	{
		echo "You had one job; Parameter have to be a string!\n";
		return(NULL);
	}
}

// Return TRUE if two string $password and $salt corresponds with an $hashed_password
// FALSE otherwise.
function my_password_verify($password, $salt, $hashed_password)
{
	if(!is_string($password))
	{
		echo "First parameter have to be a string.\n";
		return(NULL);
	}
	if(is_string($salt))
	{
		echo "Second parameter have to be a string.\n";
		return(NULL);
	}
	if(!is_string($hashed_password))
	{
		echo "Third parameter have to be a string.\n";
		return(NULL);
	}
	if(md5($password.$salt) == $hashed_password)
		return(TRUE);
	return(FALSE);
}
?>