#include <unistd.h>
#include <stdio.h>

void		my_putnbr(int);		// write "int" on standard output 
char		my_digit_to_char(int);	// return digit "int" into a char
long int	my_reversenbr(int);	// return reversed digit order of "int"
void		my_putchar(char);	// write "char" on standard output


void	my_putchar(char c)
{
  write(1, &c, 1);
}


long int	my_reversenbr(int n)
{
  long int	m;

  m = 0;
  while ( n != 0 )
    {
      m = 10* m + n % 10;
      n = n / 10;
    }
  return(m);
}


char	my_digit_to_char(int n)
{
  char	c;

  if ( n < 0 )
    {
      n = - n;
    }
  c = n + 48;
  return(c);
}


void	my_putnbr(int n)
{
  long int	m;
  long int	l;

  m = 42;
  if ( n < 0 )
    {
      my_putchar(45);
    }    
  l = (my_reversenbr(n));
  while ( l != 0 || m == 42)
    {
      m = l % 10;
      l = l / 10;
      my_putchar(my_digit_to_char(m));
    }
  while ( n % 10 == 0 && n != 0)
    {
      my_putchar(48);
      n = n / 10;
    }
}

/*
int	main()
{
  my_putnbr(0);
  my_putnbr(42);
  my_putnbr(-42);
  my_putnbr(243000);
  my_putnbr(-243000);
  my_putnbr(-2147483648);
  my_putnbr(-2147483647);
  my_putnbr(2147483647);
}
*/
