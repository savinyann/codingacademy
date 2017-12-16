#include <unistd.h>
#include <stdio.h>

int	my_putchar(char c);
int	my_strlen(char *str);
void	my_putnbr(int n,int order,char *base);
void	my_putnbr_base(int nbr,char *base);


void	my_putnbr_base(int nbr,char *base)
{
  int	order;

  order =  my_strlen(base);
  my_putnbr(nbr,order,base);
}
  

int	my_strlen(char *str)
{
  char	*i;
  int	*c;
  int count;
  
  i = str;
  count = 0;
  while ( *i != '\0')
    {
      count++;
      i = i + 1;
    }
  return(count);
}






int	my_putchar(char c)
{
  write(1, &c, 1);
}

void	my_putnbr(int n,int order,char *base)
{
  char c;
  int m;
  int lenght;
  int ctrl_lenght;
  int sign;

  m = 0;
  lenght = 0;
  ctrl_lenght = 0;
  
  if ( n < 0 )
    {
      my_putchar(45);
      n = - n;
    }
      while ( n >= order )
	{
	  m = n;
	  while ( m >= order )
	    {
	      m = m / order;
	      lenght++;
	    }
	  while (lenght != ctrl_lenght - 1 && ctrl_lenght != 0)
	    {
	      my_putchar(base[0]);
	      ctrl_lenght--;
	    }
	  ctrl_lenght = lenght;
	  c = m;	  
	  while ( lenght != 0)
	    {
	      m = order * m;
	      lenght--;
	    }
	  my_putchar(base[c]);
	  n = n - m;
	}
	my_putchar(base[n]);
}

int	main()
{
  char	base[] = "0123456789ABCDEF";
  int	nbr;

  nbr = 139;
  my_putnbr_base(nbr,base);
}
