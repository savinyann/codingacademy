#include <stdlib.h>
#include <unistd.h>
#include <stdio.h>

void	my_show_address(int *n);

void	my_show_address(int *n)
{
  printf("%p\n", n);
}

/*
int	main()
{
  int	n;

  n = 1215641;
  my_show_address(&n);
}
*/
