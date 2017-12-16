#include <unistd.h>

void	conditions(int);	// display sign of "int"
void	my_putchar(char);	// write "char" on standard output

int	my_putchar(char c)
{
  write(1, &c, 1);
}

void	conditions(int n)
{
  if (n > 0)
    {
      my_putchar(43);
    }
  if (n < 0)
    {
      my_putchar(45);
    }
  if (n == 0)
    {
      my_putchar(48);
    }
}
