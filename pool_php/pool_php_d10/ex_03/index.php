<?php
session_start();
if(isset($_SESSION["name"]))
{
	echo "Hello ".$_SESSION["name"]."<br>";
}
elseif(isset($_GET["name"]))
{
	$_SESSION["name"] = $_GET["name"];
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