#include <unistd.h>
#include <stdio.h>

void	my_init(int *);  // change value of "int" to 42

void	my_init(int *a)
{
  int	*p;

  p = a;
  *p = 42;
}
