<?php

include_once "my_sort_array_by_length_then_name.php";
function my_change_user($PDO, ...$name)
{
	try
	{
		$updated_name = array();
		foreach ($name as $value)
		{
			if(is_string($value))
			{
				$check_user = $PDO->prepare('SELECT name FROM users WHERE name = ?');
				$check_user->execute(array($value));
				$check_user = $check_user->fetch()["name"];
				if($check_user)
				{
					$change_user = $PDO->prepare('UPDATE users SET name = CONCAT(UPPER(LOWER(SUBSTRING(name,1,1))),LOWER(SUBSTRING(name,2)),42) WHERE name = ?');
					$change_user->execute(array($value));
					$updated_name[] = $value;
				}
				else
				{
					throw new Exception("user $value not found.",1);	
				}
			}
		}
		$updated_name = my_sort_array_by_length_then_name($updated_name);
		return($updated_name);
	}
	catch(Exception $e)
	{
		echo $e->getMessage()."\n";
	}
	finally
	{
		echo "Good luck with the user DB!\n";
	}
}
?>