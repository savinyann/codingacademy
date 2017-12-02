#include <unistd.h>
#include <stdio.h>
char	*my_revstr(char *);

char	*my_revstr(char *str)
{
  int	n;
  int	m;
  char	temp;
  
  n = 0;
  m = 0;
  while ( str[n] != '\0')
    {
      n++;
    }
  char	 revstr[n];
  n--;
  while (n > m)
    {
      temp = str[m];
      str[m] = str[n];
      str[n] = temp;
      m++;
      n--;
    }
  return(str);
}

/*
int	main()
{
  char str2[] = "abcdefghijklmno";
  char str3[] = "ponmlkjihgfedcba";
  char str1[6] = "Salut";
  printf("%s ", str1);
  printf("devient %s\n", my_revstr(str1));  
  printf("%s ", str2);
  printf("devient %s\n", my_revstr(str2));
  printf("%s ", str3);
  printf("devient %s\n", my_revstr(str3));
}
*/
