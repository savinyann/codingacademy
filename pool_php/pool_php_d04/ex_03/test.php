<?php
include "Mars.php";

$buzz = new chocolate\Mars("Buzz");
$flash = new chocolate\Mars("Flash");

$buzz2 = new planet\Mars("23 000 km");
$flash2 = new planet\Mars("15 000 km");

echo $buzz->getId()."\n";
echo $flash->getId()."\n";
echo $buzz2->getSize()."\n";
echo $flash2->getSize()."\n";
echo get_class($buzz)."\n";
?>