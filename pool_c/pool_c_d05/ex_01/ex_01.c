#include <unistd.h>
#include <stdio.h>
int	array_sum(int *,int);	// return sum of the integers in *tab


int	array_sum(int *tab,int size)
{
  int	n;
  int	a;

  n = 0;
  a = 0;
  while (n < size)
    {
      a = a + tab[n];
      n++;
    }
  return (a);
}

/*
int	main()
{
  int tab[3] = {3, 4, 5};
  printf("%d\n", array_sum(tab,3));
}
*/
