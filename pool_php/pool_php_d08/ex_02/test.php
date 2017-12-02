<?php
include_once 'ex_02.php';

$hash = my_password_hash("Squetuveux");

print_r($hash);

var_dump(my_password_verify("untrucdifferent", $hash["salt"], $hash["hashed password"]));

?>