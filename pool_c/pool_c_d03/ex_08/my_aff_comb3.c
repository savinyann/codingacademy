#include <unistd.h>
#include <stdio.h>

void	my_aff_combn(int);	// display all sorted combinations of digits
void	my_loopn(int, int);
void	loop(int, int);		// take all sorted combinations of digits
void	my_putchar(char);	// write "char" on standard output


void	my_putchar(char c)
{
  write(1, &c, 1);
}



void	my_aff_combn(int n)
{
  int a;

  a = 48;
  while( a + n <= 58 )
    {
      my_loopn(a, n);
      a++;
    }
}


void	my_loopn(int a, int n)
{
  int m;
  int b;
  int c;

  m = 0;
  b = 0;
  c = 48;
  while( a != 57 )
  {
    while( m != 2 && b != 9 )
      {
	my_putchar(c);
	m++;
      }
    loop(a,b);
    c = a;
    my_putchar(44);
    my_putchar(32);
    if ( b = 9 )
      {
	a++;
	b = 0;
      }
    m = 0;
  }
}


void	loop(int a, int b)
{
  a = a + b;
  if (a <= 57)
    {
      my_putchar(a);
    }
}


int	main()
{
  my_aff_combn(2);
}
