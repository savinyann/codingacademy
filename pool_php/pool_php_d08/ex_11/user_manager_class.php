<?php
include_once "db_pdo.php";
include_once "add_user.php";
include_once "modify_user.php";
include_once "dump_users.php";
include_once "misc.php";

class UsersManager
{
	private $PDO;
	private $user = array();


	public function __construct($host = NULL, $username = NULL, $password = NULL, $port = NULL, $db)
	{
		$this->PDO = connect_db($db, $host, $username, $password);
	}


	public function start()
	{
		$logged_in = FALSE;
		while(1)
		{
			$connection_attempt = 5;
			while($logged_in == FALSE && $connection_attempt > 0)
			{
				$login = readline("Login as: ");
				$password = readline("password = ");
				//$password = hash("sha256",readline("Password: "));
				$data = $this->PDO->prepare("SELECT * FROM users WHERE name = ?");
				$data->execute(array($login));
				while($user = $data->fetch())
				{
					foreach ($user as $key => $value)
					{
						if(!is_integer($key))
						{
							$this->user[$key] = $value;
						}
					}
					if($this->user["password"] == $password && $this->user["is_active"] == 1)
					{
						$logged_in = TRUE;
						break;
					}
					elseif($this->user["is_active"] == 0)
					{
						echo "For security reasons your account has been blocked, please contact your manager to unblock your account.\n";
					}
				}
				$connection_attempt--;
				echo ($logged_in == TRUE) ? "" : "Invalid credentials. $connection_attempt attempt(s) remaining.\n";
			}
			if($logged_in)
			{
				echo "Welcome ".$this->user["name"].", you're now logged as ".$this->user["role"].".\n";
				//print_r($this->user);
				break;
			}
			else
			{
				$lock_user = $this->PDO->prepare("UPDATE users SET is_active = 0 WHERE name = ?");
				$lock_user->execute(array($login));
				echo "For security reasons your account has been blocked.\n";
			}
		}
		while($logged_in == TRUE)
		{
			$logged_in = $this->prompt();
		}		
	}


	private function prompt()
	{
		$command = explode(" ", readline("\$".$this->user["name"]."@usemanager: "));
		switch ($command[0])
		{
			case "adduser":
				if($this->user["role"] != "ADM")
				{
					echo $command[0].": Command unknown.\n";
					return(TRUE);
				}
				if(count($command) < 5)
				{
					echo $error_param = "\tBad param. Usage: adduser <login> <password> <password_conf> <role> [<email>]\n";
					error_log($error_param,3,My_PDO::ERROR_LOG_FILE);
					return(TRUE);
				}
				adduser($this->PDO, $command[1], $command[2], $command[3], $command[4]);
				return(TRUE);
				break;
			
			case "modifyuser":
				if($this->user["role"] == "ADM")
				{
					if(count($command) < 4)
					{
						echo $error_param = "\tBad param. Usage: modifyuser <id> <login|password|role|email> <newvalue> [<conf_value>]\n";
						error_log($error_param,3,My_PDO::ERROR_LOG_FILE);
						return(TRUE);
					}
					$command[4] = (count($command) == 4) ? "NULL" : $command[4];
					modifyuser_admin($this->PDO, $command[1], $command[2], $command[3], $command[4]);
					return(TRUE);
				}
				else
				{
					if(count($command) < 3)
					{
						echo $error_param = "\tBad param. Usage: modifyuser <login|password|role|email> <newvalue> [<conf_value>]\n";
						error_log($error_param,3,My_PDO::ERROR_LOG_FILE);
						return(TRUE);
					}
					$command[3] = (count($command) == 3) ? "NULL" : $command[3];
					selfmodify($this->PDO, $this->user["id"],$command[1], $command[2], $command[3]);
					return(TRUE);
				}
				break;
			
			case "dump":
				if($this->user["role"] == "INVITE")
				{
					echo $command[0].": Command unknown.\n";
					return(TRUE);
				}
				if(count($command) != 1 && count($command) < 4)
				{
					echo "\tBad params! Usage: dump [<filter> <value> <exact>]\n";
					return(TRUE);
				}
				dump($this->PDO, $command[1]);
				return(TRUE);
				break;
			
			case "deluser":
				if($this->user["role"] != "ADM")
				{
					echo $command[0].": Command unknown.\n";
					return(TRUE);
				}
				if(count($command) < 2)
				{
					echo "\tBad params! Usage: deluser <id>\n";
					return(TRUE);
				}
				deluser($this->PDO, $command[1]);
				return(TRUE);
				break;
			
			case "makeactive":
				if($this->user["role"] == "INVITE")
				{
					echo $command[0].": Command unknown.\n";
					return(TRUE);
				}
				if(count($command) < 2)
				{
					echo "\tBad params! Usage: makeactive <id>\n";
					return(TRUE);
				}
				makeactive($this->PDO, $command[1]);
				return(TRUE);
				break;
			
			case "makeinactive":
				if($this->user["role"] == "INVITE")
				{
					echo $command[0].": Command unknown.\n";
					return(TRUE);
				}
				if(count($command) < 2)
				{
					echo "\tBad params! Usage: makeinactive <id>\n";
					return(TRUE);
				}
				makeinactive($this->PDO, $command[1]);
				return(TRUE);
				break;
			
			case "help":
				help($command);
				return(TRUE);
				break;
			
			case "logout":
				unset($this->user);
				$this->start();
				break;
			
			case "quit":
				unset($this->user);
				return(FALSE);
				break;
			
			case "exit":
				unset($this->user);
				return(FALSE);
				break;
			
			default:
				echo $command[0].": Command unknown\n";
				return(TRUE);
				break;
		}

	}
}


if($argc < 6)
{
	echo "Bad params! Usage: php user_manager_class.php host dbuser dbpass dbport dbname\n";
	return(NULL);
}
$manager = new UsersManager($argv[1],$argv[2],$argv[3],$argv[4],$argv[5]);
$manager->start();
?>