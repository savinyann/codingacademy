#include <stdlib.h>
#include "video.h"
#include "material.h"
t_person	*create_person(char *last_name, char *first_name, int age);
void		view_person(t_person *person);


t_person	*create_person(char *last_name,char * first_name,int  age)
{
  t_person *person;
  
  person = malloc(sizeof(t_person));
  if(person == NULL)
    {
      return(NULL);
    }
  person->first_name = first_name;
  person->last_name = last_name;
  person->age = age;
  return(person);
}

void	view_person(t_person *person)
{
  my_putstr(person->last_name);
  my_putchar(10);
  my_putstr(person->first_name);
  my_putchar(10);
  my_putnbr(person->age);
  my_putchar(10);
}

  
int	main()
{
  char		*last_name;
  char		*first_name;
  int		age;
  t_person	*person;
  
  last_name = "Savin";
  first_name = "Yann";
  age = 28;
  person = malloc(sizeof(t_person));
  if(person == NULL)
    {
      return(0);
    }
  person = create_person(last_name, first_name, age);
  view_person(person);
  
  free(person);
}
