<?php
include('ex_01_2.php');

if($argc > 1)
    {
        my_included_putstr($argv[1]);
    }
else
    {
        return;
    }
?>