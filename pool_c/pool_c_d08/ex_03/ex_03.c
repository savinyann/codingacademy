#include "abs.h"
#include <stdio.h>


int	main()
{
  int	n;

  n = MY_ABS(-21);
  printf("n = %d\n", n);
  n = MY_ABS(-1512);
  printf("n = %d\n", n);
  n = MY_ABS(0);
  printf("n = %d\n", n);
  n = MY_ABS(-98);
  printf("n = %d\n", n);
  n = MY_ABS(-42);
  printf("n = %d\n", n);
}
