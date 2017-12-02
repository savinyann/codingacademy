<?php
include_once 'AWeapon.php';
include_once 'IUnit.php';

class Poring extends AMonster
 {
 	public function __construct($name)
 	{
 		parent::__construct($name);
 		$this->hp = 50;
 		$this->ap = 30;
 		$this->damage = 15;
 		$this->apcost = 15;
 	}
 }

 class Marine extends ASpaceMarine
 {
 	public function __construct($name)
 	{
 		parent::__construct($name);
 		$this->hp = 25;
 		$this->ap = 25;
 	}
 }



try
{
	$fannette = new Marine("Fannette");
	$nannette = new Marine("Nannette");
	$bow1 = new PlasmaRifle;
	$bow2 = new PlasmaRifle;
	$dagger1 = new PowerFist;
	$dagger2 = new PowerFist;
	$blopy = new Poring("Blopy");
	$isis = new Poring("Isis");
	$xannette = new Poring("Xannette");
}
catch(Exception $e)
{
	echo $e->getMessage()."\n";
}

try
{
	echo "--------- equip dagger ----------\n";
	$fannette->equip($dagger1);
	$nannette->equip($bow1);
	getWeapon($dagger1);
	getparam($fannette);
	getparam($nannette);
	echo "\n--------- move/attack ----------\n";
	$fannette->attack($isis);
	$fannette->moveCloseTo($isis);
	$fannette->attack($isis);
	echo "\n--------- get param ----------\n";
	getparam($fannette);
	getparam($isis);
	echo "\n--------- change weapon ----------\n";
	$fannette->attack($blopy);
	$fannette->equip($bow1);
	$fannette->attack($blopy);
	$fannette->equip($bow2);
	$fannette->attack($blopy);
	getparam($fannette);
	getparam($blopy);
	$fannette->recoverAP();
	$fannette->recoverAP();
	$fannette->recoverAP();
	$fannette->recoverAP();
	$fannette->recoverAP();
	$fannette->recoverAP();
	$fannette->recoverAP();
	$fannette->recoverAP();
	$fannette->recoverAP();
	$fannette->recoverAP();
	$fannette->recoverAP();
	$fannette->recoverAP();
	$fannette->recoverAP();
	$fannette->recoverAP();
	$fannette->recoverAP();
	$fannette->recoverAP();

	getparam($fannette);
	echo "\n--------- attack string ----------\n";
//	$fannette->attack("string");
	$xannette->attack("string");
	echo "\n--------- self attack ----------\n";
	$fannette->attack($fannette);
	echo "\n--------- attack nannette ----------\n";
	$fannette->attack($nannette);
	$fannette->attack($nannette);
	getparam($nannette);
	echo "\n--------- nannette attack fannette ----------\n";
	$nannette->attack($fannette);
	getparam($nannette);
}
catch(Exception $e)
{
	echo $e->getMessage()."\n";
}

function getweapon($weapon)
{
	echo $weapon->getName()." est une arme infligeant ".$weapon->getDamage()." points de dégats par attaque et coutant ".$weapon->getApcost()." point d'action par attaque.\n";
}


function getparam($unit)
{
	if(is_A($unit,"Marine"))
	{
		echo $unit->getName()." a ".$unit->getHp()." PV et ".$unit->getAp()." PA. Elle est équipé de ".$unit->getWeapon()->getName()." et inflige ".$unit->getWeapon()->getDamage()." points de dégats en attaquant.\n";
	}
	else
	{
	echo $unit->getName()." a ".$unit->getHp()." PV et ".$unit->getAp()." PA. Elle inflige ".$unit->getDamage()." points de dégats en attaquant.\n";
	}
}
?>