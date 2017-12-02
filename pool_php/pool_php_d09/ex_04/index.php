<?php
include_once "ex_04.php";

session_start();
echo "Hello ";
if(!empty($_GET["name"]))
{
	$_SESSION["name"] = $_GET["name"];
	echo $_SESSION["name"];
}
elseif(!empty($_SESSION["name"]))
{
	echo $_SESSION["name"];
}
else
{
	echo "platypus";
}


if(isset($_GET["reset"]))
{
	remove_session();
}
?>