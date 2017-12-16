#ifndef SECURITY_ANTI_MLT_INCLUDE
#define SECURITY_ANTI_MLT_INCLUDE

#include <unistd.h>
#include <stdlib.h>

void	my_put_error(char *str);
void	my_putchar(int n, char c);
void	my_putstr(char *str);
int	my_putstr_slowly(char *str);
void	my_erase_char(int count_char);

#define SLEEP_WRITE 250000
#define SLEEP_ERASE 250000

#endif // SECURITY_ANTI_MLT_INCLUDE
