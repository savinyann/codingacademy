<?php
include_once 'my_print_users.php';


$host = "localhost";
$username = "root";
$password = "root";
$db = "gecko";
$gecko = new PDO("mysql:host=".$host.";dbname=".$db, $username, $password);
my_print_users($gecko, 188);
?>