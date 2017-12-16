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


int	my_putstr_slowly(char *str, int count_char)
{
  int	i;

  i = 0;
  while(str[i] != '\0')
    {
      my_putchar(1, str[i]);
      count_char++;
      usleep(SLEEP_WRITE);
      i++;
    }
  return(count_char);
}


void	my_rmp_char_by_space(int count_char)
{
  my_putchar(1, '\r');
  while(count_char > 0)
    {
      my_putchar(1, ' ');
      usleep(SLEEP_ERASE);
      count_char--;
    }
}


int	main(int c, char **v)
{
  int	count_char;

  if (c < 2)
    {
      my_put_error("I am like Tortue Genial: I need a string to work.");
      return(0);
    }
  if (c > 2)
    {
      my_put_error("TOO MANY STRING !! MY NOSE IS BLEEDING !!!");
      return(0);
    }
  count_char = my_putstr_slowly(v[1], 0);
  my_rmp_char_by_space(count_char);
  return(0);
}
