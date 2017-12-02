<?php
include_once "ex_07.php";

echo "Hello ";
if(isset($_GET["name"]))
{
	setcookie("name", $_GET["name"], time() + 300);
	echo $_GET["name"];
}
elseif(isset($_COOKIE["name"]))
{
	echo $_COOKIE["name"];
}
else
{
	echo "platypus";
}

if(isset($_GET["cookie"]))
{
	modify_cookie("name", $_GET["cookie"]);
	echo "<br>Cookie was changed<br>";
}
?>