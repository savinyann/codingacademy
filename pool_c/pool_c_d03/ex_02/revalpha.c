#include <unistd.h>
void	revalpha(void);		// display the alphabet from Z to A
void	my_putchar(char);	// write "char" on standard output

void	my_putchar(char c)
{
  write(1, &c, 1);
}

void	revalpha(void)
{
  char	c;

  c = 90;
  while (c > 64)
    {
      my_putchar(c);
      c--;
    }
  my_putchar('\n');
}
