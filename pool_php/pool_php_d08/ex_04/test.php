<?php
//include_once 'db_pdo.php';

//$gecko = connect_db("localhost", "root", "root", "port", "gecko");
//$tables = $gecko->query('SHOW TABLES');
//$tables->fetch();
$host = "localhost";
$username = "root";
$password = "root";
$db = "gecko";

	$gecko = new PDO("mysql:host=".$host.";dbname=".$db, $username, $password);
	$tables = $gecko->query('SELECT name FROM users');
	echo get_class($tables)."\n";
	print_r($tables->fetch());
	print_r($tables->fetch());
	print_r($tables->fetch());
	print_r($tables->fetch());
?>