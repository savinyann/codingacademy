<?php
function my_show_db($PDO, $string)
{
	$is_empty = TRUE;
	$result = array();
	if((is_object($PDO) && is_a($PDO, "PDO")) && is_string($string))
	{
		$getuser = $PDO->prepare('SELECT * FROM users WHERE name = ?');
		$check = $getuser->execute(array($string));
		$generator = get_user($getuser);
		foreach ($generator as $value)
		{
			$result[] = $value;
			$is_empty = FALSE;
		}
		if($is_empty == FALSE)
			return($result);
		return(NULL);
	}
	elseif(!is_string($string))
	{
		echo "Second parameter is invalid. Usage: php my_show_db.php PDO string\n";
		return(NULL);
	}
	elseif(!is_object($PDO) || (!is_a($PDO, "PDO")))
	{
		echo "First parameter is invalide. Usage: php my_show_db.php PDO string\n";
		return(NULL);
	}
}


function get_user($get_user)
{

	$first_time = TRUE;
	while($data = $get_user->fetch())
	{
		$result = "";
		foreach ($data as $key => $value)
		{
			if(!is_integer($key))
			{
				if($first_time == FALSE)
				{
					$result .= ", ";
				}

				$result .= "[$key] => [$value]";
				$first_time = FALSE;
			}
		}
		$result .="\n";
		$first_time = TRUE;
		yield($result);
	}
}
?>