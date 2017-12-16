<?php
session_start();
if(isset($_SESSION["name"]))
{
	echo "Hello ".$_SESSION["name"];
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