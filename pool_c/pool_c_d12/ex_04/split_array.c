#include "macro.h"

int	**split_array(int *array, int size, int *new_size1, int *new_size2)
{
  int	i;
  int	odd_number;
  int	even_number;
  int	**split_array;

  split_array = malloc(2 * sizeof(int *));
  if(split_array == NULL)
    {
      return(NULL);
    }
  odd_number = count_nbr(array, size, ODD);
  even_number = count_nbr(array, size, EVEN);
  split_array[0] = malloc(odd_number * sizeof(int));
  split_array[1] = malloc(even_number * sizeof(int));
  split_array = sort_in_arrays(split_array, array, size);
  *new_size1 = odd_number;
  *new_size2 = even_number;
  return(split_array);
}


int	count_nbr(int *array, int size, int type)
{
  int	i;
  int	count;
  
  i = 0;
  count = 0;
  while(i != size)
    {
      if(array[i] % 2 == type)
	{
	  count++;
	}
      i++;
    }
  return(count);
}


int	**sort_in_arrays(int **split_array, int *array, int size)
{
  int	i;
  int	even_number;
  int	odd_number;

  i = 0;
  even_number = 0;
  odd_number = 0;
  while(i != size)
    {
      if(array[i] % 2 == 0)
	{
	  split_array[1][even_number] = array[i];
	  even_number++;
	}
      else
	{
	  split_array[0][odd_number] = array[i];
	  odd_number++;
	}
      i++;
    }
  return(split_array);
}


/*
int	main()
{
  int	i;
  int	*nb_odd_nbr;
  int	*nb_even_nbr;
  int	array[] = {1,2,3,4,5,6,7,8,9,10,11,12,13,14,15};
  int	**sorted_nbr;

  nb_even_nbr = malloc(sizeof(int));
  nb_odd_nbr = malloc(sizeof(int));
  if(nb_even_nbr == NULL || nb_odd_nbr == NULL)
    {
      return(0);
    }
  i = 0;
  sorted_nbr = split_array(array, 15, nb_odd_nbr, nb_even_nbr);
  while(sorted_nbr[0][i] != '\0')
    {
      printf("%d, ", sorted_nbr[0][i]);
      i++;
    }
  printf("\n");
  i = 0;
    while(sorted_nbr[1][i] != '\0')
    {
      printf("%d, ", sorted_nbr[1][i]);
      i++;
    }
    free(nb_even_nbr);
    free(nb_odd_nbr);
    free(sorted_nbr[0]);
    free(sorted_nbr[1]);
    free(sorted_nbr);
  printf("\n");
}
*/