#include <unistd.h>
#include <stdio.h>

char    *my_strstr(char *, char *);	// return begining of 2nd var in the 1st



char	*my_strstr(char *string,char *search)
{
  int	i;
  int	j;
  char *start;

  i = 0;
  j = 0;
  while (string[i] != '\0')
    {
      if ( string[i] == search[j] )
	{
	  j++;
	  if (search[j] == '\0')
	    {
	      start = &string[i - j + 1];
	      return(start);
	    }
	}
      else if ( j != 0)
	{
	  i = i - j + 1;
	  j = 0;
	}
      i++;
    }
  return(NULL);
}

/*
int	main()
{
  char str1[] = "Les chats sont forts.";
  char str2[] = "c";
  char str3[] = "s chats";
  char str4[] = "sont";
  char str5[] = "forts";
  char str6[] = "cons";

  printf(" %s\n", my_strstr(str1,str2));
  printf(" %s\n", my_strstr(str1,str3));
  printf(" %s\n", my_strstr(str1,str4));
  printf(" %s\n", my_strstr(str1,str5));
  printf(" %s\n", my_strstr(str1,str6));
}
*/

