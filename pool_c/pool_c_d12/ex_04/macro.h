#ifndef SECURITY_ANTI_MLT_INCLUDE
#define SECURITY_ANTI_MLT_INCLUDE

#include <stdio.h>
#include <stdlib.h>

int	**split_array(int *array, int size, int *new_size1, int *new_size2);
int	count_nbr(int *array, int size, int type);
int	**sort_in_arrays(int **split_array, int *array, int size);

#define EVEN 0
#define ODD 1

#endif  //SECURITY_ANTI_MLT_INCLUDE
