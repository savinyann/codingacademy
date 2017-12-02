#include <stdio.h>
#include <stdlib.h>

int	magic_square(int *sqr);
int	sum_dia(int *sqr);
int	sum_adia(int *sqr);
int	sum_lin(int n1, int n2, int n3);
int	sum_col(int n1, int n2, int n3);

	    
int	magic_square(int *sqr)
{
  int	i;
  int	dia;
  int	adia;
  int	col;
  int	lin;

  i = 0;  
  dia = sum_dia(sqr);
  adia = sum_adia(sqr);
  if(dia != adia)
      return(1);
  while(i != 3)
    {
      lin = sum_lin(sqr[3 * i], sqr[3 * i + 1], sqr[3*i + 2]);
      col = sum_col(sqr[i], sqr[i + 3], sqr[i + 6]);
      if(lin != col)
	  return(1);
      i++;
    }
  if(dia != lin)
      return(1);
  return(0);
}


int	sum_lin(int n1, int n2, int n3)
{
  int sum;
  
  sum = n1 + n2 + n3;
  return(sum);
}


int	sum_col(int n1, int n2, int n3)
{
  int sum;
  
  sum = n1 + n2 + n3;
  return(sum);
}


int	sum_dia(int *sqr)
{
  int sum;
  
  sum = sqr[0] + sqr[4] + sqr[8];
  return(sum);
}


int	sum_adia(int *sqr)
{
  int sum;
  
  sum = sqr[2] + sqr[4] + sqr[6];
  return(sum);
}

/*
int	main()
{
  int	result;
  int	tab[] = {4,9,2,3,5,7,8,1,6};

  result = magic_square(tab);
  printf("result = %d\n", result);
}
*/
