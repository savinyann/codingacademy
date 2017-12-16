<?php
include_once 'Animal.php';

echo "\n------------- SHARK ------------------\n";
$sharky = new Shark("Sharky");
echo $sharky->getName()." has ".$sharky->getLegs()." legs and is a ".$sharky->getType().".\n";

echo "-------------------------------\n";
$sharky->status();
echo "-------------------------------\n";
echo "you should not do this.\n";
$sharky->smellBlood(1);
$sharky->status();


echo "\n------------- CANARY ------------------\n";
$titi = new Canary("Titi");
for ($i=0; $i < 150; $i++)
{ 
	$titi->layEgg();
}
echo $titi->getName()." a pondu ".$titi->getEggsCount()." oeufs.\n";

echo "\n------------- SHARK EATING ------------------\n";
$sharky->eat($titi);
$canary = new Animal("Canary",2,2);
$canary2 = new Animal("Canary2",2,2);
$sharky->eat($canary);
$sharky->eat($canary);
$sharky->eat($sharky);
$sharky->status();

function getAnimals()
{
	Animal::getNumberOfAnimalsAlive();
	Animal::getNumberOfMammals();
	Animal::getNumberOfFishes();
	Animal::getNumberOfBirds();
}
?>