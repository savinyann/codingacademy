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


void	my_putstr_rev_slowly(char *str, int i)
{
  while(i >= 0)
    {
      my_putchar(1, str[i]);
      usleep(SLEEP);
      i--;
    }
}


int	main(int c, char **v)
{
  char	*str;
  int	lenght;

if (c < 2)
    {
      my_put_error("Can you give me a string please ? I can not work without this.");
      return(0);
    }
  if (c > 2)
    {
      my_put_error("You gave me too many string.");
      my_put_error("I will only work with the first one.");
      my_put_error("Give me another one when I have finish.");
      sleep(3);
    }
  lenght = my_strlen(v[1]);
  my_putstr_rev_slowly(v[1], lenght);
  return(0);
}
