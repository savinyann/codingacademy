#include <unistd.h>
#include <stdio.h>
#include <stdlib.h>

void	my_putchar(char c);
void	sapin(int size);
int	n_base(int roof, int floor);
void	build_floor(int roof, int floor);
void	build_subfloor(int roof, int floor, int nb_base);
void	build_base(int roof);


void	my_putchar(char c)
{
  write(1, &c, 1);
}


void	sapin(int size)
{
  int	nb_base;

  if(size <= 0)
    {
      printf("First argument must be a positive number\n");
      return;
    }
  nb_base = n_base(size, size);
  build_floor(size, nb_base);
  build_base(size);
}


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
  int	floor;

  floor = 0;
  while(floor != roof)
    {
      build_subfloor(roof, floor, nb_base);
      floor++;
    }
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
      while(j != nb_base/2 + (floor + 1) / 2 - nb_floor/2 - sub_floor)
	{
	  my_putchar(' ');
	  j++;
	}
      j = 0;
      while(j != nb_floor + 2 * sub_floor - 2 * ((floor + 1) / 2))
	{
	  my_putchar('*');
	  j++;
	}
      my_putchar('\n');
      sub_floor++;
    }
}


void	build_base(int roof)
{
  int	i;
  int	j;
  int	width;
  int	offset;

  i = 0;
  width = (roof % 2 == 1) ? roof : roof + 1;
  offset = (n_base(roof, roof) - width) / 2;
  while(i != roof)
    {
      j = 0;
      while(j != offset)
	{
	  my_putchar(' ');
	  j++;
	}
      j = 0;
      while(j != width)
	{
	  my_putchar('|');
	  j++;
	}
      my_putchar('\n');
      i++;
    }
}


  int	main(int c, char **v)
{
  int	size;
  int	nb_base;

  if (c < 2)
    {
      printf("Error: Sapin takes its size as it first argument.\n");
      return(0);
    }
  
  size = atoi(v[1]);
  sapin(size);
}





