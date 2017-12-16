<?php
include_once 'AWeapon.php';

try
{
	$lightsaber = new AWeapon("LightSaber", 10000, 999999);
	//$infinity_edge = new AWeapon("Lame d'infinie", "13 000 PO", 50);
}
catch(Exception $e)
{
	echo $e->getMessage()."\n";
}
getstat($lightsaber);

function getstat($Weapon)
{
	echo $Weapon->getName()." coute ".$Weapon->getApcost()." et inflige ".$Weapon->getDamage()." de dégats par attaque. Est-ce une arme de corps à corps ? ".(($Weapon->getMelee()) ? "Oui" : "Non")." !\n";
}
?>