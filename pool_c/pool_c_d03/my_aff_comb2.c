#include <unistd.h>

int	my_aff_comb();

int	my_putchar(char c)
{
  write(1, &c, 1);
}

int	my_aff_comb()
{
  int a;
  int b;
  int c;

  a = 48;
  b = 49;
  c = 50;
  
  while (a <= 55)
 {  
    if (b <= 56)
    {
      if (c <= 57)
	{
	  my_putchar(a);
	  my_putchar(b);
	  my_putchar(c);
	  my_putchar(44);
	  my_putchar(32);
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

int	main()
{
  my_aff_comb();
}
