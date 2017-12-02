<?php
include "Phobos.php";

$chocolate0 = new chocolate\Mars("Buzz");
$chocolate1 = new chocolate\Mars("Flash");
$chocolate2 = new chocolate\Mars("Flash");

$planet0 = new planet\Mars("23 000 km");
$planet1 = new planet\Mars("15 000 km");
$planet2 = new planet\Mars("15 000 km");

echo gettype($planet0)." - ".get_class($planet0)."\n";
echo $planet0->getSize()."\n";
$Phobos = new planet\moon\Phobos($planet0);


/*
echo $chocolate0->getId()."\n";
echo $chocolate1->getId()."\n";
echo $chocolate2->getId()."\n";
echo $planet0->getSize()."\n";
echo $planet1->getSize()."\n";
echo $planet2->getSize()."\n";
echo $buzz->getId()."\n";
echo $aldrin->getId()."\n";
echo $houston->getId()."\n";
echo get_class($buzz)."\n";
echo "---- Houston, do nothing ! ----\n";
$houston->doActions();
echo "---- Buzz, go on a new planet! ----\n";
$buzz->doActions($planet1);
echo "---- Aldrin, take a snack ! ----\n";
$aldrin->doActions($chocolate2);
echo "Astonaut #".$buzz->getId()." va explorer la planète dont la taille est de ".$buzz->getDestination()->getSize()."\n";
*/
?>