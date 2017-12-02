#include "struct.h"
#include "abs.h"
//#include "material.h"

void	my_init(t_my_struct *my_struct, int n, char *str);

void	my_init(t_my_struct *my_struct, int n, char *str)
{
  MY_ABS(n);
  my_struct->id = n;
  my_struct->str = str;
}

/*
int	main(int argc, char **argv)
{
  char	*str;
  int	id;
  t_my_struct	*my_struct;

  if(argc != 3)
    {
      printf("Error.\n");
      return(0);
    }
  id = atoi(argv[1]);
  str = argv[2];
  printf("fin de définition\n");
  my_struct = malloc(sizeof(t_my_struct));
  if(my_struct == NULL)
    {
      return(0);
    }
  printf("Mémoire allouée, définition de la structure\n");
  my_struct->id = 1;
  my_struct->str = "plouf";
  printf("Entrée fonction id = %d, str = %s:\n", my_struct->id, my_struct->str);
  my_init(my_struct, id, str);
  printf("Entrée fonction id = %d, str = %s:\n", my_struct->id, my_struct->str);}
*/
