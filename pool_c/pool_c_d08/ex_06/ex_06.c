#include <stdio.h>
#include <stdlib.h>

int	my_power_rec(int x, int n)
{
  if(n < 0)
    {
      return(-1);
    }
  if(n != 0)
    {
      x = x * my_power_rec(x, n-1);
      return(x);
    }
  return(1);
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
  y = my_power_rec(x, n);
  printf("%d ^ %d = %d", x, n, y);
}
*/
