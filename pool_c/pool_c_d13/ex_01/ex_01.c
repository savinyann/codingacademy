#include "helper.h" 


void	my_put_error(char *str)
{
  int	i;

  i = 0;
  while(str[i] != '\0')
    {
      my_putchar(2, str[i]);
      i++;
    }
  my_putchar(2, '\n');
}


void	my_putchar(int n, char c)
{
  write(n, &c, 1);
}


void	my_putstr_slowly(char *str)
{
  int	i;

  i = 0;
  while(str[i] != '\0')
    {
      my_putchar(1, str[i]);
      usleep(SLEEP);
      i++;
    }
}


char	*array_to_str(char **array)
{
  int	i;
  int	j;
  int	k;
  char	*str;

  i = 1;
  k = 0;
  while(array[i] != NULL)
    {
      j = 0;
      while(array[i][j] != '\0')
	{
	  k++;
	  j++;
	}
      k++;
      i++;
    }
  str = malloc(k * sizeof(char));
  if (str == NULL)
    {
      return(NULL);
    }
  str = filling_string(str, array);
  return(str);
}


char	*filling_string(char *str, char **array)
{
  int	i;
  int	j;
  int	k;
  
  i = 1;
  k = 0;
  while(array[i] != '\0')
    {
      j = 0;
      while(array[i][j] != '\0')
	{
	  str[k] = array[i][j];
	  k++;
	  j++;
	}
      if(array[i + 1] != '\0')
	{
	  str[k] = ' ';
	}
      k++;
      i++;
    }
  str[k] = '\0';
  return(str);
}


int	main(int c, char **v)
{
  char	*str;
  if (c < 2)
    {
      my_put_error("You have to feed me with a string in order to use me.");
      return(0);
    }
  if (c > 2)
    {
      my_put_error("I don't have to do this, I have to work with only one string.");
      sleep(3);
      my_put_error("Fine, I will do it. But, do not tell anyone, please.");
      sleep(1);
      my_put_error("Wait a little. I have to do some upgrade.");
      usleep(1500000);      
    }
  str = array_to_str(v);
  my_putstr_slowly(str);
  free(str);
  return(0);
}
