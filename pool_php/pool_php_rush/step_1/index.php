<?php
session_start();
if(isset($_SESSION["user"]))
{
	echo "Hello ".$_SESSION["user"]["username"];
}
else
{
	header("Location: login.php");
}
?>
	<form method="post" action="logout.php">
		<p><input type="submit" value="Logout"></p>
	</form>