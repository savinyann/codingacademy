<?php

function deluser($PDO, $id)
{
	$delete_conf = strtolower(readline("Are you sure ? [y/N]: "));
	if ($delete_conf == "y")
	{

		$check_id = $PDO->prepare("SELECT id FROM users WHERE id = ?");
		$check_id->execute(array($id));
		if($check_id->fetch())
		{
			$del = $PDO->prepare("DELETE FROM users WHERE id = ?");
			$del->execute(array($id));
			echo "\t user # $id deleted.\n";	
		}
		else
		{
			echo "\t user # $id unknown!\n";
		}
	}
	else
	{
		return(TRUE);
	}
}


function makeactive($PDO, $id)
{
	$check_id = $PDO->prepare("SELECT id FROM users WHERE id = ?");
	$check_id->execute(array($id));
	if($check_id->fetch())
	{
		$active = $PDO->prepare("UPDATE users SET is_active = 1 WHERE id = ?");
		$active->execute(array($id));
		echo "\t user # $id activated.\n";	
	}
	else
	{
		echo "\t user # $id unknown!\n";
	}
	return(TRUE);
}


function makeinactive($PDO, $id)
{
	$check_id = $PDO->prepare("SELECT id FROM users WHERE id = ?");
	$check_id->execute(array($id));
	if($check_id->fetch())
	{
		$active = $PDO->prepare("UPDATE users SET is_active = 0 WHERE id = ?");
		$active->execute(array($id));
		echo "\t user # $id desactivated.\n";	
	}
	else
	{
		echo "\t user # $id unknown!\n";
	}
	return(TRUE);
}


function help($command)
{
	if(count($command) == 1)
	{
		echo "\tadduser\n\tmodifyuser\n\tdump\n\tdeluser\n\tmakeactive\n\tmakeinactive\n\thelp\n\tlogout\n\tquit\n";
		return(TRUE);
	}
	switch($command[1])
	{
		case "adduser":
			echo $error_param = "\tUsage: adduser <login> <password> <password_conf> <role> [<email>]\n";
			break;

		case "modifyuser":
			echo $error_param = "\tUsage: modifyuser <id> <login|password|role|email> <newvalue> [<conf_value>]\n";
			break;

		case "dump":
			echo "\tUsage: dump [<filter> <value> <exact>]\n";
			break;

		case "deluser":
			echo "\tUsage: deluser <id>\n";
			break;

		case "makeactive":
			echo "\tUsage: makeactive <id>\n";
			break;

		case "makeinactive":
			echo "\tUsage: makeinactive <id>\n";
			break;

		case "help":
			echo "\tUsage: help <command>\n";
			break;

		case "logout":
			echo "\tUsage: logout\n";
			break;

		case "quit":
			echo "\tUsage: quit\n";
			break;

		case "exit":
			echo "\tUsage: exit\n";
			break;

		default:
			echo "\tadduser\n\tmodifyuser\n\tdump\n\tdeluser\n\tmakeactive\n\tmakeinactive\n\thelp\n\tlogout\n\tquit\n";
			break;
	}
	return(TRUE);
}


?>