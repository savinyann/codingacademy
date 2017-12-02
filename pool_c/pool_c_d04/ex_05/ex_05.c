#include <unistd.h>
#include <stdio.h>

int	my_getnbr(char *str);	// return a number in a string as an int.

int	my_getnbr(char *str)
{
  int	a;
  int	b;
  int	c;

  a = 0;
  sign = 1;
      if ( *str == 45 )
	{
	  sign = -1;
	  str++;
	}
      while ( *str >= 48 && *str <= 57 )
	{
	  a = a * 10 + (*str - 48) * b;
	  str++;
	}
      return(a);
}

/*
int	main()
{
  printf("%d\n", my_getnbr("0"));
  printf("%d\n", my_getnbr("-1024"));
  printf("%d\n", my_getnbr("1024"));
  printf("%d\n", my_getnbr("-2147483648"));
  printf("%d\n", my_getnbr("2147483647"));
}
*/
