<?php
session_start();

if(isset($_SESSION["name"]))
{
	echo "Hello ".$_SESSION["name"];
}
elseif(isset($_COOKIE["name"]))
{
	echo "Hello ".$_COOKIE["name"];
	$_SESSION["name"] = $_COOKIE["name"];
}
else
{
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="logout.php">
		<p><input type="submit" value="Logout"></p>
	</form>

	<form method="post" action="modify_account.php">
		<p><input type="submit" value="Settings"></p>
	</form>
</body>
</html>