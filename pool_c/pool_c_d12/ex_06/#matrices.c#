#include "helper.h"


int	matrices_addition(int **matrice, int col, int lin, int size, int dir)
{
  int global_dir;
  int sum;

  if(col >= size || lin >= size || dir < 0 || dir > 11)
    {
      return(0);
    }
  global_dir = def_global_dir(dir);
  if(dir == 0 || dir == 6)
    {
      sum = col_addition(matrice, col, lin, size, global_dir);
    }
  if(dir == 3 || dir == 9)
    {
      sum = lin_addition(matrice, col, lin, size, global_dir);
    }
  if(dir == 4 || dir == 5 || dir == 10 || dir == 11)
    {
      sum = dia_addition(matrice, col, lin, size, global_dir);
    }
  if(dir == 1 || dir == 2 || dir == 7 || dir == 8)
    {
      sum = adia_addition(matrice, col, lin, size, global_dir);
    }
    return(sum);
}


int	def_global_dir(int dir)
{
  if(dir < 6)
    {
      return(1);
    }
  else
    {
      return(-1);
    }
}


int	col_addition(int **matrice, int col, int  lin, int size, int global_dir)
{
  int	sum;

  sum = 0;
  while( col >= 0 && col < size)
    {
      sum = sum + matrice[col][lin];
      col = col + global_dir;
    }
  return(sum);
}


int	lin_addition(int **matrice, int col, int  lin, int size, int global_dir)
{
  int	sum;
  int	j;

  j = 0;
  sum = 0;
  while( lin >= 0 && lin < size)
    {
      sum = sum + matrice[col][lin];
      lin = lin + global_dir;
    }
  return(sum);
}


int	dia_addition(int **matrice, int col, int  lin, int size, int global_dir)
{
  int	sum;

  sum = 0;
  while( lin >= 0 && lin < size && col >= 0 && col < size)
    {
      sum = sum + matrice[col][lin];
      lin = lin + global_dir;
      col = col + global_dir;
    }
  return(sum);
}


int	adia_addition(int **matrice, int col, int  lin, int size, int global_dir)
{
  int	sum;

  sum = 0;
  while( lin >= 0 && lin < size && col >= 0 && col < size)
    {
      sum = sum + matrice[col][lin];
      lin = lin - global_dir;
      col = col + global_dir;
    }
  return(sum);
}


int	main()
{
  int	mat[6][6] = {
    {0,1,2,3,4,5},
    {6,7,8,9,10,11},
    {12,13,14,15,16,17},
    {18,19,20,21,22,23},
    {24,25,26,27,28,29}};
  int	*tab[5];

  tab[0] = mat[0];
  tab[1] = mat[1];
  tab[2] = mat[2];
  tab[3] = mat[3];
  tab[4] = mat[4];
  tab[5] = mat[5];
  printf("%d\n", matrices_addition(tab, 0,0,6,3));
  printf("%d\n", matrices_addition(tab, 0,0,6,6));
  printf("%d\n", matrices_addition(tab, 0,0,6,0));
  printf("%d\n", matrices_addition(tab, 3,3,6,11));
  printf("%d\n", matrices_addition(tab, 3,3,6,-2));
  printf("%d\n", matrices_addition(tab, 3,22,6,2));
}
