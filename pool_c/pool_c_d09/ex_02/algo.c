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


void	algo_line(int **table, int line)
{
  int	j;
  int tmp;

  j = 0;
  tmp = table[line][j];
  while(j != 3)
    {
      table[line][j] = table[line][j+1];
      j++;
    }
  table[line][3] = tmp;
  if(PRINT_SQUARE_DEBUG__ == 1)
    {
      printf("Rotate Left line %d\n", line);
      print_tab(table);
    }
}


void	algo_column(int **table, int column)
{
  int	i;
  int tmp;

  i = 0;
  tmp = table[i][column];
  while(i != 3)
    {
      table[i][column] = table[i+1][column];
      i++;
    }
  table[3][column] = tmp;
  if (PRINT_SQUARE_DEBUG__ == 1)
    {
      printf("Rotate Top column %d\n", column);
      print_tab(table);
      }
}


void	algo_square(int **table, int square)
{
  int	tmp;
  int	i;
  int	j;

  i = (square >= 2) ? 2 : 0;
  j = (square % 2 == 1) ? 2 : 0;
  tmp = table[i][j];
  table[i][j] = table[i+1][j];
  table[i+1][j] = table[i+1][j+1];
  table[i+1][j+1] = table[i][j+1];
  table[i][j+1] = tmp;
  if(PRINT_SQUARE_DEBUG__ == 1)
    {
      printf("Rotate Clockwise square %d\n", square);
      print_tab(table);
      }
}
