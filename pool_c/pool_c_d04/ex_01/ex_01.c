#include <unistd.h>
#include <stdio.h>

void	my_swap(int *, int *);	// swap value between "int"

void	my_swap(int *a, int *b)
{
  int	c;

  c = *a;
  *a = *b;
  *b = c;
}

/*
int	main()
{
  int	nb1 = 42;
  int	nb2 = 24;

  printf("%d - %d\n", nb1, nb2);
  my_swap(&nb1, &nb2);
  printf("%d - %d\n", nb1, nb2);
}
*/
