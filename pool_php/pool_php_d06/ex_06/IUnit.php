<?php

interface IUnit
{
	public function equip($equipement);

	public function attack($target);

	public function receiveDamage($damage);

	public function moveCloseTo($target);

	public function recoverAP();
}
?>