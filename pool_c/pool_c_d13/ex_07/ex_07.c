#include "helper.h"
  

void	my_putchar(int n, char c)
{
  write(n, &c, 1);
}


void	my_putstr(char *str)
{
  int	i;

  i = 0;
  while(str[i] != '\0')
    {
      my_putchar(1,str[i]);
      i++;
    }
}


int	my_strlen(char *str)
{
  int	count;
  
  count = 0;
  while ( *str != '\0')
    {
      count++;
      str = str + 1;
    }
  return(count);
}


void	display_char_2by2(char *str)
{
  int	i;
  int	lenght;

  i = 0;
  lenght = my_strlen(str);
  while(i != lenght / 2 + lenght % 2)
    {
      my_putchar(1,'\r');
      display_char(str, i, lenght);
      i++;
    }
}


void	display_char(char *str, int i, int lenght)
{
  int	j;
  char	*temp_str;

  j = 0;
  temp_str = malloc((lenght + 1)*sizeof(char));
  if(temp_str == NULL)
    {
      return;
    }
  temp_str[lenght] = '\0';
  while(j != lenght)
    {
      temp_str[j] = str[j];
      j++;
     }
  j = 0;
  while(j < lenght / 2 + lenght % 2 - i - 1)
    {
      temp_str[j] = ' ';
      temp_str[lenght - j - 1] = ' ';
	  j++;
    }
  my_putstr_in_order(temp_str, j, (lenght - j - 1));
  free(temp_str);
}


void	my_putstr_in_order(char *str, int i, int j)
{
  int	k;
  char	char_i;
  char	char_j;

  char_i = ( str[i] < 94) ? 65 : 97;
  char_j = ( str[j] < 94) ? 65 : 97;
  my_putchar(1,'\r');
  while(str[i] != (char_i - 1) || (str[j] != (char_j - 1) && j != i))
    {
      k = 0;
      my_putchar(1,'\r');
      while(str[k] != '\0')
	{
	  if(k != i && k != j)
	    {
	      my_putchar(1,str[k]);
	    }
	  else
	    {
	      if(k == i)
		{
		  char_i = my_putchar_from_a(str[i], char_i);
		}
	      if(k == j && str[k] != '\0' && i != j)
		{
		  char_j = my_putchar_from_a(str[j], char_j);
		}
	    }
	  k++;
	}
      usleep(SLEEP_A_TO_CHAR);
    }
      usleep(SLEEP_DISPLAY_CHAR);
}


int	my_putchar_from_a(char c, char i)
{
  if (c+1 == i)
    {
      my_putchar(1,c);
    }
  else
    {
      my_putchar(1,i);
      i++;
    }
  return(i);
}


int	main(int c, char **v)
{
  int	i;

  i = 0;
  if (c < 2)
    {
      my_putstr("ERROR: You have to feed me with at least one parameters in order to use me. Sorry.\n");
      return(0);
    }
  i = 0;
  while(v[1][i] != '\0')
    {
      if((v[1][i] < 65 || v[1][i] > 90) && (v[1][i] < 97 || v[1][i] > 122))
	{
	  my_putstr("ERROR: I can only take alphabetic characters in input. I am really sorry.\n");
	  return(0);
	}
      i++;
    }
  display_char_2by2(v[1]);
  return(0);
}
