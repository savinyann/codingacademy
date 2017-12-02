<?php
include_once "log_user.php";

	$valid_email = FALSE;
	$valid_name = FALSE;
	$valid_password = FALSE;

if(isset($_POST["logmail"]))
{
	if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", strtolower($_POST["logmail"])))
	{
		$valid_email = TRUE;
	}
	elseif(isset($_POST["logmail"]) && strlen($_POST["logmail"]) >= 3 && strlen($_POST["logmail"]) <= 20 )
	{
		$valid_name = TRUE;
	}
}


if(isset($_POST["password"]))
{
	if (strlen($_POST["password"]) >= 4 && strlen($_POST["password"]) <= 12)
	{
		$valid_password = TRUE;
	}
}

if(($valid_email || $valid_name) && $valid_password)
{
	$user = ($valid_email) ? log_user("email",$_POST["logmail"],$_POST["password"]) : log_user("username",$_POST["logmail"],$_POST["password"]);
	if(isset($user))
	{
		session_start();
		$_SESSION["user"] = $user;
		header("Location: index.php");
	}
	else
	{
		echo "<br>Wrong password.<br>";
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
if(isset($_POST["logmail"]) || isset($_POST["password"]))
{
	if(!$valid_email)
	{
		echo "Invalid email<br>";
	}
	if(!$valid_password)
	{
		echo "Invalid password<br>";
	}
}
echo '
<form method="post">
	<p><label for="logmail">Login / Email : </label>
	<input type="text" value=';
	echo ($valid_email) ? $_POST["username"] : "Login/Email";
	echo ' name="logmail" id="logmail"/></p>

	<p><label for="password">Password : </label>
	<input type="password" value="password" name="password" id="password"/></p>

	<p><input type="submit" value="Submit"></p>
</form>

<form action="inscription.php"
	<p><input type="submit" value="Subscribe"></p>
</form>
</body>
</html>
';
?>
