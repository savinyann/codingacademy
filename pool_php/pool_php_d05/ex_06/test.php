<?php
include_once 'Animal.php';

echo "\n------------- SHARK ------------------\n";
$whitesharky = new GreatWhite("WhiteSharky");
$bluesharky = new BlueShark("BlueSharky");
echo $bluesharky->getName()." has ".$bluesharky->getLegs()." legs and is a ".$bluesharky->getType().".\n";

echo "-------------------------------\n";
$bluesharky->status();
echo "-------------------------------\n";
echo "you should not do this.\n";
$bluesharky->smellBlood(TRUE);
$bluesharky->status();


echo "\n------------- CANARY ------------------\n";
$titi = new Canary("Titi");
for ($i=0; $i < 150; $i++)
{ 
	$titi->layEgg();
}
echo $titi->getName()." a pondu ".$titi->getEggsCount()." oeufs.\n";

echo "\n------------- BLUESHARK Eating ------------------\n";
$bluesharky->eat($titi);
$canary = new Animal("Canary",2,2);
$canary2 = new Animal("Canary2",2,2);
$nemo = new Animal("Nemo",0,Animal::FISH);
$bluesharky->eat($canary);
$bluesharky->eat($nemo);
$bluesharky->eat($bluesharky);
$bluesharky->status();


echo "\n------------- GREATWHITE Eating ------------------\n";
$whitesharky->eat($titi);
$whitesharky->eat($nemo);
$whitesharky->eat($bluesharky);


function getAnimals()
{
	Animal::getNumberOfAnimalsAlive();
	Animal::getNumberOfMammals();
	Animal::getNumberOfFishes();
	Animal::getNumberOfBirds();
}
?>