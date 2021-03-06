#include <stdio.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <unistd.h>
#include <stdlib.h>
void	show_game(char **game_array);
char	**my_create_game_array(void);
int	my_connect_four(char **game_array, int column, int turn);
int	chk_horizontal_win(char **game_array);
void	my_putchar(char c);


void	my_putchar(char c)
{
  write(1, &c, 1);
}


int	chk_antidiagonal_win(char **game_array)
{
  int	i;
  int	j;

  j = 3;
  i = 0;
  while(j != 6)
    {
      i = 0;
      while( i != 3)
	{
	  if(game_array[i][j] != '-' && game_array[i][j] == game_array[i+1][j-1] && game_array[i][j] == game_array[i+2][j-2] &&game_array[i][j] == game_array[i+3][j-3])
	    {
	      if(game_array[i][j] == 'O')
		{
		  return(2);
		}
	      else
		if(game_array[i][j] == 'X')
		{
		  return(1);
		}
	    }
	  i++;
	}
      j++;
    }
  return(0);
}



int	chk_diagonal_win(char **game_array)
{
  int	i;
  int	j;

  j = 0;
  i = 0;
  while(j != 4)
    {
      i = 0;
      while( i != 3)
	{
	  if(game_array[i][j] != '-' && game_array[i][j] == game_array[i+1][j+1] && game_array[i][j] == game_array[i+2][j+2] &&game_array[i][j] == game_array[i+3][j+3])
	    {
	      if(game_array[i][j] == 'O')
		{
		  return(2);
		}
	      else
		if(game_array[i][j] == 'X')
		{
		  return(1);
		}
	    }
	  i++;
	}
      j++;
    }
  return(0);
}
  

int	chk_vertical_win(char **game_array)
{
  int	i;
  int	j;

  j = 0;
  i = 0;
  while( j != 7)
    {
      i = 0;
      while( i != 3)
	{
	  if(game_array[i][j] != '-' && game_array[i][j] == game_array[i+1][j] && game_array[i][j] == game_array[i+2][j] &&game_array[i][j] == game_array[i+3][j])
	    {
	      if(game_array[i][j] == 'O')
		{
		  return(2);
		}
	      else
		if(game_array[i][j] == 'X')
		{
		  return(1);
		}
	    }
	  i++;
	}
      j++;
    }
  return(0);
}




int	chk_horizontal_win(char **game_array)
{
  int	i;
  int	j;

  j = 0;
  i = 0;
  while( i != 6)
    {
      j = 0;
      while( j != 4)
	{
	  if(game_array[i][j] != '-' && game_array[i][j] == game_array[i][j+1] && game_array[i][j] == game_array[i][j+2] &&game_array[i][j] == game_array[i][j+3])
	    {
	      if(game_array[i][j] == 'O')
		{
		  return(2);
		}
	      else
		if(game_array[i][j] == 'X')
		{
		  return(1);
		}
	    }
	  j++;
	}
      i++;
    }
  return(0);
}

int	my_connect_four(char **game_array, int i, int turn)
{
  int	j;

  j = 0;
  turn = turn % 2 + 1 ;
  printf("i = %d, turn = %d\n", i, turn);
  if(turn == 1)
    {
      while(game_array[j+1][i] == '-' && j != 5)
	{
	  j++;
	}
      if(j == 0 && game_array[i][j] != '-')
	{
	  printf("Incorrect move. Please replay.\n");
	  return(0);
	}
      game_array[j][i] = 'X';
      return(2);
    }
  if(turn == 2)
    {
      while(game_array[j+1][i] == '-' && j != 5)
	{
	  j++;
	}
      if(j == 0 && game_array[i][j] != '-')
	{
	  printf("Incorrect move. Please replay.\n");
	  return(0);
	}
  game_array[j][i] = 'O';
  return(1);
    }
}


char	**my_create_game_array(void)
{
  int	i;
  int	j;
  char	**game_array;

  game_array = malloc(48);
  if(game_array == NULL)
    {
      return(NULL);
    }
  i = 0;
  while(i != 7)
    {
      j = 0;
      game_array[i] = malloc(8);
      if(game_array[i] == NULL)
	{
	  return(NULL);
	}
      while(j != 8)
	{
	  game_array[i][j] = '-';
	  j++;
	}
      i++;
    }
  return(game_array);
}


int	gecko_read(char *str)
{
  return(read(0, str, 2));
}


void	show_game(char **game_array)
{
  int	counter_y;

  counter_y = 0;
  printf("| 1 | 2 | 3 | 4 | 5 | 6 | 7 | \n");
  printf("=============================\n");
  while(counter_y < 6)
    {
      printf("| %c | %c | %c | %c | %c | %c | %c |\n",
	     game_array[counter_y][0], game_array[counter_y][1],
	     game_array[counter_y][2], game_array[counter_y][3],
	     game_array[counter_y][4], game_array[counter_y][5],
	     game_array[counter_y][6]);
      counter_y++;
    }
  printf("\n");
}


int	main(int argc, char **argv)
{
  int	i;
  int	player_turn;
  char	*column;
  char **game_array;
  int	turn;
  int	diagonal_win;
  int	horizontal_win;
  int	vertical_win;
  int	antidiagonal_win;

  antidiagonal_win = 0;
  diagonal_win = 0;
  horizontal_win = 0;
  vertical_win = 0;
  turn = 0;
  player_turn = 1;
  i = 0;
  column = malloc(2);
  if(column == NULL)
    {
      return(0);
    }
  game_array = my_create_game_array();
  show_game(game_array);
  while(player_turn != 3 && player_turn != 4)
    {
      printf("Player %d's turn", turn % 2 + 1);
      printf("\nIn which column do you want to play ?\n");
      read(0,column,2);
      i = atoi(column) -1;
      player_turn = my_connect_four(game_array, i, turn);
      show_game(game_array);
      if(player_turn != 0)
	{
	  turn++;
	  printf("turn %d ended\n", turn);
	}
      horizontal_win = chk_horizontal_win(game_array);
      vertical_win = chk_vertical_win(game_array);
      diagonal_win = chk_diagonal_win(game_array);
      antidiagonal_win = chk_antidiagonal_win(game_array);
      if(horizontal_win == 1 || vertical_win == 1 || diagonal_win == 1 || antidiagonal_win == 1)
	{
	  printf("Player 1 wins\n");
	  return(0);
	}
      if(horizontal_win == 2 || vertical_win == 2 || diagonal_win == 2 || antidiagonal_win == 2)
	{
	  printf("Player 2 wins\n");
	  return(0);
	}	     
    }
      free(column);
      column = NULL;
  printf("column_exit = %s\n", column);
}
