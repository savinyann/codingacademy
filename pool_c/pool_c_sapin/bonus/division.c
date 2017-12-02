#include <unistd.h>
#include <stdio.h>
#include <stdlib.h>

void	my_putchar(char c);
void	my_putnbr(int n);
void	my_putnbr_rec(int n);
void	division(char *dividende, char *diviseur);
void	division_rec(char *dividende, int diviseur_nb);


void	my_putchar(char c)
{
  write(1, &c, 1);
}


void	my_putnbr(int n)
{
if (n > 0)
{
  n = -n;
}
 my_putnbr_rec(n);
}


void	my_putnbr_rec(int n)
{
  if ( n != 0)
  {
    my_putnbr_rec(n /10);
    my_putchar(-n %10 + 48);
  }
  else
    {
      return;
    }
}



void	division(char *dividende, char *diviseur)
{
  int	diviseur_nb;

  diviseur_nb = atoi(diviseur);
  division_rec(dividende, diviseur_nb);
}


void	division_rec(char *dividende, int diviseur_nb)
{
  int	i;
  int	dividende_nb;
  int	quotient_nb;
  int	reste_nb;

  i = 0;
  reste_nb = 0;
  while(dividende[i] != '\0')
    {
      dividende_nb = 10 * reste_nb + dividende[i] - 48;
      quotient_nb = dividende_nb / diviseur_nb;
      reste_nb = dividende_nb % diviseur_nb;
      i++;
      if(quotient_nb == 0 && dividende[i-1] != '\0')
	{
	  my_putchar('0');
	}
      my_putnbr(quotient_nb);
    }
  my_putchar('\n');
}

int	main(int c, char **v)
{
  if(c != 3)
    {
      printf("Error: Invalid number of parameters.\n");
      return(0);
    }
  division(v[1], v[2]);
}
