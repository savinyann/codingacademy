#include <stdlib.h>
#include <unistd.h>
#include <stdio.h>

char	*my_strcpy(char *dest, char *src);
void	my_putchar(char c);
void	my_putstr(char *str);
int	my_strlen(char *str);

void	my_putchar(char c)
{
  write(1, &c, 1);
}

void	my_putstr(char *str)
{
  int	i;

  i = 0;
  while(str[i])
    {
      my_putchar(str[i]);
      i++;
    }
}

int	my_strlen(char *str)
{
  int	lenght;
  
  lenght = 0;
  while ( *str != '\0')
    {
      lenght++;
      str = str + 1;
    }
  return(lenght);
}

char	*my_strcpy(char *dest, char *src)
{
  int	lenght;
  int	i;

  lenght = my_strlen(src);
  i = 0;
  dest = malloc(lenght);
  while(src[i])
    {
      dest[i] = src[i];
      i++;
    }
  return(dest);
}

/*
int	main()
{
  char	*src = "chatons";
  char	*dest;
  char	*test;
  int	lenght;

  lenght = my_strlen(src);
  dest = malloc(lenght);
  dest[0] = 't';
  dest[1] = 'e';
  dest[2] = 's';
  dest[3] = 't';
  dest[4] = '\0';
  test =  strcpy(dest, src);
  my_putstr(test);
  my_putchar(10);
  my_putstr(src);
  my_putchar(10);
  my_putstr(strcpy(dest, src));
}
*/
