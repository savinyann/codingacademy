<?php
header("Content-Type: application/json; charset=UTF-8");

$my_name["name"] = "Yann";

$my_encoded_name = json_encode($my_name);
echo $my_encoded_name;

?>