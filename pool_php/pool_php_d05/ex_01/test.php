<?php
include_once 'Animal.php';

$ramses = new Animal("Ramsès",4,0);
$masha = new Animal("Masha",4,0);
$foenix = new Animal("Foenix",2,2);
$nemo = new Animal("Nemo",0,1);

echo $ramses->getName()." has ".$ramses->getLegs()." legs and is a ".$ramses->getType().".\n";
echo $masha->getName()." has ".$masha->getLegs()." legs and is a ".$masha->getType().".\n";
echo $foenix->getName()." has ".$foenix->getLegs()." legs and is a ".$foenix->getType().".\n";
echo $ramses->getName()." has ".$nemo->getLegs()." legs and is a ".$nemo->getType().".\n";
?>