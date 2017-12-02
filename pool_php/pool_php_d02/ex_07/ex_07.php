<?php

function my_division_modulo($first_nbr, $oper_char, $second_nbr)
{
    if($second_nbr == 0)
        {
            throw new Exception("The given arguments aren't good.\n");
        }
    else
        {
            switch($oper_char)
                {
                case "/":
                    return(($first_nbr-($first_nbr%$second_nbr))/$second_nbr);
                    break;

                case "%":
                    return($first_nbr % $second_nbr);
                    break;

                Default:
                    throw new Exception("The given arguments aren't good.\n");
                    break;
                }
        }
}
//my_division_modulo($argv[1], $argv[2], $argv[3]);
/*
try
{
echo my_division_modulo(127, "/", 3);
echo my_division_modulo(127, "%", 3);
echo my_division_modulo(127, "*", 3);
echo my_division_modulo(127, "/", 0);
}
catch(Exception $e)
{
    echo $e->getMessage();
}*/
?>