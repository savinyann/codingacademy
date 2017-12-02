<?php

// Display user's name from his $identifier in users table from gecko DB 
function my_print_users($PDO, ...$identifier)
{
	$name_found = FALSE;
	$name = array();
	if(is_object($PDO) && is_a($PDO, "PDO"))
	{
		foreach ($identifier as $value)
		{
			if(is_int($value))
			{
				$name = $PDO->prepare('SELECT name FROM users WHERE id = ?');
				if($name->execute(array($value)))
				{
					if($display = $name->fetch())
					{
						echo $display["name"]."\n";
						$name->closeCursor();
						$name_found = TRUE;
					}
				}
			}
			else
			{
				throw new Exception("Invalid id given", 1);
			}
		}
	}
	return($name_found);
}
?>