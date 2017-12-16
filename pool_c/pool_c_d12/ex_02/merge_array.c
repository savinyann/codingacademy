#include <stdio.h>
#include <stdlib.h>

int	*merge_array(int *arr1, int *arr2, int size1, int size2);
int	*cp_array(int *array, int *copy, int size_array, int i);


int	*merge_array(int *arr1, int *arr2, int size1, int size2)
{
  int	*new_array;
  
  new_array = malloc((size1 + size2) * sizeof(int));
  if(new_array == NULL)
    {
      return(NULL);
    }
  new_array = cp_array(arr1, new_array, size1, 0);
  new_array = cp_array(arr2, new_array, size2, size1);
  return(new_array);
}


int	*cp_array(int *array, int *copy, int size_array, int i)
{
  int	j;

  j = 0;
  while(j != size_array)
    {
      copy[i] = array[j];
      i++;
      j++;
    }
  return(copy);
}


/*
void	print_tab(int *tab, int n)
{
  int	i;

  i = 0;
  while(i != n)
    {
      printf("%d, ", tab[i]);
      i++;
    }
  printf("\n");
}


int	main()
{
  int	tab1[] = {0, 0, 2, 3, 4, 3, 6, 1};
  int	tab2[] = {9, 8, 7, 6, 5, 4, 3, 2, 1, 0};
  int	*tab;

  tab = merge_array(tab1, tab2, 8, 10);
  print_tab(tab);
  free(tab);
  return(0);
}
*/
