#include <stdio.h>
int	main(int argc, char **argv)
{
  int	i;

  i = 1;
  if(argc == 1)
    {
      printf("\n");
    }
  while( i < argc)
    {
      printf("%s\n", argv[i]);
      i++;
    }
}
