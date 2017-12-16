<?php
/* ~~~~~~~Does everything it has to do ~~~~~~~*/

include_once __DIR__."/../Config/db.php";

class UserModel
{
	private $_SQL;
	private static $instance;

	private function __clone(){}
	private function __construct()
	{
		$this->_SQL = Query::getInstance();
	}

	public static function getInstance()
	{
		if(!isset(self::$instance))
		{
			self::$instance = new self();
		}
		return(self::$instance);
	}


	public function Create_User($user)
	{
		$userAlreadyExists = $this->Read_User($user);
		if(count($userAlreadyExists) == 0)
		{
			$sql ="INSERT INTO users (username, password, email, `group`,creation_date, modification_date) VALUES (:username, :password, :email, :group, NOW(), NOW())";
				
			$data = array
				(
				'username' => $user["username"],
				'password' => $user["password"],
				'email' => $user["email"],
				'group' => (isset($user["group"])) ? $user["group"] : 0
				);
			if ($this->_SQL->SQLquery($sql, $data) != -1)
			{
				return("User created");
			}
			else
			{
				return("Values not committed");
			}
		}
		else
		{
			return("This username already exists.");
		}
	}

		


	public function Read_User($user = NULL)
	{
		if($user == NULL)
		{
			$query = "SELECT * FROM users";
			$users = $this->_SQL->SQLquery($query);
			return($users);
		}
		else if(isset($user["id"]))
		{
			$query = "SELECT * FROM users WHERE id = ?";
			$variable = array($user["id"]);
			$user = $this->_SQL->SQLquery($query, $variable);
			return($user);
		}
		else
		{
			$query = "SELECT * FROM users WHERE username = ?";
			$variable = array($user["username"]);
			$user = $this->_SQL->SQLquery($query, $variable);
			return($user);
		}
	}



	public function Edit_User($user)
	{
		$user_username["username"] = $user["username"];
		$userAlreadyExists = $this->Read_User($user_username);
		if(count($userAlreadyExists) == 0 || $user["id"] == $userAlreadyExists[0]["id"])
		{
			if(isset($user["group"]) && $user["password"] != NULL)
			{
				$query = "UPDATE users SET username = ?, password = ?, email = ?, `group` = ?, status = ?, modification_date = NOW() WHERE id = ?";
				$variable = array($user["username"], $user["password"], $user["email"], $user["group"], $user["status"], $user["id"]);
				$check = $this->_SQL->SQLquery($query, $variable);
				$return = "User id#".$user["id"]." has been modified.";
			}
			else if(isset($user["group"]) && $user["password"] == NULL)
			{
				$query = "UPDATE users SET username = ?, email = ?, `group` = ?, status = ?, modification_date = NOW() WHERE id = ?";
				$variable = array($user["username"], $user["email"], $user["group"], $user["status"], $user["id"]);
				$check = $this->_SQL->SQLquery($query, $variable);
				$return = "User id#".$user["id"]." has been modified.";
			}
			else if(isset($user["password"]) && $user["password"] != NULL)
			{
				$query = "UPDATE users SET username = ?, password = ?, email = ?, modification_date = NOW() WHERE id = ?";
				$variable = array($user["username"], $user["password"], $user["email"], $user["id"]);
				$check = $this->_SQL->SQLquery($query, $variable);
				$return = "Modification have been applied.";
			}
			else
			{
				$query = "UPDATE users SET username = ?, email = ?, modification_date = NOW() WHERE id = ?";
				$variable = array($user["username"], $user["email"], $user["id"]);
				$check = $this->_SQL->SQLquery($query, $variable);
				$return ="Modification have been applied.";
			}

			if($check == -1)
				return("An error has occured.");
			return($return);
		}
		else
		{
			return("This username already exists.");
		}
	}


	public function Delete_User($user)
	{
		$query = "DELETE FROM users WHERE id = ?";
		$variable = array($user["id"]);
		$check = $this->_SQL->SQLquery($query, $variable);
		if($check == -1)
			return("An error has occured.");
		return("User id#".$user["id"]." has been deleted.");
	}
}
?>