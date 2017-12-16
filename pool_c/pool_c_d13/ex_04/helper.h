#ifndef SECURITY_ANTI_MLT_INCLUDE
#define SECURITY_ANTI_MLT_INCLUDE

#include <unistd.h>
#include <stdlib.h>

void	my_put_error(char *str);
void	my_putchar(int n, char c);
int	my_putstr_slowly(char *str, int count_char);
void	my_rmp_char_by_space(int count_char);


#define SLEEP_WRITE 250000
#define SLEEP_ERASE 250000

#endif // SECURITY_ANTI_MLT_INCLUDE
