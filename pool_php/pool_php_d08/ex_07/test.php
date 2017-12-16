<?php
include_once 'my_change_user.php';


$yann = array
(
"Yann24","Yann252","Yann26","Yann332","Yann58","Yann402","Yann04","Yann122","Yann66","Yann702","Yann41","Yann187","Yann28","Yann000");


$host = "localhost";
$username = "root";
$password = "root";
$db = "gecko";
$gecko = new PDO("mysql:host=".$host.";dbname=".$db, $username, $password);

$change_user = my_change_user($gecko, "superwoman", "vanille", "admin", "Serge");

print_r($change_user);

?>