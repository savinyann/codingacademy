<?php
include_once "modify_user.php";
include_once "get_user.php";
session_start();

if(!isset($_SESSION["email"]) && !isset($_COOKIE["email"]))
{
	header("Location: login.php");
}

$user = get_user("gecko", "email", $_SESSION["email"]);

	$valid_password = FALSE;
	$valid_new_password = FALSE;
	$valid_name = FALSE;
	$valid_email = FALSE;


if(isset($_POST["name"]))
{
	if (strlen($_POST["name"]) >= 3 && strlen($_POST["name"]) <= 10)
	{
		$valid_name = TRUE;
	}
}
	

if(isset($_POST["email"]))
{
	if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST["email"]))
	{
		$valid_email = TRUE;
	}
}


if(isset($_POST["password"]))
{
	if (strlen($_POST["password"]) >= 3 && strlen($_POST["password"]) <= 10)
	{
		$valid_password = TRUE;
	}
}
	

if(isset($_POST["new_password"]) && isset($_POST["password_confirmation"]))
{
	if (strlen($_POST["new_password"]) >= 3 && strlen($_POST["new_password"] <= 10) && $_POST["new_password"] == $_POST["password_confirmation"])
	{
		$valid_new_password = TRUE;
	}
}
if($valid_name && $valid_email && $valid_password && $valid_new_password)
{
	$hashed_password = get_user("gecko", "email", $_SESSION["email"])["password"];
	if(!password_verify($_POST["password"], $hashed_password))
	{
		echo "Wrong password.";
	}
	else
	{
		$hashed_pwd = password_hash($_POST["new_password"],PASSWORD_DEFAULT);
		modify_user("gecko", $_POST["name"],$hashed_pwd,$_POST["email"], $_SESSION["email"]);
		$user = get_user("gecko", "email", $_POST["email"]);
		$_SESSION["name"] = $user["name"];
		$_SESSION["email"] = $user["email"];
		if(isset($_COOKIE["name"]))
		{
			setcookie("name", $_SESSION["name"], 300);
		}
	}

}
echo '
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
';
if(isset($_POST["name"]) || isset($_POST["email"]) || isset($_POST["password"]) ||isset($_POST["new_password"]))
{
	if(!$valid_name)
	{
		echo "Invalid name<br>";
	}
	if(!$valid_email)
	{
		echo "Invalid email<br>";
	}
	if(!$valid_password)
	{
		echo "Invalid password<br>";
	}
	if(!$valid_new_password)
	{
		echo "Invalid new password or password confirmation<br>";
	}
}
echo '
<form method="post">
	<p><label for="Name">Name : </label>
	<input type="text" value=';
	echo $user["name"];
	echo ' name="name" id="Name"/></p>
	<p><label for="email">E-mail : </label>
	<input type="text" value=';
	echo $user["email"];
	echo ' name="email" id="email"/></p>
	<p><label for="password">Password : </label>
	<input type="password" name="password" id="password"/></p>

	<p><label for="new_password">New password : </label>
	<input type="password" name="new_password" id="new_password"/></p>
	<p><label for="pass_conf">New password confirmation : </label>
	<input type="password" name="password_confirmation" id="pass_conf"/></p>
	<p><input type="submit" value="Submit"></p>
</form>
<form action="index.php">
	<p><input type="submit" value="Cancel"></p>
</form>
</body>
</html>
';
?>