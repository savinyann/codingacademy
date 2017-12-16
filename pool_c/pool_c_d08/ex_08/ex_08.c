#include <stdio.h>
#include <stdlib.h>

int	fib_rec(int n)
{
  int	y;
  
  if(n <= -1)
    {
      return(-1);
    }
  y = 0;
  if( n == 1)
    {
      return(1);
    }
  if( n > 1 )
    {
      y = fib_rec(n-2) + fib_rec(n-1);
    }
  return(y);
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
  y = fib_rec(n);
  printf("fib(%d) = %d\n", n, y);
}
*/
