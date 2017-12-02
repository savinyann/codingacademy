#ifndef SECURITY_ANTI_MLT_INCLUDE
#define SECURITY_ANTI_MLT_INCLUDE
#include <stdio.h>
#include <stdlib.h>

int	matrices_addition(int **matrice, int col, int lin, int size, int dir);
int	def_global_dir(int dir);
int	col_addition(int **matrice, int col, int  lin, int size, int global_dir);
  int	lin_addition(int **matrice, int col, int  lin, int size, int global_dir);
int	dia_addition(int **matrice, int col, int  lin, int size, int global_dir);
int	adia_addition(int **matrice, int col, int  lin, int size, int global_dir);


#endif //SECURITY_ANTI_MLT_INCLUDE
