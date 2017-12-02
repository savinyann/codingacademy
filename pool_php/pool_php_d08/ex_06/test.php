<?php
include_once 'my_password_change.php';


$host = "localhost";
$username = "root";
$password = "root";
$db = "gecko";
$gecko = new PDO("mysql:host=".$host.";dbname=".$db, $username, $password);

echo (my_password_change($gecko, "bla@bla.fr", "menfou")) ? "Oui\n" : "Non\n";
?>