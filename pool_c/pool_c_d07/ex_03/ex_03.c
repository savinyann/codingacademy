#include <stdio.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <unistd.h>

int	my_strlen(char *str);
void	my_write_file(int c, char *path, char **nbr);
void	my_putchar_in_file(char c, int fd);


void	my_putchar_in_file(char c, int fd)
{
  write(fd, &c, 1);
}


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


void	my_write_file(int c, char *path, char **text)
{
  int	i;
  int	fd;
  int	ret;

  i = 2;
  fd = open(path, O_CREAT | O_WRONLY | O_TRUNC, S_IRUSR);
  if( fd == -1)
    {
      printf("Error.\n");
      return;
    }
  while(i < c)
    {
      ret = write(fd, text[i], my_strlen(text[i]));
      if(ret == -1)
	{
	  printf("Error.\n");
	}
      my_putchar_in_file(10, fd);
      i++;
    }
  close(fd);
}

int	main(int argc, char **argv)
{
  if(argc <= 2)
    {
      printf("Error.\n");
    }
  else
    {
      my_write_file(argc, argv[1], argv);
    }
}
