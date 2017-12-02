#include <unistd.h>
#include <stdio.h>

void	my_putnbr(int n);

int	my_putchar(char c)
{
  write(1, &c, 1);
}

void	my_putnbr(int n)
{
  char c;
  int m;
  int lenght;
  int ctrl_lenght;
  int sign;

  m = 0;
  c = 0;
  lenght = 0;
  ctrl_lenght = 0;
  if ( n == -2147483648 )
    {
      my_putchar(45);
      my_putchar(50);
      my_putchar(49);
      my_putchar(52);
      my_putchar(55);
      my_putchar(52);
      my_putchar(56);
      my_putchar(51);
      my_putchar(54);
      my_putchar(52);
      my_putchar(56);
    }
  else
    {
      if ( n < 0 )
    {
      my_putchar(45);
      n = - n;
    }
      while ( n >=10 )
	{
	  m = n;
	  while ( m >= 10 )
	    {
	      m = m / 10;
	      lenght++;
	    }
	  if (lenght != ctrl_lenght - 1)
	    {
	      if (ctrl_lenght != 0)
		{
		  my_putchar(48);
		}
	    }
	  ctrl_lenght = lenght;
	  c = m + 48;
	  while ( lenght != 0)
	    {
	      m = 10 * m;
	      lenght--;
	    }
	  my_putchar(c);
	  n = n - m;
	}
        c = n + 48;
	my_putchar(c);
    }
}
/*
int	main()
{
  my_putnbr(0);
  my_putnbr(42);
  my_putnbr(-42);
  my_putnbr(123456789);
  my_putnbr(-123456789);
  my_putnbr(2147483648);
  my_putnbr(-2147483648);
  my_putnbr(2147483647);
  my_putnbr(-2147483647);
}
*/
