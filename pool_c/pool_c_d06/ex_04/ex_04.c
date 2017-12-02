#include <stdlib.h>
#include <unistd.h>
#include <stdio.h>

char	*my_strdup(char *str);
int	my_strlen(char *str);
void	my_putchar(char c);
void	my_putstr(char *str);

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


char	*my_strdup(char *str)
{
  char	*new_address;
  int	lenght;
  int	i;

  i = 0;
  lenght = my_strlen(str);
  new_address = malloc(lenght);
  if(new_address == NULL)
    {
      return(NULL);
    }
  while(str[i] != '\0' )
    {
      new_address[i] = str[i];
      i++;
    }
  return(new_address);
}

/*
int	main()
{
  char	*str = "chatons";
  char	*new_str;

  new_str = my_strdup(str);
  my_putstr(str);
  my_putstr(new_str);
  printf("\n %p \n %p \n %p \n", *new_str, &new_str, &str);
  //  free(new_str);
}

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
*/
