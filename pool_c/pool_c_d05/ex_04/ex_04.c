#include <unistd.h>
#include <stdio.h>

char	*my_strupcase(char *);	// convert every lowercase in str to uppercase
void	my_putchar(char);	// write "char" on standard output
char	my_charupcase(char);	// convert lowercase "char" to uppercase


void	my_putchar(char c)
{
  write(1, &c, 1);
}

char	*my_strupcase(char *str)
{
  int	i;

  i = 0;
  while (str[i] != '\0')
    {
      if ( str[i] >= 97 && str[i] <=122 )
	{
	  str[i] = my_charupcase(str[i]);
	}
      i++;
    }
  return(str);
}

char	my_charupcase(char c)
{
  char tmp;

  tmp = c - 32;
  return(tmp);
}

/*
int	main()
{
  char c[] = "12545hello world456546";

  printf("%s\n",my_strupcase(c));
}
*/
