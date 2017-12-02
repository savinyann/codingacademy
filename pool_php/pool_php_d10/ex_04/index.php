<?php
session_start();

if(isset($_GET["name"]))
{
	echo "Hello ".$_GET["name"];;
}
elseif(isset($_SESSION["name"]))
{
	echo "Hello ".$_SESSION["name"];
}
elseif(isset($_COOKIE["name"]))
{
	echo "Hello ".$_COOKIE["name"];
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
</body>
</html>