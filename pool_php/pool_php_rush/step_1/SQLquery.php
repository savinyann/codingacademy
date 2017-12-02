<?php

// Envoi la requète SQL $query à la DB reliée à l'objet PDO $pdo.
// renvoi NULL si un des paramètres est incorrect ou renvoi les résultats
// de la requète. Si des paramètres sont nécéssaire pour l'execution de la
// requète, ils doivent être inclus dans le tableau $array.
function SQLquery($pdo, $query, $array = array())
{
	if(!is_object($pdo) || is_a(!$pdo,"PDO"))
	{
		echo "first parameter have to be a PDO object.\n";
		return(NULL);
	}

	if(!is_string($query))
	{
		echo "second parameter have to be a string.\n";
		return(NULL);
	}

	if(!is_array($array))
	{
		echo "Third parameter have to be an array.\n";
		return(NULL);
	}
	try
	{
		$result = $pdo->prepare($query);
		$result->execute($array);
		
		return($result);
		/*
		else
		{
			throw new Exception("Error: a wild error appeared", 1);
		}*/
	}
	catch(Exception $e)
	{
		echo $e->getMessage()."\n";
		exit();
	}
}
?>