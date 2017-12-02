<?php

// Display all the values of an array.
function print_array($my_array)
{
    foreach($my_array as $str)
        {
            echo $str;
        }
    echo "\n";
};


// Add two values in an array after its last value.
function concat_array($my_array, $value1, $value2)
{
    $lenght = count($my_array);
    $my_array[$lenght+1] = $value1;
    $my_array[$lenght+2] = $value2;
    return($my_array);
}


function sequence($nbr)
{
    if($nbr<0)
    {
        return;
    }
    if($nbr == 0)
            $curr_array = array(1);
    else
        {
            $prev_array = sequence($nbr - 1);
            $value = 0;
            $count = 0;
            foreach($prev_array as $digit)
            {
                if($digit == $value)
                        $count++;
                else
                    {
                        $curr_array = ($count == 0) ? array() : concat_array($curr_array, $count, $value);
                        $count = 1;
                        $value = $digit;
                    }
            }
            $curr_array = concat_array($curr_array, $count, $value);
        }
    print_array($curr_array);
    return($curr_array);
};

/*
if($argc <= 1)
{
    return;
}
$nbr = $argv[1];

sequence($nbr);
*/
?>