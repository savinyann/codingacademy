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

try
{
	$blopy = new Poring("Blopy");
	$isis = new Poring("Isis");
}
catch(Exception $e)
{
	echo $e->getMessage()."\n";
}

try
{
$blopy->attack($blopy);
$blopy->attack($isis);
$blopy->attack($isis);
$blopy->attack($isis);
$blopy->attack($isis);
$blopy->attack($isis);
$blopy->moveCloseTo($isis);
$blopy->attack($isis);
getparam($blopy);
getparam($isis);
$blopy->attack($isis);
$blopy->attack($isis);
getparam($blopy);
getparam($isis);
$blopy->recoverAP();
$blopy->recoverAP();
$blopy->recoverAP();
$blopy->recoverAP();
$blopy->recoverAP();
$blopy->recoverAP();
$blopy->recoverAP();
$blopy->recoverAP();

getparam($blopy);
$blopy->attack($isis);
$blopy->moveCloseTo($isis);
$blopy->attack($isis);
getparam($blopy);
getparam($isis);
getparam($isis);
echo "~~~~~~~~~~~~~~~~~~~\n";
$isis->attack($blopy);
echo "~~~~~~~~~~~~~~~~~~~\n";
$isis->moveCloseTo($blopy);
$isis->recoverAP();
$isis->equip();
}
catch(Exception $e)
{
	echo $e->getMessage()."\n";
}


function getparam($unit)
{
	echo $unit->getName()." a ".$unit->getHp()." PV et ".$unit->getAp()." PA. Elle inflige ".$unit->getDamage()." points de dégats en attaquant.\n";
}
?>