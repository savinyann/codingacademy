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


int	*look_for_space(int **table, int *lines, int *columns, int value)
{
  int	i;
  int	j;
  int	*space_found;

  space_found = malloc(2*sizeof(int));
  i = 0;
  while(i != 4)
    {
      j = 0;
      while(j != 4)
	{
	  if (columns[j] == 0 && lines[i] == 0)
	    {
	      if(table[i][j] != value)
		{
		  space_found[0] = i;
		  space_found[1] = j;
		  return(space_found);
		}
	    }
	  j++;
	}
      i++;
    }
  return(NULL);
}


int	main()
{
  int	**table;
  int	i;
  int	j;
  int	*lines;
  int	*columns;
  int	*empty_space;

  i = 0;
  //printf("Etape 1\n");
  empty_space = malloc(2*sizeof(int));
  if(empty_space == NULL)
    {
      return(0);
    }
  //printf("Etape 2\n");
  lines = malloc(4*sizeof(int));
  if(lines == NULL)
    {
      return(0);
    }
  //printf("Etape 3\n");
  columns = malloc(4*sizeof(columns));
  if(columns == NULL)
      {
	return(0);
      }
  
  //printf("Etape 4\n");
  table = malloc(5 *sizeof(int *));
  if(table == NULL)
    {
      return(0);
    }
  
  //printf("Etape 5\n");
  while(i != 4)
    {
      //printf("Etape 1-%d\n", i);
      table[i] = malloc(5 * sizeof(int));
      if(table[i] == NULL)
	{
	  return(0);
	}
      i++;
    }
  //printf("Memory allocated\n");
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
  i = 0;
  lines[0] = BLOCKED;
  lines[1] = BLOCKED;
  lines[2] = EMPTY;
  lines[3] = BLOCKED;
  columns[0] = EMPTY;
  columns[1] = EMPTY;
  columns[2] = BLOCKED;
  columns[3] = BLOCKED;
  print_tab(table);
  empty_space = look_for_space(table, lines, columns, 2);
  if(empty_space != NULL)
    {
  printf("Un espace vide pour 2 à été trouvé à l'intersection de la ligne %d et la colonne %d\n",empty_space[0], empty_space[1]);
    }
  else
    {
      printf("No empty space for 2 in lines 2, columns 0 and 1\n");
    }
  empty_space = look_for_space(table, lines, columns, 1);
  if(empty_space != NULL)
    {
  printf("Un espace vide à pour 1 été trouvé à l'intersection de la ligne %d et la colonne %d\n",empty_space[0], empty_space[1]);
    }
  else
    {
      printf("No empty space for 1 in lines 2, columns 0 and 1\n");
    }
  empty_space = look_for_space(table, lines, columns, 3);
  if(empty_space != NULL)
    {
  printf("Un espace vide pour 3 à été trouvé à l'intersection de la ligne %d et la colonne %d\n",empty_space[0], empty_space[1]);
    }
  else
    {
      printf("No empty space for 3 in lines 2, columns 0 and 1\n");
    }
  while(i != 5)
    {
      free(table[i]);
      i++;
    }
  free(table);
  free(empty_space);
  return(0);
}

