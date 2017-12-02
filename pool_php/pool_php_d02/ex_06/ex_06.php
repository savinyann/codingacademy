<?php
function my_create_continent($continent_name, &$worldmap)
{
    $worldmap[$continent_name] = array();
}


function my_create_country($country_name,$continent_name, &$worldmap)
{
    $worldmap[$continent_name][$country_name] = array();
}


function my_create_city($city_name, $postalcode, $country_name, $continent_name, &$worldmap)
{
    $worldmap[$continent_name][$country_name][$city_name] = $postalcode;
}


function get_country_of_continent($continent_name, $worldmap)
{
    if(array_key_exists($continent_name, $worldmap))
        {
            return($worldmap[$continent_name]);
        }
    else
        {
            echo "Failure to get continent.\n";
            return(NULL);
        }
}


function get_cities_of_country($country_name, $continent_name, $worldmap)
{
    if(array_key_exists($continent_name, $worldmap))
        {
            if(array_key_exists($country_name, $worldmap[$continent_name]))
                {
                    return($worldmap[$continent_name][$country_name]);
                }
            else
                {
                    echo "Failure to get country.\n";
                    return(NULL);
                }
        }
    else
        {
            echo "Failure to get continent\n";
            return(NULL);
        }
}


function get_city_postal_code($city_name,$country_name,$continent_name,$worldmap)
{
    if(array_key_exists($continent_name, $worldmap))
        {
            if(array_key_exists($country_name, $worldmap[$continent_name]))
                {
                    if(array_key_exists($city_name, $worldmap[$continent_name][$country_name]))
                        {
                            return($worldmap[$continent_name][$country_name]);
                        }
                    else
                        {
                            echo "Failure to get city.\n";
                            return(NULL);
                        }
                }
            else
                {
                    echo "Failure to get country.\n";
                    return(NULL);
                }
        }
    else
        {
            echo "Failure to get continent\n";
            return(NULL);
        }
}


$map = array();
my_create_continent("Europe", $map);
my_create_country("France","Europe", $map);
my_create_city("Marseille","13000","France","Europe", $map);
var_dump($map);
echo "\n\n\n";
var_dump(get_country_of_continent("Europe", $map));
echo "\n\n\n";
var_dump(get_city_postal_code("Marseille","France","Europe", $map));
echo "\n\n\n";
var_dump(get_cities_of_country("Tokyo","Japon", $map));

?>