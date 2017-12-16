<?php

// Hash the string $password, using MD5 algorithm.
// Not so secure.
function my_very_secure_hash($password)
{
	if(is_string($password))
	{
		return(md5($password));	
	}
	else
	{
		echo "Parameter have to be a string.\n";
		return(NULL);
	}
}
?>