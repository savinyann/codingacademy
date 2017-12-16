#ifndef SECURITY_ANTI_MLT_INCLUDE
#define SECURITY_ANTI_MLT_INCLUDE

#include <unistd.h>
#include <stdlib.h>

void	my_put_error(char *str);
void	my_putchar(int n, char c);
void	my_putstr(char *str);
int	my_strlen(char *str);
void	display_char_2by2(char *str);
void	display_char(char *str, int i, int lenght);
void	my_putstr_in_order(char *str, int i, int j);
int	my_putchar_from_a(char c, char i);


#define SLEEP_DISPLAY_CHAR 300000
#define SLEEP_A_TO_CHAR 150000
#endif // SECURITY_ANTI_MLT_INCLUDE
