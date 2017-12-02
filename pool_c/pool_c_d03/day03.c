#include <unistd.h>
int	my_putchar(char c)
{
write(1, &c, 1);
}

int	main()
{
char	c;

c = 65;
while (c < 70)
{
my_putchar(c);
c++;;
}
}