#include "struct.h"
//#include "material.h"

void	my_init(t_my_struct *);

void	my_init(t_my_struct *my_struct)
{
  if(my_struct == NULL)
    {
      return;
    }
  my_struct->id = 0;
  my_struct->str = NULL;
}


int	main()
{
  char	*str;
  int	id;
  t_my_struct	*my_struct;

  id = 1;
  str = "plouf";
  printf("fin de définition\n");
  //my_struct = malloc(sizeof(t_my_struct));
  if(my_struct == NULL)
    {
      return(0);
    }
  printf("Mémoire allouée, définition de la structure\n");
  my_struct->id = 1;
  my_struct->str = str;
  printf("Entrée fonction %d, %s:\n", my_struct->id, my_struct->str);
  my_init(my_struct);
  printf("Entrée fonction %d, %s:\n", my_struct->id, my_struct->str);}