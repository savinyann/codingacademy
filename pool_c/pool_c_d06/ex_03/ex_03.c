#include <stdlib.h>
#include <unistd.h>
#include <stdio.h>

int	*my_up(int n);

int	*my_up(int n)
{
  int	*tab;

  tab = malloc(2);
  if(tab == NULL)
    {
      return(NULL);
    }
  tab[0] = n;
  tab[1] = 2 * n;
  return(tab);
}


/* int	main() */
/* { */
/*   int	n; */
/*   int	*tab; */
/*   n = 2485064; */

/*   tab = my_up(n); */
/*   printf("%d %d\n", tab[0], tab[1]); */
/*   free(tab); */
/* } */

