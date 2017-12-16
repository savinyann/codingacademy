#include <stdio.h>
#include <stdlib.h>
#include "rubiks.h"

void	print_tab(int **table)
{
  int	i;
  int	j;
  i = 0;
  printf("-----------------\n");
  while(i != 4)
    {
      printf("| %d | %d ",table[i][0], table[i][1]);
      printf("| %d | %d |\n",table[i][2], table[i][3]);
      printf("-----------------\n");
      i++;
    }
}



int	main()
{
  int	**table;
  int	i;
  int	j;

  i = 0;
  table = malloc(5 *sizeof(int *));
  if(table == NULL)
    {
      return(0);
    }
  while(i != 4)
    {
      j = 0;
      table[i] = malloc(5 * sizeof(int));
      if(table[i] == NULL)
	{
	  return(0);
	}
      table[i][j] = '\0';
      i++;
    }
  table[i] = NULL;
  i = 0;
  while(i != 4)
    {
      j = 0;
      while(j != 4)
	{
	  if(i < 2 && j < 2)
	    {
	      table[i][j] = 0;
	    }
	  
	  if(i < 2 && j >= 2)
	    {
	      table[i][j] = 1;
	    }
	  
	  if(i >= 2 && j < 2)
	    {
	      table[i][j] = 2;
	    }
	  
	  if(i >= 2 && j >= 2)
	    {
	      table[i][j] = 3;
	    }
	  j++;
	}
      i++;
    }
  print_tab(table);
  return(0);
}
