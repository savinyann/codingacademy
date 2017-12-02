<?php
include_once 'AWeapon.php';

try
{
	$shiro = new PlasmaRifle();
	$knucles = new PowerFist();
	
}
catch(Exception $e)
{
	echo $e->getMessage()."\n";
}
getstat($shiro);
getstat($knucles);

function getstat($Weapon)
{
	echo $Weapon->getName()." coute ".$Weapon->getApcost()." d'AP, inflige ".$Weapon->getDamage()." points de dégats par attaque et ".(($Weapon->getMelee()) ? "est une arme de melee" : "est une arme à distance")."!\n";
}
?>