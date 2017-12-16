<?php
include "Astronaut.php";

$buzz = new Astronaut("Buzz");
$flash = new Astronaut("Flash");

echo $buzz->getId()." - ".$buzz->getDestination()."\n";
echo $flash->getId()." - ".$flash->getDestination()."\n";
?>