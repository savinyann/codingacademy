#include "helper.h"

void	my_put_error(char *str)
{
  int	i;

  i = 0;
  while(str[i] != '\0')
    {
      my_putchar(2, str[i]);
      i++;
    }
  my_putchar(2, '\n');
}


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


int	my_putstr_slowly(char *str, int count_char)
{
  int	i;

  i = 0;
  while(str[i] != '\0')
    {
      my_putchar(1,str[i]);
      count_char++;
      usleep(SLEEP_WRITE);
      i++;
    }
  return(count_char);
}


void	my_rmp_char_by_space(int count_char, char *str)
{
  int	i;
  int	lenght;

  i = 0;
  lenght = my_strlen(str);
  while(count_char > 0)
    {
      my_putchar(1,'\r');
      str[i] = ' ';
      str[lenght-i-1] = ' ';
      my_putstr(str);
      if(1)
	{
	  usleep(SLEEP_ERASE);
	}
      count_char = count_char - 2;
      i++;
    }
}

int	main(int c, char **v)
{
  int	count_char;

  if (c < 2)
    {
      my_put_error("Would you like to give me at least one string ?");
      return(0);
    }
  count_char = my_putstr_slowly(v[1],0);
  my_rmp_char_by_space(count_char, v[1]);
  return(0);
}
