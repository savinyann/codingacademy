#ifndef TEST_H_
#define TEST_H_
#include <unistd.h>
#include <stdio.h>
#include <stdlib.h>

struct s_person
{
  char	*first_name;
  char	*last_name;
  int	age;
};

typedef struct s_person t_person;
t_person *new_person(char *first_name, char *last_name, int age);

#endif
