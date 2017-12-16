<?php
include_once "add_user.php";

	$valid_name = FALSE;
	$valid_email = FALSE;
	$valid_password = FALSE;


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
	

if(isset($_POST["password"]) && isset($_POST["password_confirmation"]))
{
	if (strlen($_POST["password"]) >= 3 && strlen($_POST["password"] <= 10) && $_POST["password"] == $_POST["password_confirmation"])
	{
		$valid_password = TRUE;
	}
}

if($valid_name && $valid_email && $valid_password)
{
	$hashed_pwd = password_hash($_POST["password"],PASSWORD_DEFAULT);
	add_user($_POST["name"],$hashed_pwd,$_POST["email"],"CURRDATE()", FALSE);
	echo "User created<br>";
}
echo '
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css.css">
	<title>Ex_01 - inscriptions</title>
</head>
<body>
<p>Inscriptions</p>
';
if(isset($_POST["name"]) || isset($_POST["email"]) || isset($_POST["password"]))
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
		echo "Invalid password or password confirmation<br>";
	}
}
echo '
<form method="post">
	<p><label for="Name">Name : </label>
	<input type="text" value=';
	echo ($valid_name) ? $_POST["name"] : "name";
	echo ' name="name" id="Name"/></p>
	<p><label for="email">E-mail : </label>
	<input type="text" value=';
	echo ($valid_email) ? $_POST["email"] : "email";
	echo ' name="email" id="email"/></p>
	<p><label for="password">Password : </label>
	<input type="password" value="password" name="password" id="password"/></p>
	<p><label for="pass_conf">Password_confirmation : </label>
	<input type="password" value="password_confirmation" name="password_confirmation" id="pass_conf"/></p>
	<p><input type="submit" value="Submit"></p>
</form>
</body>
</html>
';
?>