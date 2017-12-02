#include <unistd.h>

void	my_aff_comb(void);	// display all sorted combinations of 3 digits
void	loop(int, int, int);	// take all sorted combinations of 3 digits
void	display(int, int, int);	// display 3 "int"
void	my_putchar(char);	// write "char" on standard output


void	my_putchar(char c)
{
  write(1, &c, 1);
}

void	display(int a,int b,int c)
{
  my_putchar(a);
  my_putchar(b);
  my_putchar(c);
  if (a + b + c != 168)
    {
      my_putchar(44);
      my_putchar(32);
    }
}


void	loop(int a, int b, int c)
{
  while (a <= 55)
    {
      if (b <= 56)
	{
	  if (c <= 57)
	    {
	      display(a,b,c);
	      c++;
	    }
	  else
	    {
	      b++;
	      c = b + 1;
	    }
	}
      else
	{
	  a++;
	  b = a + 1;
	  c = b + 1;
	}
    }
}


void	my_aff_comb(void)
{
  int a;
  int b;
  int c;

  a = 48;
  b = 49;
  c = 50;

  loop(a,b,c);
}
