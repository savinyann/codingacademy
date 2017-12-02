#include <stdlib.h>
#include <unistd.h>
#include <stdio.h>

int	*my_8_queens(void);
char	**place_queen(char **chess_table);
char	check_queen(char **chess_table, int i, int j);
void	my_show_str(char **array);
void	my_putchar(char c);
void	my_putstr(char *str);

void	my_putchar(char c)
{
  write(1, &c, 1);
}

void	my_putstr(char *str)
{
  int	i;

  i = 0;
  while(str[i] != '\0')
    {
      my_putchar(str[i]);
      i++;
    }
}

void	my_show_str(char **array)
{
  int	i;

  i = 0;
  while( array[i] != '\0' )
    {
      my_putstr(array[i]);
      my_putchar(10);
      i++;
    }
}





int	*my_8_queens()
{
  int	i;
  int	j;
  char	**chess_table;

  i = 0;
  j = 0;
  chess_table = malloc(42);
  printf("Génération du tableau; ok\n");
  if(chess_table == NULL)
    {
     return(NULL);
    }
  while(i != 8)
    {
      printf("écriture ligne %d;\n", i);
      j = 0;
      chess_table[i] = malloc(8);
      if(chess_table[i] == NULL)
	{
	  return(NULL);
	}
      while(j != 8)
	{
	  printf("Ecriture case %d,%d\n", i, j);
	  chess_table[i][j] = 49;
	  j++;
	}
      printf("sortie boucle j\n");
      i++;
    }
  printf("Table créée\n");
  my_show_str(chess_table);
  printf("Table affichée\n");
  // create_lign(i);
  //my_show_str(place_queen(chess_table));
}

char	**place_queen(char **chess_table)
{
  int	i;
  int	j;
  printf("place_queen initiated");
  i = 0;
  while(i != 8)
    {
      j = 0;
      while(j != 8)
	{
	  chess_table[i][j] = check_queen(chess_table, i, j);
	  my_putchar(chess_table[i][j]);
	  my_putchar(10);
	  j++;
      i++;
      }
    }
  
  return(chess_table);
  
}

char	check_queen(char **chess_table, int i, int j)
{
  int	a;

  printf("Check queen test initiated");
  a = 0;
  while(a =! 8)
    {
      if( (chess_table[i][a] && a != i) || (chess_table[a][i] && a !=j ) || (chess_table[i-a][j-a]) || (chess_table[i+a][j-a]) || (chess_table[i+a][j+a]) ||(chess_table[i-a][j+a]) )
	{
	  printf("check_queen success");
	  return(49);
	}
      else
	{
	  printf("check_queen failed\n");
	  return(0);
	}
    }
}

int	main()
{
  my_8_queens();
}

/*
int	*create_lign(i)
{ 
  if(i != 8)
    {
      chess_table[i] = malloc(8);
      if(chess_table[i] == NULL)
	{
	  return(NULL);
	}
      i++;
    }
  else
    {
      return;
    }
}
*/
