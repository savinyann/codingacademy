#include <unistd.h>
#include <stdio.h>

void	my_putstr(char *str);	// display "str" on the standard output
void	my_putchar(char c);	// write "char" on the standard output


void	my_putchar(char c)
{
  write(1, &c, 1);
}


void	my_putstr(char *str)
{
  while ( *str != '\0')
    {
      my_putchar(*str);
      str = str + 1;
    }
}

/*
int	main()
{
  my_putstr("Les vaches, ça ponds des oeufs.");
}
*/
