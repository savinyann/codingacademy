<?php
include("Gecko.php");

$alx = new Gecko("Alex");
for($age=0; $age<=14; $age++)
    {
        $alx->setAge($age);
        echo $alx->getAge()." ans  -  ";
        $alx->status();
    }
?>