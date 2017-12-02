#include <stdio.h>
#include <stdlib.h>

int	**pascalTr(int size);
int	**alloc_tab(int size);
int	**filling_tab(int **pascal_tab, int size);
int	**filling_line(int **pascal_tab, int size, int i);



int	**pascalTr(int size)
{
  int	**pascal_tab;

  if(size <= 0)
    {
      return(NULL);
    }
  pascal_tab = alloc_tab(size);
  pascal_tab = filling_tab(pascal_tab, size);
  return(pascal_tab);
}


int	**alloc_tab(int size)
{
  int	**pascal_tab;
  int	i;

  i = 0;
  pascal_tab = malloc(size * sizeof(int *));
  if(pascal_tab == NULL)
    {
      return(NULL);
    }
  while(i != size)
    {
      pascal_tab[i] = malloc((i+1) * sizeof(int));
      if(pascal_tab[i] == NULL)
	{
	  return(NULL);
	}
      i++;
    }
  return(pascal_tab);
}


int	**filling_tab(int **pascal_tab, int size)
{
  int	i;

  i = 0;
  while(i != size)
    {
      pascal_tab = filling_line(pascal_tab, size, i);
      i++;
    }
  return(pascal_tab);
}


int	**filling_line(int **pascal_tab, int size, int i)
{
  int	j;

  j = 0;
  while(j <= i)
    {
      if(j != 0 && j != i)
	{
	  pascal_tab[i][j] = pascal_tab[i-1][j] + pascal_tab[i-1][j-1];
	}
      else
	{
	  pascal_tab[i][j] = 1;
	}
      j++;
    }
  return(pascal_tab);
}


/*
void	print_pascal_tab(int **table, int size)
{
  int	i;
  int	j;

  i = 0;
  while(i != size)
    {
      j = 0;
      while(j != i + 1)
	{
	  printf("%d\t", table[i][j]);
	  j++;
	}
      printf("\n");
      i++;
    }
}


int	main(int c, char **v)
{
  int	**pascal_tab;
  int	size;
  int	i;

  if(c != 2)
    {
      printf("ERROR: pascalTr take an number in first parameter.\n");
      return(0);
    }
  size = atoi(v[1]);
  pascal_tab = pascalTr(size);
  if(pascal_tab == NULL)
    {
      return(0);
    }
  print_pascal_tab(pascal_tab, size);
  i = 0;
  while(i != size)
    {
      free(pascal_tab[i]);
      i++;
    }
  free(pascal_tab);
}
*/
