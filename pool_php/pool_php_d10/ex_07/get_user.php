<?php
include_once "SQLquery.php";
include_once "db_pdo.php";

//Return an user from his email or his login/name.
function get_user($db, $column, $value)
{
	if($column != "email" && $column != "login" && $column != "name")
		{
			return(NULL);
		}

	$gecko = connect_db($db);
	$query = "SELECT * FROM users WHERE $column = ?";
	$array = array($value);
	$result = SQLquery($gecko, $query, $array);
	$user = array();
	$users = $result->fetch();
	$result->closecursor();
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
	return($user);
}


?>