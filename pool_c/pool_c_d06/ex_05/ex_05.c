#include <stdlib.h>
#include <unistd.h>
#include <stdio.h>

void	my_show_str(char **array);
void	my_putchar(char c);
void	my_putstr(char *str);

void	my_putchar(char c)
{
  write(1, &c, 1);
}

void	my_putstr(char *str)
{
  int	i;

  i = 0;
  while(str[i] != '\0')
    {
      my_putchar(str[i]);
      i++;
    }
}

void	my_show_str(char **array)
{
  int	i;

  i = 0;
  while( array[i] != '\0' )
    {
      my_putstr(array[i]);
      my_putchar(10);
      i++;
    }
}

/*
int	main()
{
  char	*tab[] = {
    "Hello", " I ", "am", " a"
    " Students", " and", " ",
    " my ", " name", " is", " Yann\n",
    NULL
  };
  my_show_str(tab);
  return(0);
}
*/
