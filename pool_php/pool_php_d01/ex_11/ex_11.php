<?php
function my_print_args(...$argv)
{
    $i=0;
    foreach($argv as $value)
        {
            if ($i != 0)
                {
                    echo $value,"\n";
                }
            $i++;
        }
};

my_print_args(...$argv);
?>