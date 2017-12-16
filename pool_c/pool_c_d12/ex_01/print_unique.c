#include <stdio.h>

void	print_unique(int *, int);


void	print_unique(int *tab, int n)
{
  int	i;
  int	j;
  int	chck_first;

  i = 0;
  chck_first = 0;
  while(i != n)
     {
       j = 0;
       while((tab[j] != tab[i] && j != n) || i == j)
	 {
	   j++;
	 }
       if(j == n)
	 {
	   if(chck_first)
	     {
	       printf(",");
	     }
	   chck_first = 1;
	   printf("%d", tab[i]);
	 }
       i++;
     }
  printf("\n");
}

/*
int	main()
{
  int	tab0[] = {0};
  int	tab4[] = {0,1,0};
  int	tab1[] = {0,0,1,2,2,2};
  int	tab2[] = {1,2,3,2,74};
  int	tab3[] = {2,3};
  print_unique(tab0,1);
  print_unique(tab1,4);
  print_unique(tab2,5);
  print_unique(tab3,2);
  print_unique(tab4,3);
}
*/
