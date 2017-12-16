<?php
include_once 'Animal.php';


getAnimals();


echo "\n -------------------------------\n";
$ramses = new Animal("Ramsès",4,0);
echo $ramses->getName()." has ".$ramses->getLegs()." legs and is a ".$ramses->getType().".\n";


echo "\n -------------------------------\n";
$masha = new Animal("Masha",4,0);
echo $masha->getName()." has ".$masha->getLegs()." legs and is a ".$masha->getType().".\n";
getAnimals();


echo "\n -------------------------------\n";
$plume = new Animal("Plume",2,2);
echo $plume->getName()." has ".$plume->getLegs()." legs and is a ".$plume->getType().".\n";


echo "\n -------------------------------\n";
$foenix = new Animal("Foenix",2,2);
echo $foenix->getName()." has ".$foenix->getLegs()." legs and is a ".$foenix->getType().".\n";
getAnimals();


echo "\n -------------------------------\n";
$nemo = new Animal("Nemo",0,1);
echo $nemo->getName()." has ".$nemo->getLegs()." legs and is a ".$nemo->getType().".\n";


echo "\n -------------------------------\n";
$dory = new Animal("Dory",0,1);
echo $dory->getName()." has ".$dory->getLegs()." legs and is a ".$dory->getType().".\n";
ggetAnimals();
echo "~~~~~~~~~~~~~~~~~~~~~\n";
$masha->__DESTRUCT();
$foenix->__DESTRUCT();
$dory->__DESTRUCT();
getAnimals();


function getAnimals()
{
	Animal::getNumberOfAnimalsAlive();
	Animal::getNumberOfMammals();
	Animal::getNumberOfFishes();
	Animal::getNumberOfBirds();
}
?>