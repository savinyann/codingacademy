#include <unistd.h>
#include <stdio.h>

void		my_sort_int_table(int *, int); // display sorted tab "*int"
void		my_sort_int(int *, int);// sort int from "int"-sized tab "*int"
void		my_putnbr(int);		// write "int" on standard output 
char		my_digit_to_char(int);	// return digit "int" into a char
long int	my_reversenbr(int);	// return reversed digit order of "int"
void		my_putchar(char);	// write "char" on standard output


void	my_putchar(char c)
{
  write(1, &c, 1);
}


long int	my_reversenbr(int n)
{
  long int	m;

  m = 0;
  while ( n != 0 )
    {
      m = 10* m + n % 10;
      n = n / 10;
    }
  return(m);
}


char	my_digit_to_char(int n)
{
  char	c;

  if ( n < 0 )
    {
      n = - n;
    }
  c = n + 48;
  return(c);
}


void	my_putnbr(int n)
{
  long int	m;
  long int	l;

  m = 42;
  if ( n < 0 )
    {
      my_putchar(45);
    }    
  l = (my_reversenbr(n));
  while ( l != 0 || m == 42)
    {
      m = l % 10;
      l = l / 10;
      my_putchar(my_digit_to_char(m));
    }
  while ( n % 10 == 0 && n != 0)
    {
      my_putchar(48);
      n = n / 10;
    }
}

void	my_sort_int(int *tab, int size)
{
  int a;
  int b;
  int c;

  a = 0;
  b = 1;
  while (a < size)
    {
      while ( b <= size)
	{
	  if (tab[a] > tab[b])
	    {
	      c = tab[a];
	      tab[a] = tab[b];
	      tab[b] = c;
	      b = a + 1;
	    }
	  else
	    {
	      b++;
	    }
	}
      a++;
      b = a + 1;
    }
}

void my_sort_int_table(int *tab, int size)
{
  int	n;

  n =	0;
  my_sort_int(tab, size);  
  while (n < size)
    {
      my_putnbr(tab[n]);
      my_putchar(32);
      n++;
    }
  my_putnbr(tab[n]);
}



int	main()
{
  int size;
  int tab[size];

  size = 10;
  tab[0] = 3;
  tab[1] = 10;
  tab[2] = 27;
  tab[3] = 15;
  tab[4] = 371;
  tab[5] = -2;
  tab[6] = 13;
  tab[7] = 100;
  tab[8] = 527;
  tab[9] = 105;
  tab[10] = 341;
  printf("%d,\n", tab[0]);
  printf("%d,\n", tab[1]);
  printf("%d,\n", tab[2]);
  printf("%d,\n", tab[3]);
  printf("%d,\n", tab[4]);
  printf("%d,\n", tab[5]);
  printf("%d,\n", tab[6]);
  printf("%d,\n", tab[7]);
  printf("%d,\n", tab[8]);
  printf("%d,\n", tab[9]);
  printf("%d,\n", tab[10]);
  printf("Sorting....\n");
  my_sort_int_table(tab,size);
  printf("\n");
}
