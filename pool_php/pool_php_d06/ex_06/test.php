<?php
include_once 'AssaultTerminator.php';
include_once 'TacticalMarine.php';

class Marine extends ASpaceMarine
{
 	public function __construct($name)
 	{
 		parent::__construct($name);
 		$this->hp = 25;
 		$this->ap = 25;
 	}


 	public function __destruct()
 	{
 		echo ($this->alive) ? "$this->name: Bwaaa, I'm dead\n" : "";
 	}
}


	$fannette = new TacticalMarine("Fannette");
	$nannette = new AssaultTerminator("Nannette");


	echo "--------- equip dagger ----------\n";
	getparam($fannette);
	echo "\n--------- self attack ----------\n";
	$fannette->attack($fannette);
	echo "\n--------- attack nannette ----------\n";
	$fannette->attack($nannette);
	$fannette->attack($nannette);
	getparam($nannette);
	echo "\n--------- nannette attack fannette ----------\n";
	$nannette->attack($fannette);
	getparam($nannette);






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