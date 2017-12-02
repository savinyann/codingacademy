#include <unistd.h>
void	alpha(void);		// write the alphabet from A to Z
void	my_putchar(char);	// write "char" on standard output

void	my_putchar(char c)
{
  write(1, &c, 1);
}


void	alpha(void)
{
  char	c;

  c = 65;
  while (c < 91)
    {
      my_putchar(c);
      c++;
    }
  my_putchar('\n');
}

int	main()
{
  alpha();
}
