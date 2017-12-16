<?php
session_start();
echo "Hello ";
if(isset($_GET["name"]))
{
	$_SESSION["name"] = $_GET["name"];
	echo $_SESSION["name"];
}
elseif(isset($_SESSION["name"]))
{
	echo $_SESSION["name"];
}
else
{
	echo "platypus";
}
?>