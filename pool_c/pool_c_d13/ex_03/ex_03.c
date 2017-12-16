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


void	my_putchar(int n ,char c)
{
  write(n, &c, 1);
}

int	my_putstr_slowly(char *str)
{
  int	i;
  int	count_char;

  i = 0;
  count_char = 0;
  while(str[i] != '\0')
    {
      my_putchar(1, str[i]);
      count_char++;
      usleep(SLEEP_WRITE);
      i++;
    }
  return(count_char);
}


void	my_erase_char(int count_char)
{
  while(count_char > 0)
    {
      my_putchar(1, '\b');
      my_putchar(1, ' ');
      my_putchar(1, '\b');
      usleep(SLEEP_ERASE);
      count_char--;
    }
}


int	main(int c, char **v)
{
  int	count_char;

  if (c < 2)
    {
      my_put_error("ERROR: You have to put at least one string as first parameter.");
      return(0);
    }
  count_char =  my_putstr_slowly(v[1]);
  my_erase_char(count_char);
  return(0);
}
