#include <unistd.h>
#include <stdio.h>

void	my_true_loop(unsigned int);	// display "int" times "+"
void	my_putchar(char);		// write "char" on standard output

void	my_putchar(char c)
{
  write(1, &c, 1);
}

void	my_true_loop(unsigned int n)
{
    while (n > 0)
      {
	my_putchar(43);
	n--;
      }
    my_putchar(10);
}
