<?php
include_once 'my_show_db.php';


$host = "localhost";
$username = "root";
$password = "root";
$db = "gecko";
$gecko = new PDO("mysql:host=".$host.";dbname=".$db, $username, $password);

//print_r(my_show_db($gecko,"Yann"));
$generator = my_show_db($gecko, "Superwoman42");
if($generator != NULL)
{
	foreach ($generator as $line)
	{
		echo $line;
	}
}
else
{
	echo "An error occured. Or there are no entries to return.\n";
}
?>
