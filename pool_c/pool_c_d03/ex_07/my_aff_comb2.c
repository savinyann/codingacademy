#include <unistd.h>
#include <stdio.h>

void	my_aff_comb2(void);		// display all combinations of 2 numbers
void	loop(int, int, int, int);	// dependency for my_aff_comb2
void	loop2(int, int, int, int);	// dependency for loop
void	display();			// display 2 numbers of 2 digits
void	my_putchar(char);		// write "char" on standard output


void	my_putchar(char c)
{
  write(1, &c, 1);
}


void	display2(int a,int b,int c,int d)
{
  my_putchar(a);
  my_putchar(b);
  my_putchar(32);
  my_putchar(c);
  my_putchar(d);
  if (a == 57 && b == 56 && c == 57 && d == 57)
    {
      
    }
  else
    {
      my_putchar(44);
      my_putchar(32);
    }
}


void	loop(int a, int b, int c, int d)
{
  while (a <= 57)
    {
      if (b <= 57)
	{
	  loop2(a, b, c, d);
	  b++;
	  // printf("%d %d %d %d\n", a, b, c, d);
	}
      else
	{
	  a++;
	  b = 48;
	  c = 48;
	  d = 48;
	}
    }
}


void	loop2(int a, int b, int c, int d)
{
  while ( c <= 57)
    {
      if ( d <= 57)
	{
	  if ( (a < c ) || ( a == c && b < d ) )
	    {
	      display2(a,b,c,d);
	      d++;
	      // printf("%d %d %d %d\n", a, b, c, d);
	    }
	  else
	    {
	      d++;
	    }
	}
      else
	{
	  c++;
	  d = 48;
	}
    }
}


void	my_aff_comb2(void)
{
  int a;
  int b;
  int c;
  int d;
  
  a = 48;
  b = 48;
  c = 48;
  d = 48;

  loop(a,b,c,d);
}

 int	main()
 {
   my_aff_comb2();
 }
