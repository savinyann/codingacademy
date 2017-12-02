<?php
function my_create_map(...$array)
{
    $map = array();
    foreach($array as $value)
        {
            if(count($value)<2)
                {
                    echo "The given arguments aren't valid.\n";
                    return(NULL);
                }
            else
                {
                    $map[$value[0]] = $value[1];
                }
        }
    return($map);
}

/* $array1 = ["pi", 3.14]; */
/* $array2 = ["answer", 42]; */
/* $array3 = ["nothing", 42]; */
/* $map = my_create_map($array1, $array2, $array3); */
/* var_dump($map); */
?>