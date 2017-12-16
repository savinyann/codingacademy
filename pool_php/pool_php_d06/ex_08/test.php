<?php
include_once 'SpaceArena.php';

$arena = new SpaceArena();
$arena->enlistMonsters([new RadScorpion, new SuperMutant, new RadScorpion]);
$arena->enlistSpaceMarines([new TacticalMarine("Joe"), new AssaultTerminator("Abaddon"), new TacticalMarine("Rose")]);
$arena->fight();
$arena->enlistMonsters([new SuperMutant, new SuperMutant]);
$arena->fight();
?>