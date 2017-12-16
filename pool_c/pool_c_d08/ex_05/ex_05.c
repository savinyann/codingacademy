#include <stdio.h>
#include <stdlib.h>

int	my_power_it(int x, int n)
{
  int	y;

  if(n < 0)
    {
      return(-1);
    }
  y = 1;
  while(n != 0)
    {
      y = y * x;
      n--;
    }
  return(y);
}

/*
int	main(int c, char **nbr)
{
  int	x;
  int	n;
  int	y;

  if(c != 3)
    {
      printf("Error.\n");
      return(0);
    }
  x = atoi(nbr[1]);
  n = atoi(nbr[2]);
  y = my_power_it(x, n);
  printf("%d ^ %d = %d", x, n, y);
}
*/