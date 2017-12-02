#include <stdlib.h>
#include <unistd.h>
#include <stdio.h>

void	my_reset_ptr(char **ptr);
void	my_show_str(char **array);
void	my_putchar(char c);
void	my_putstr(char *str);

void	my_reset_ptr(char **ptr)
{
  int	i;

  i = 0;
  while( ptr[i] != NULL)
    {
      free(ptr[i]);
      ptr[i] = NULL;
      i++;
    }
  free(*ptr);
  ptr = NULL;
}

/*
int	main()
{
  char	*ptr21;
  char	*ptr22;
  char	**ptr2;

  ptr21 = malloc(3);
  ptr22 = malloc(3);
  ptr2 = malloc(2);
  ptr21[0] = 'a';
  ptr21[1] = 'b';
  ptr21[2] = 'c';
  ptr22[0] = 'd';
  ptr22[1] = 'e';
  ptr22[2] = 'f';
  ptr2[0] = ptr21;
  ptr2[1] = ptr22;
  //  my_reset_ptr(ptr2);
  // printf("%c %c\n", ptr2[0], ptr2[1]);
  printf("Affichage de ptr21:\n");
  my_putstr(ptr21);
  printf("\nAffichage de ptr22:\n");
  my_putstr(ptr22);
  printf("\nAffichage de ptr2:\n");
  my_show_str(ptr2);
  printf("\nLibération de la mémoire\n");
  my_reset_ptr(ptr2);
  printf("\nAffichage de ptr2:\n");
  my_show_str(ptr2);
  printf("\nAffichage de ptr21:\n");
  my_putstr(ptr21);
  printf("\nAffichage de ptr22:\n");
  my_putstr(ptr22);
}


void	my_putchar(char c)
{
  write(1, &c, 1);
}

void	my_putstr(char *str)
{
  int	i;

  i = 0;
  while(str[i] != '\0')
    {
      my_putchar(str[i]);
      i++;
    }
}

void	my_show_str(char **array)
{
  int	i;

  i = 0;
  while( array[i] != '\0' )
    {
      my_putstr(array[i]);
      my_putchar(10);
      i++;
    }
}
*/
