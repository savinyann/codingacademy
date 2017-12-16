#include "helper.h"


void	my_put_error(char *str)
{
  int	i;

  i = 0;
  while(str[i] != '\0')
    {
      my_putchar(2, str[i]);
      i++;
      usleep(SLEEP_ERROR);
    }
}


void	my_putchar(int n,char c)
{
  write(n, &c, 1);
}


void	my_putstr(char *str)
{
  int	i;

  i = 0;
  while(str[i] != '\0')
    {
      my_putchar(1, str[i]);
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
  my_putstr(temp_str);
  usleep(SLEEP_WRITE);
  free(temp_str);
}


int	main(int c, char **v)
{
  int	count_char;

  if (c < 2)
    {
      my_put_error("ERROR: ");
      my_put_error(v[0]);
      my_put_error(" take a string as first parameter.\n");
      return(0);
    }
  display_char_2by2(v[1]);
  return(0);
}
