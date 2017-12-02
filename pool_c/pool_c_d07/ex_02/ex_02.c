#include <stdio.h>
#include <stdlib.h>
// Si programme refusé, faire un while(argv[i] != \0) if(48<=arg[i]<=57)
void	my_hello(int c, char **nbr);

void	my_hello(int c, char **nbr)
{
  
  int	i;

  if(c != 2)
    {
      printf("Error.\n");
    }
  else
    {
      i = atoi(nbr[1]);
      if( i <= 0)
	{
	  printf("Error.\n");
	}
      else
	{
	  while( i != 0)
	    {
	      printf("Hello\n");
	      i--;
	    }
	}
    }
}

int	main(int argc, char **argv)
{
  my_hello(argc, argv);
}
