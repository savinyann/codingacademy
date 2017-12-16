#include <unistd.h>
#include <stdlib.h>
#include <stdio.h>

void	my_putchar(char c);
int	n_base(int roof, int floor);
void	build_floor(int roof, int floor);
void	build_subfloor(int roof, int floor, int nb_base);



int	n_base(int roof, int floor)
{
  int	nb_leaves;
  
  if(floor == 0)
    {
      return(1);
    }  
  if(floor <= roof)
    {
      nb_leaves = n_base(roof, floor - 1) + 2 * (floor + 2) - 2 * (floor / 2);
    }
  return(nb_leaves);
}


void	build_floor(int roof, int nb_base)
{
  build_subfloor(roof, 0, nb_base);
}

void	build_subfloor(int roof, int floor, int nb_base)
{
  int	sub_floor;
  int	nb_floor;
  int	j;

  
  nb_floor = n_base(roof, floor);
  sub_floor = 0;
  while(sub_floor != floor + 4)
    {
      j = 0;
      while(j != nb_base/2 + floor / 2 - sub_floor)	// Affichage des espaces
	{
	  my_putchar(' ');
	  j++;
	}
      j = 0;
      while(j != nb_floor + 2 * sub_floor)		// Affichage des étoiles
	{
	  my_putchar('*');
	  j++;
	}
      my_putchar('\n');
      sub_floor++;
    }
}


  int	main(int c, char **v)
{
  int	roof;
  int	nb_base;
  
  if (c != 2)
    {
      printf("Error: wrong parameters number.\n");
      return(0);
    }
  roof = atoi(v[1]);
  nb_base = n_base(roof, roof);
  printf("Le nombre de feuilles a la base du premier etage est de %d\n", nb_base);
  build_floor(roof, nb_base);
}



void	my_putchar(char c)
{
  write(1, &c, 1);
}

