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

?>