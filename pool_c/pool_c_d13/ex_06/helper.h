#ifndef SECURITY_ANTI_MLT_INCLUDE
#define SECURITY_ANTI_MLT_INCLUDE

#include <unistd.h>
#include <stdlib.h>

void	my_put_error(char *str);
void	my_putchar(int n, char c);
void	my_putstr(char *str);
int	my_strlen(char *str);
int	my_putstr_slowly(char *str, int count_char);
void	my_rmp_char_by_space(int count_char, char *str);
void	display_char_2by2(char *str);
void	display_char(char *str, int i, int lenght);


#define SLEEP_WRITE 250000
#define SLEEP_ERROR 100000

#endif // SECURITY_ANTI_MLT_INCLUDE
