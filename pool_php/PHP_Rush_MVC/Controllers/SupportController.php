<?php

Class Support
{
	public static function CheckUsername($username)
	{
		if(strlen($username) < 3 || strlen($username) > 10)
		{
			return("Invalid username: username must contain between 3 and 10 caracters");
		}
		return(TRUE);
	}


	public static function CheckPassword($password, $confirm)
	{
		if ((strlen($password) < 8 || strlen($password) > 20))
		{
			return("Invalid password: password must contain between 8 and 20 caracters");
		}
		if ($password != $confirm)
		{
			return("Password and password confirmation doesn't match");
		}
		return(TRUE);
	}


	public static function CheckEmail($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE)
		{
			return("Invalid email");
		}
		return(TRUE);
	}


	public static function CheckTitle($title)
	{
		if(strlen($title) <= 0)
		{
			return("Invalid title: Title must contain at least one caracter.");
		}
		return(TRUE);
	}


	public static function CheckContent($content)
	{
		if(strlen($content) <= 0)
		{
			return("Invalid content: Content must contain at least one caracter.");
		}
		return(TRUE);
	}


	public static function CheckCategory($category)
	{
		if(strlen($category) <= 0)
		{
			return("Invalid Category name: Name must contain at lease one caracter.");
		}
		return(TRUE);
	}


	public static function FormatGroupToDB($group)
	{
		switch ($group)
		{
			case "user":
				return(0);
				break;

			case "writer":
				return(1);
				break;

			case "administrator":
				return(2);
				break;
			
			default:
				 return("ERROR - THIS CAN'T BE...");
				break;
		}
	}


	public static function FormatGroupFromDB($group)
	{
		switch ($group)
		{
			case 0:
				return("user");
				break;

			case 1:
				return("writer");
				break;

			case 2:
				return("administrator");
				break;
			
			default:
				 return("ERROR - THIS CAN'T BE...");
				break;
		}
	}


	public static function FormatStatusToDB($status)
	{
		switch ($status)
		{
			case "active":
				return(1);
				break;

			case "inactive":
				return(0);
				break;
		}
	}


	public static function FormatStatusFromDB($status)
	{
		switch ($status)
		{
			case 1:
				return("active");
				break;

			case 0:
				return("inactive");
				break;
		}
	}


	public static function check_errors($inscription)
	{
		$error = array();

		if (strlen($inscription["username"]) < 3 OR strlen($inscription["username"]) > 10)
		{
			$error["username"] = "Invalid username\n";
		}


		if ((filter_var($inscription['email'], FILTER_VALIDATE_EMAIL) == FALSE))
		{
			$error["email"] = "Invalid email\n";
		}

		if ((strlen($inscription["password"]) < 8 || strlen($inscription["password"]) > 20))
		{
			$error["password"] = "Invalid password\n";
		} 
		if ($inscription["password"] != $inscription["password_confirmation"])
		{
			$error["password"] = "Password and password confirmation doesn't match\n";
		}
		return $error;
	}


	public static function secure_input($data)
	{
		$secured_data = array();
		foreach ($data as $key => $value)
		{
			if(is_array($value))
			{
				$temp = self::secure_input($value);
				$secured_data[$key] = $temp;
			}
			else
			{
				$secured_data[$key] = trim($value);
				$secured_data[$key] = stripslashes($secured_data[$key]);
				$secured_data[$key] = htmlspecialchars($secured_data[$key]);
			}
		}
		return($secured_data);
	}
}
?>