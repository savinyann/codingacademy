<?php
include_once("ex_06.php");

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

if(isset($_GET["eat_cookie"]))
{
	remove_cookie("name");
	echo "<br>The cookie was delicious !<br>";
}
?>