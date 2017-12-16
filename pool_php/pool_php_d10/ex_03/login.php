<?php
include_once "log_user.php";

	$valid_email = FALSE;
	$valid_password = FALSE;


if(isset($_POST["email"]))
{
	if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST["email"]))
	{
		$valid_email = TRUE;
	}
}
	

if(isset($_POST["password"]))
{
	if (strlen($_POST["password"]) >= 3 && strlen($_POST["password"] <= 10))
	{
		$valid_password = TRUE;
	}
}

if($valid_email && $valid_password)
{
	$user = log_user($_POST["email"],$_POST["password"]);
	if(isset($user))
	{
		session_start();
		$_SESSION["name"] = $user;
		header("Location: index.php?name=$user");
	}
	else
	{
		echo "<br>Wrong password<br>";
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
if(isset($_POST["email"]) || isset($_POST["password"]))
{
	if(!$valid_email)
	{
		echo "Invalid email<br>";
	}
	if(!$valid_password)
	{
		echo "Invalid password or password confirmation<br>";
	}
}
$_POST["bla"] = "truc";
echo '
<form method="post">
	<p><label for="email">E-mail : </label>
	<input type="text" value=';
	echo ($valid_email) ? $_POST["email"] : "email";
	echo ' name="email" id="email"/></p>

	<p><label for="password">Password : </label>
	<input type="password" value="password" name="password" id="password"/></p>

	<p><input type="submit" value="Submit"></p>
</form>
</body>
</html>
';
?>