#ifndef _TEST_ANTI_MLT_DEF_
#define _TEST_ANTI_MLT_DEF_
#include <stdlib.h>
void	my_putstr(char *str);
void	my_putchar(char c);
void	my_putnbr(int n);
void	my_putnbr_rec(int n);

void	my_putchar(char c)
{
  write(1, &c, 1);
}


void	my_putstr(char *str)
{
  while ( *str != '\0')
    {
      my_putchar(*str);
      str++;
    }
}

void	my_putnbr(int n)
{
if (n > 0)
{
  n = -n;
}
 my_putnbr_rec(n);
}

void	my_putnbr_rec(int n)
{
  if ( n != 0)
  {
    my_putnbr_rec(n /10);
    my_putchar(-n %10 + 48);
  }
  else
    {
      return;
    }
}

#endif
