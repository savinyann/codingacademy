<?php
include_once "SQLquery.php";
include_once "db_pdo.php";
include_once "add_user.php";


$gecko = connect_db("gecko");
add_user("Yann23", "789101","yann.savin@coding-academy.fr",TRUE);


$users = SQLquery($gecko, "SELECT * FROM users");
while($user = $users->fetch())
{
	for ($i=0; $i < count($user)/2; $i++)
	{ 
		echo "$user[$i]\t";
	}
	echo "\n";
}
?>