<?php
include_once 'RadScorpion.php';
include_once 'TacticalMarine.php';
include_once 'AssaultTerminator.php';
include_once 'SuperMutant.php';

$supermutant1 = new SuperMutant;
$supermutant2 = new SuperMutant;
$fannette = new TacticalMarine("Fannette");
$nannette = new AssaultTerminator("Nannette");

echo "---------- getparam RadScorpion ----------\n";
getparam($supermutant1);
getparam($supermutant2);

echo "\n---------- Attack on TacticalMarine ----------\n";
$supermutant1->moveCloseTo($fannette);
$supermutant1->attack($fannette);
$supermutant1->attack($fannette);
getparam($supermutant1);
getparam($fannette);

echo "\n---------- Attack on TacticalMarine ----------\n";
$fannette->moveCloseTo($supermutant1);
$fannette->attack($supermutant1);
$fannette->attack($supermutant1);
getparam($supermutant1);


echo "\n---------- SuperMutant recovering ----------\n";
$supermutant1->recoverAP();
$supermutant1->recoverAP();
getparam($supermutant1);
$supermutant1->recoverAP();
$supermutant1->recoverAP();
getparam($supermutant1);
$supermutant1->recoverAP();
getparam($supermutant1);

/*
echo "\n---------- Attack on AssaultTerminator ----------\n";
$supermutant2->moveCloseTo($nannette);
$supermutant2->attack($nannette);
getparam($supermutant2);
getparam($nannette);
*/







function getweapon($weapon)
{
	echo $weapon->getName()." est une arme infligeant ".$weapon->getDamage()." points de dégats par attaque et coutant ".$weapon->getApcost()." point d'action par attaque.\n";
}


function getparam($unit)
{
	if(is_A($unit,"ASpaceMarine"))
	{
		echo $unit->getName()." a ".$unit->getHp()." PV et ".$unit->getAp()." PA. Elle est équipé de ".$unit->getWeapon()->getName()." et inflige ".$unit->getWeapon()->getDamage()." points de dégats en attaquant.\n";
	}
	else
	{
	echo $unit->getName()." a ".$unit->getHp()." PV et ".$unit->getAp()." PA. Elle inflige ".$unit->getDamage()." points de dégats en attaquant.\n";
	}
}
?>