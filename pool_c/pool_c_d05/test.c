#include <unistd.h>

int	my_putchar(char c)
{
  write(1, &c, 1);
}

int	my_putstr(char *str)
{
  int	i;

  i = 0;
  while (str[i] != '\0')
    {
      my_putchar(str[i]);
      i++;
    }
}

int	my_first_char_replace(char *str)
{
  str[0] = 'A';
}

int	copy_first_char(char *src, char *dst)
{
  dst[0] = src[0];
}

int	main()
{
  char	str[] = "hello\n";
  char	str2[] = "world\n";
  
  my_putstr(str);
  my_first_char_replace(str);
  my_putstr(str);
  my_putstr(str2);
  copy_first_char(str,str2);
  my_putstr(str);
  my_putstr(str2);
}
