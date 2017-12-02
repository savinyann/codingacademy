//putnbr recursive
#include <unistd.h>
void	my_putchar(char c);
void	my_putnbr(int n);
void	my_putnbr_rec(int n);

void	my_putchar(char c)
{
  write(1, &c, 1);
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

int	main()
{
  int	n;

  n = 1236789;
  my_putnbr(n);
}
