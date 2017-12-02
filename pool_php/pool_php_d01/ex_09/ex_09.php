<?php
function print_movie_from_nbr($nbr)
{
    switch($nbr)
        {
        case 3:
            echo "The Three Brothers", "\n";
            break;
            
        case 6:
            echo "The Sixth Sense", "\n";
            break;

        case 23:
            echo "The Number 23", "\n";
            break;
            
        case 28:
            echo "28 Days Later", "\n";
            break;

          Default:
            echo "I don't know.", "\n";
            break;
        }
};
/*
print_movie_from_nbr(1);
print_movie_from_nbr(3);
print_movie_from_nbr(6);
print_movie_from_nbr(23);
print_movie_from_nbr(28);
print_movie_from_nbr(5000);
print_movie_from_nbr(0);
*/
?>