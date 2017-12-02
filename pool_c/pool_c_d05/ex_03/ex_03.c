#include <unistd.h>
#include <stdio.h>
int	my_strcmp(char *str1,char *str2);	// do what strcmp does
int	my_compchar(char str1,char str2);	// return str1 - str2
void	my_putchar(char c);			// write char in standard output	


void	my_putchar(char c)
{
  write(1, &c, 1);
}

int	my_compchar(char str1,char str2)
{
  int	diff;

  diff = str1 - str2;
  return(diff);
}

int	my_strcmp(char *str1,char *str2)
{
  int	n;

  n = 0;
  while ( str1[n] == str2[n] && str1[n] != '\0' && str2[n] != '\0' )
    {
      n++;
    }
  my_compchar(str1[n],str2[n]);
}

/*
int	main()
{
  char	str1[] = "abcdeff";
  char	str2[] = "abcdefg";
  char	str3[] = "abcdeff";
  char	str4[] = "abcdefghijklmnopqrstuvwxyz";
  char	str5[] = "abcdef";
  char	str6[] = "abcdef1";
  char	str7[] = "abcdefgh";
  char	str8[] = "abcdefgz";
  printf("%d\n",my_strcmp(str1,str2));  
  printf("%d\n",my_strcmp(str3,str4));
  printf("%d\n",my_strcmp(str5,str6));
  printf("%d\n",my_strcmp(str7,str8));
}
*/
