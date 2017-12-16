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
      printf("| %d | %d | %d | %d |\n",table[i][0], table[i][1], table[i][2], table[i][3]);
      printf("-----------------\n");
      i++;
    }
}


void	algo_square(int **table, int square)
{
  int tmp;
  
  if(square == 0)
    {
      tmp = table[0][0];
      table[0][0] = table[1][0];
      table[1][0] = table[1][1];
      table[1][1] = table[0][1];
      table[0][1] = tmp;
    }
  if(square == 1)
    {
      tmp = table[0][2];
      table[0][2] = table[1][2];
      table[1][2] = table[1][3];
      table[1][3] = table[0][3];
      table[0][3] = tmp;
    }
  if(square == 2)
    {
      tmp = table[2][0];
      table[2][0] = table[3][0];
      table[3][0] = table[3][1];
      table[3][1] = table[2][1];
      table[2][1] = tmp;
    }
  if(square == 3)
    {
      tmp = table[2][2];
      table[2][2] = table[3][2];
      table[3][2] = table[3][3];
      table[3][3] = table[2][3];
      table[2][3] = tmp;
    }
  if(PRINT_SQUARE_DEBUG__ == 1)
    {
      printf("Rotate Clockwise square %d\n", square);
      print_tab(table);
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


void	algo_square_reverse(int **table, int square)
{
  int tmp;
  
  if(square == 0)
    {
      tmp = table[0][0];
      table[0][0] = table[0][1];
      table[0][1] = table[1][1];
      table[1][1] = table[1][0];
      table[1][0] = tmp;
    }
  if(square == 1)
    {
      tmp = table[0][2];
      table[0][2] = table[0][3];
      table[0][3] = table[1][3];
      table[1][3] = table[1][2];
      table[1][2] = tmp;
    }
  if(square == 2)
    {
      tmp = table[2][0];
      table[2][0] = table[2][1];
      table[2][1] = table[3][1];
      table[3][1] = table[3][0];
      table[3][0] = tmp;
    }
  if(square == 3)
    {
      tmp = table[2][2];
      table[2][2] = table[2][3];
      table[2][3] = table[3][3];
      table[3][3] = table[3][2];
      table[3][2] = tmp;
    }
  if(PRINT_SQUARE_DEBUG__ == 1)
    {
      printf("Rotate Counter Clockwise square %d\n", square);
      print_tab(table);
      }
}


void	algo_line_reverse(int **table, int line)
{
  int	j;
  int tmp;

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
  int tmp;
  
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


int	is_in_line(int **table, int line, int value)
{
  int	j;

  j = 0;
  while(j != 4)
    {
      if(table[line][j] == value)
	{
	  return(0);
	}
      j++;
    }
  return(1);
}


int	is_in_col(int **table, int column, int value)
{
  int	i;
  
  i = 0;
  while(i != 4)
    {
      if(table[i][column] == value)
	{
	  return(0);
	}
      i++;
    }
  return(1); 
}


int	*look_for_space(int **table, int *lines, int *columns, int value)
{
  int	i;
  int	j;
  int	*space_found;

  space_found = malloc(2*sizeof(int));
  if(space_found == NULL)
    {
      return NULL;
    }
  i = 0;
  while(i != 4)
    {
      if(lines[i] == 0)
	{
	  j = 0;
	  while(j != 4)
	    {
	      if (columns[j] == 0)
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
	}
      i++;
    }
  return(NULL);
}



int	*look_for_value(int **table, int *lines, int *columns, int value)
{
  
  int	i;
  int	j;
  int	k;
  int	*val_found;

  k = 0;
  val_found = malloc(2*sizeof(int));
  if(val_found == NULL)
    {
      return(NULL);
    }
  i = 0;
  printf("%d %d %d %d\n", columns[0], columns[1], columns[2], columns[3]); 
  while(i != 4)
    {
      if(lines[i] == 0)
	{
	  printf(" i = %d  ;  lines[%d] = %d\n", i, i, lines[i]);
	  j = 0;
	  while(j != 4)
	    {
	      if (columns[j] == 0)
		{
		  printf("1 -  i = %d  ;  j = %d  ;  columns[%d] = %d  ;  value = %d\n", i, j, j, columns[j], value);
		  if(table[i][j] == value)
		    {
		       printf("2 -  j = %d  ;  columns[%d] = %d\n", j, j, columns[j+1]);
		      val_found[0] = i;
		      val_found[1] = j;
		      return(val_found);
		    }
		}
	      j++;
	    }
	}
      i++;
    }
  return(NULL);
}


void	rotate_lines(int **table, int line, int offset)
{
  while(offset > 0)
    {
      algo_line(table,line);
      offset--;
    }
  while(offset < 0)
    {
      algo_line_reverse(table,line);
      offset++;
    }
}


void	rotate_columns(int **table, int column, int offset)
{
  while(offset > 0)
    {
      algo_column(table,column);
      offset--;
    } 
  while(offset < 0)
    {
      algo_column_reverse(table,column);
      offset++;
    } 
}


void	build_first_line(int **table)
{
  int	k;
  int	j;

  k = 0;
  while( k != 4)
    {
      j = 0;
      while( j != 4 )
	{
	  while(is_in_col(table, j, 0) == 0 && table[0][j] != 0)
	    {
	      algo_column(table, j);
	    }
	  j++;
	}
      algo_line(table,0);
      k++;
    }
  if(PRINT_SQUARE_DEBUG__ == 2)
    {
  print_tab(table);
    }
}


void line_to_square(int **table, int line)
{
  algo_square(table, line);
  algo_square(table, line);
  rotate_lines(table, line, 2);
  if(PRINT_SQUARE_DEBUG__ == 2)
    {
  print_tab(table);
    }
}


void	push_it_up(int **table)
{
  rotate_columns(table, 2, 2);
  rotate_columns(table, 3, 2);
}





void	build_last_line(int **table)
{
  int	k;
  int	j;

  k = 0;
  while( k != 4)
    {
      j = 2;
      while( j != 4 )
	{
	  while(is_in_col(table, j, 1) == 0 && table[3][j] != 1)
	    {
	      algo_column(table, j);
	    }
	  j++;
	}
      algo_line_reverse(table, 2);
      algo_line(table, 3);
      k++;
    }
  if(PRINT_SQUARE_DEBUG__ == 2)
    {
  print_tab(table);
    }
}

















void	build_first_square(int **table)
{
  build_first_line(table);
  line_to_square(table, 0);
  if(PRINT_SQUARE_DEBUG__ == 3)
    {
  print_tab(table);
    }
}


void	build_second_square(int **table)
{
  build_last_line(table);
  line_to_square(table, 3);
  push_it_up(table);
  if(PRINT_SQUARE_DEBUG__ == 3)
    {
  print_tab(table);
    }
}


void	build_final_line(int **table)
{
  int	k;

  k = 0;
  while(is_in_line(table, 3, 2) == 0 && k != 100)
    {
      if(is_in_col(table, 3, 2))
	{
	  algo_square(table, 3);
	}
      if(is_in_col(table, 0, 3))
	{
	  algo_square(table, 2);
	}
      algo_line_reverse(table, 2);
      print_tab(table);
      k++;
    }
  line_to_square(table,3);
  print_tab(table);
  if( k == 10)
    {
      printf("Interrupt\n");
    }
}


int	main()
{
  int	**table;
  int	i;
  int	j;
  int	*lines;
  int	*columns;
  int	*empty_space;
  int	*value_found;

  i = 0;
  //printf("étape 1\n");
  empty_space = malloc(2*sizeof(int));
  if(empty_space == NULL)
    {
      return(0);
    }
  value_found = malloc(2*sizeof(int));
  if(value_found == NULL)
    {
      return(0);
    }
  //printf("étape 2\n");
  lines = malloc(4*sizeof(int));
  if(lines == NULL)
    {
      return(0);
    }
  //printf("étape 3\n");
  columns = malloc(4*sizeof(columns));
  if(columns == NULL)
      {
	return(0);
      }
  
  //printf("étape 4\n");
  table = malloc(5 *sizeof(int *));
  if(table == NULL)
    {
      return(0);
    }
  
  //printf("étape 5\n");
  while(i != 4)
    {
      //printf("étape 1-%d\n", i);
      table[i] = malloc(5 * sizeof(int));
      if(table[i] == NULL)
	{
	  return(0);
	}
      i++;
    }
  //printf("Mémoire allouée\n");
  table[0][0] = 3;
  table[0][1] = 2;
  table[0][2] = 1;
  table[0][3] = 0;
  table[1][0] = 2;
  table[1][1] = 1;
  table[1][2] = 0;
  table[1][3] = 3;
  table[2][0] = 1;
  table[2][1] = 0;
  table[2][2] = 3;
  table[2][3] = 2;
  table[3][0] = 0;
  table[3][1] = 3;
  table[3][2] = 2;
  table[3][3] = 1;
  print_tab(table);
  /*
  rotate_columns(table, 0, 2);
  rotate_columns(table, 1, 2);
  rotate_columns(table, 2, 2);
  rotate_columns(table, 3, 2);
  print_tab(table);
  printf("La ligne 0 contient 1 - %d\nLa colonne 2 contient 3 - %d\n", is_in_line(table,0,1), is_in_col(table,2,3));
  printf("La ligne 3 contient 1 - %d\nLa colonne 2 contient 0 - %d\n", is_in_line(table,3,1), is_in_col(table,2,0));
  print_tab(table);
  algo_line(table, 2);
  algo_column(table, 0);
  algo_square(table, 3);
  algo_square_reverse(table, 3);
  algo_column_reverse(table, 0);
  algo_line_reverse(table, 2);
  i = 0;
  lines[0] = 1;
  lines[1] = 1;
  lines[2] = 0;
  lines[3] = 1;
  columns[0] = 0;
  columns[1] = 0;
  columns[2] = 1;
  columns[3] = 1;
  empty_space = look_for_space(table, lines, columns, 2);
  if(empty_space != NULL)
    {
  printf("Un espace vide à été trouvé à l'intersection de la ligne %d et la colonne %d\n",empty_space[0], empty_space[1]);
    }
  else
    {
      printf("Nothing was found\n");
    }
  empty_space = look_for_space(table, lines, columns, 1);
  if(empty_space != NULL)
    {
  printf("Un espace vide à été trouvé à l'intersection de la ligne %d et la colonne %d\n",empty_space[0], empty_space[1]);
    }
  else
    {
      printf("Nothing was found\n");
    }
  empty_space = look_for_space(table, lines, columns, 2);
  if(empty_space != NULL)
    {
  printf("Un espace vide à été trouvé à l'intersection de la ligne %d et la colonne %d\n",empty_space[0], empty_space[1]);
    }
  else
    {
      printf("Nothing was found\n");
      }
  lines[0] = 1;
  lines[1] = 1;
  lines[2] = 0;
  lines[3] = 1;
  columns[0] = 0;
  columns[1] = 0;
  columns[2] = 1;
  columns[3] = 1;
  printf("_____________________\n%d\n%d\n%d\n%d\n   %d | %d | %d | %d\n",lines[0], lines[1], lines[2], lines[3], columns[0], columns[1], columns[2], columns[3]);
  value_found = look_for_value(table, lines, columns, 2);
  if(value_found != NULL)
    {
      printf("2 a été trouvé à l'intersection de la ligne %d et la colonne %d\n",value_found[0], value_found[1]);
    }
  else
    {
      printf("Nothing was found\n");
    }
  value_found = look_for_value(table, lines, columns, 3);
  if(value_found != NULL)
    {
      printf("3 a été trouvé à l'intersection de la ligne %d et la colonne %d\n",value_found[0], value_found[1]);
    }
  else
    {
      printf("Nothing was found\n");
    }
  value_found = look_for_value(table, lines, columns, 1);
  if(value_found != NULL)
    {
      printf("1 a été trouvé à l'intersection de la ligne %d et la colonne %d\n",value_found[0], value_found[1]);
    }
  else
    {
      printf("Nothing was found\n");
    }
  
  while(i != 5)
    {
      free(table[i]);
      i++;
    }

  */
  build_first_square(table);
  build_second_square(table);
  build_final_line(table);
  free(table);
  free(empty_space);
  free(value_found);
  return(0);
}
