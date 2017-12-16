<?php

function my_order_class_name(...$arg)
{
    $my_unsorted_array = my_gettype_unique(...$arg);
    $my_sorted_array_by_length = my_sort_array_by_length($my_unsorted_array);
    $my_sorted_array = my_sort_array($my_sorted_array_by_length);
    return ($my_sorted_array);
}


function my_sort_array($unsorted_array)
{
    sort($unsorted_array);
        for($i = 0; $i < count($unsorted_array); $i++)
        {
            natcasesort($unsorted_array[$i]);
        }
    return($unsorted_array);
}

function my_sort_array_by_length($unsorted_array)
{
    $my_sorted_array = array();
    foreach($unsorted_array as $value)
        {
            if(array_key_exists(strlen($value), $my_sorted_array))
                {
                    $i = count($my_sorted_array[strlen($value)]);
                    $my_sorted_array[strlen($value)][$i] = $value;
                }
            else
                {
                    $my_sorted_array[strlen($value)][0] = $value;
                }
        }
    return($my_sorted_array);
}


function my_gettype_unique(...$arg)
{
    $i = 0;
    $result = array();
    foreach($arg as $value)
        {
            if(!in_array(gettype($value),$result))
                {
                    if(gettype($value) == "object")
                        {
                            $result[$i] = get_class($value);
                        }
                    else
                        {
                            $result[$i] = gettype($value);
                        }
                    $i++;
                }
        }
            return($result);
}


class MyClass
{
};
$args =[
    TRUE,
    FALSE,
    new MyClass(),
    42,
    42.42,
    "bla",
    [1,2,3],
    NULL,
    array()
];

print_r(my_order_class_name(...$args));

?>