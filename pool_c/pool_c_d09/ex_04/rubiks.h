#ifndef SECURITY_ANTI_MLT_INCLUDE
#define SECURITY_ANTI_MLT_INCLUDE

#include <stdio.h>

void	print_tab(int **table);
void	algo_line(int **table, int line);
void	algo_colomn(int **table, int column);
void	algo_square(int **table, int square);
void	algo_line_reverse(int **table, int line);
void	algo_colomn_reverse(int **table, int column);
void	algo_square_reverse(int **table, int square);
int	is_in_line(int **table, int line, int value);
int	is_in_col(int **table, int column, int value);

#define TRUE 0
#define FALSE 1

#ifndef PRINT_SQUARE_DEBUG__
#define PRINT_SQUARE_DEBUG__ 1
#endif  //PRINT_SQUARE_DEBUG__

#endif //SECURITY_ANTI_MLT_INCLUDE
