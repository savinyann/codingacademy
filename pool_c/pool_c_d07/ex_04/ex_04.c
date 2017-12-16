#include <stdio.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <unistd.h>
#include <stdlib.h>
// Test fichier vide
void	my_read_file(char *path);
void	my_putchar(char c);
void	my_putstr(char *c);
void	my_show_str(char **array);

void	my_putchar(char c)
{
  write(1, &c, 1);
}

void	my_putstr(char *str)
{
  while ( *str != '\0')
    {
      my_putchar(*str);
      str = str + 1;
    }
}


void	my_read_file(char *path)
{
  int	i;
  int	fd;
  int	ret;
  char	*buffer;
  int	tmp;
  
  i = 0;
  ret = 0;
  tmp = 1;
  while(tmp != ret)
    {
      tmp = ret;
      i++;
      fd = open(path, O_RDONLY);
      if(fd == -1)
	{
	  printf("Error.\n");
	  return;
	}
      buffer = malloc(i);
      if(buffer == NULL)
	{
	  printf("Error.\n");
	  return;
	}
      ret = read(fd, buffer, i);
      close(fd);
      free(buffer);
    }
  fd = open(path, O_RDONLY);
  buffer = malloc(tmp);
  if(buffer == NULL)
    {
      printf("Error.\n");
      return;
    }
  read(fd, buffer, tmp);
  close(fd);
  my_putstr(buffer);
  free(buffer);
}


int	main(int argc, char **argv)
{
  if(argc != 2)
    {
      printf("Error.\n");
    }
  else
    {
      my_read_file(argv[1]);
    }
}









/*      
      //printf("Allocation mémoire pour buffer\n");
      //buffer = malloc(4000);
      //printf("mémoire allouée\nAllocation mémoire pour buffer[%d]\n", i);
      //buffer[i] = malloc(1);//WARNING - don't work at 1st try
      //printf("mémoire allouée\n");
      read(fd, buffer, 1);
      my_putchar(buffer[0]);
      i++;
    }
  printf("\n Buffer = \n");
  my_show_str(buffer);
  printf("\nFin de lecture\n");
  close(fd);
  my_show_str(buffer);
  i = 0;
  while(buffer[i])
    {
      free(buffer[i]);
      i++;
      }
  free(buffer);
  printf("\nFin du programme\n");
}
*/

