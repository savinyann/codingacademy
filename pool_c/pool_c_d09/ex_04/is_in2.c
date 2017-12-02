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
  int	tmp;

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
  int	tmp;

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


void	algo_line_reverse(int **table, int line)
{
  int	j;
  int	tmp;

  j = 3;
  tmp = table[line][j];
  while(j != 0)
    {
      table[line][j] = table[line][j-1];
      j--;
    }
  table[line][0] = tmp;
  if(PRINT_SQUARE_DEBUG__ == 1)
    {
      printf("Rotate Right line %d\n", line);
      print_tab(table);
    }
}


void	algo_column_reverse(int **table, int column)
{
  int	i;
  int	tmp;

  i = 3;
  tmp = table[i][column];
  while(i != 0)
    {
      table[i][column] = table[i-1][column];
      i--;
    }
  table[0][column] = tmp;
  if (PRINT_SQUARE_DEBUG__ == 1)
    {
      printf("Rotate Down column %d\n", column);
      print_tab(table);
      }
}


void	algo_square_reverse(int **table, int square)
{
  int	tmp;
  int	i;
  int	j;

  i = (square >= 2) ? 2 : 0;
  j = (square % 2 == 1) ? 2 : 0;
  tmp = table[i][j];
  table[i][j] = table[i][j+1];
  table[i][j+1] = table[i+1][j+1];
  table[i+1][j+1] = table[i+1][j];
  table[i+1][j] = tmp;
  if(PRINT_SQUARE_DEBUG__ == 1)
    {
      printf("Rotate Counter Clockwise square %d\n", square);
      print_tab(table);
      }
}


int	is_in_line(int **table, int line, int value)
{
  int	j;

  j = 0;
  while(j != 4)
    {
      if(table[line][j] == value)
	{
	  return(TRUE);
	}
      j++;
    }
  return(FALSE);
}


int	is_in_col(int **table, int column, int value)
{
  int	i;

  i = 0;
  while(i != 4)
    {
      if(table[i][column] == value)
	{
	  return(TRUE);
	}
      i++;
    }
  return(FALSE); 
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
  printf("La ligne 0 contient 1 - %d\nLa colonne 2 contient 3 - %d\n", is_in_line(table,0,1), is_in_col(table,2,3));
  printf("La ligne 3 contient 1 - %d\nLa colonne 2 contient 0 - %d\n", is_in_line(table,3,1), is_in_col(table,2,0));
  print_tab(table);
}
