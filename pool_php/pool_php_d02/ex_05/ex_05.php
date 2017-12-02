<?php

// Check if a key exist in an array.
function my_checking_valid_elem($key,$map)
{
    if(array_key_exists($key, $map))
        {
            return(TRUE);
        }
    else
        {
            return(FALSE);
        }
}


// Add $value in a new key in an array, if the key does not exist yet.
// Else, display error msg and return NULL.
function my_add_elem_map($key, $value, &$map)
{
    if(my_checking_valid_elem($key, $map))
        {
            echo "You have to give good parameters.\n";
        }
    else
        {
            $map[$key] = $value;
        }
    return($map);
}


// Replace a value in a existing key in an array by $value.
// If $key does not exist, display error msg and return NULL.
function my_modify_elem_map($key, $value, &$map)
{
    if(my_checking_valid_elem($key, $map))
        {
            $map[$key] = $value;
        }
    else
        {
            echo "You have to give good parameters.\n";
        }
    return($map);
}

// Delete a key from an array.
// If $key does not exist, display error msg and return NULL.
function my_delete_elem_map($key, &$map)
{
    if(my_checking_valid_elem($key, $map))
        {
            unset($map[$key]);
        }
    else
        {
            echo "You have to give good parameters.\n";
        }
    return($map);
}

function my_is_elem_valid($key, $value, $map)
{
    if(my_checking_valid_elem($key, $map))
        {
            if(array_key_exists($key, $map) && $map[$key] == $value)
                {
                    return(TRUE);
                }
            else
                {
                    return(FALSE);
                }
        }
    else
        {
            echo "You have to give good parameters.\n";
        }
    return($map);
}

/* $array = array(1,2,3,4,5,6,7,8,9); */
/* my_add_elem_map(18,123,$array); */
/* my_modify_elem_map(5,123,$array); */
/* my_delete_elem_map(0,$array); */
/* print_r($array); */
/* echo my_is_elem_valid(3, "4", $array),"\n"; */
?>