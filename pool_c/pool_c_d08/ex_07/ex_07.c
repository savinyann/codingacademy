#include <stdio.h>
#include <stdlib.h>

int	fib_it(int n)
{
  int	y0;
  int	y1;
  int	tmp;

  y0 = 0;
  y1 = 1;
  tmp = 0;
  if(n < 0)
    {
      return(-1);
    }
  if(n == 0)
    {
      return(0);
    }
  while(n != 1)
    {
      tmp = y1;
      y1 = y0 + y1;
      y0 = tmp;
      n--;
    }
  return(y1);
}

/*
int	main(int c, char **nbr)
{
  int	n;
  int	y;

  if(c != 2)
    {
      printf("Error.\n");
      return(0);
    }
  n = atoi(nbr[1]);
  y = fib_it(n);
  printf("fib(%d) = %d\n", n, y);
}
*/
