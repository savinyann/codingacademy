<?php
echo "Hello ";
if(isset($_GET["name"]))
{
	setcookie("name", $_GET["name"], time() + 300);
	echo $_COOKIE["name"];
}
elseif(isset($_COOKIE["name"]))
{
	echo $_COOKIE["name"];
}
else
{
	echo "platypus";
}
?>