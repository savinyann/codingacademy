<?php
include_once "db_pdo.php";
include_once "SQLquery.php";

function log_user($email, $password)
{
	$gecko = connect_db("gecko");
	$query = "SELECT * FROM users WHERE email = ?";
	$array = array($email);
	$result = SQLquery($gecko, $query, $array);
	$user = array();
	$users = $result->fetch();
	$result->closecursor();
	//var_dump($users);
	if($users == FALSE)
	{
		return(NULL);
	}
	foreach ($users as $key => $value)
	{
		if(!is_integer($key))
		{
			$user["$key"] = $value;
		}
	}
	//echo "<br><br><br>password = $password <br>";
	//var_dump($user);
	if(password_verify($password, $user["password"]))
	{
		return($user["name"]);
	}
	else
	{
		return(NULL);
	}
}
?>