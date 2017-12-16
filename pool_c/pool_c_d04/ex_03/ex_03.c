#include <unistd.h>
#include <stdio.h>

int		my_strlen(char *str);	// return the lenght of "str"


int	my_strlen(char *str)
{
  int	count;
  
  count = 0;
  while ( *str != '\0')
    {
      count++;
      str = str + 1;
    }
  return(count);
}

/*
int	main()
{
  printf("%d\n",my_strlen(""));
  printf("%d\n",my_strlen("Bla"));
  printf("%d\n",my_strlen("Blabla"));
  printf("%d\n",my_strlen("Blablabla"));
  printf("%d\n",my_strlen("Les chats ne font pas des chiens. Si les chats faisaient des chiens, alors qui ferait des chats ?"));
  printf("%d\n",my_strlen("123456789"));
}
*/
