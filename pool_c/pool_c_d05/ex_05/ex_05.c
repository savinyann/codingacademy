#include <unistd.h>
#include <stdio.h>
int	my_str_isalpha(char *);	// return 1 if str contains only letter, else 0


int	my_str_isalpha(char *str)
{
  int	i;

  i = 0;
  if (str[i] == '\0')
    {
      return(0);
    }
  
  while (str[i] != '\0')
    {
      if (( str[i] >= 97 && str[i] <=122) || (str[i] >= 65 && str[i] <=90))
	{
	  i++;
	}
      else
	{
	  return(0);
	}
    }
  return(1);
}

/*
int	main()
{ 
  char str1[] = "helloworld";
  char str2[] = "hello world";
  char str3[] = "12545hello world456546";
  char str4[] = "Salut";
  char str5[] = "tu pues";
  char str6[] = "Rapasdepic";
  char str7[] = "s";
  char str8[] = "bulbizarresalamèchecarapuce";
  char str9[] = "@";
  char str10[] = "[";
  char str11[] = "`";
  char str12[] = "";   

  printf("1 %d\n",my_str_isalpha(str1));  
  printf("2 %d\n",my_str_isalpha(str2));
  printf("3 %d\n",my_str_isalpha(str3));
  printf("4 %d\n",my_str_isalpha(str4));
  printf("5 %d\n",my_str_isalpha(str5));
  printf("6 %d\n",my_str_isalpha(str6));
  printf("7 %d\n",my_str_isalpha(str7));
  printf("8 %d\n",my_str_isalpha(str8));
  printf("@ %d\n",my_str_isalpha(str9));
  printf("[ %d\n",my_str_isalpha(str10));
  printf("` %d\n",my_str_isalpha(str11));
  printf("{ %d\n",my_str_isalpha(str12));
}
*/
