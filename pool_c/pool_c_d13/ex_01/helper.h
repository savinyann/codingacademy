#ifndef SECURITY_ANTI_MLT_INCLUDE
#define SECURITY_ANTI_MLT_INCLUDE

#include <unistd.h>
#include <stdlib.h>

void	my_put_error(char *str);
void	my_putchar(int n, char c);
void	my_putstr_slowly(char *str);
char	*array_to_str(char **array);
char	*filling_string(char *str, char **array);

#define SLEEP 250000

#endif // SECURITY_ANTI_MLT_INCLUDE
