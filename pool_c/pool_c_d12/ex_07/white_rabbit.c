#include <stdio.h>
#include <stdlib.h>

int	follow_the_white_rabbit();

int	follow_the_white_rabbit()
{
  int	dice;
  int	sum;

  dice = 0;
  sum = 0;
    while(dice != 37)
      {
	dice = random() % 37 + 1;
	if(dice == 4 || dice == 5|| dice == 6|| dice == 17 || dice == 18 || dice ==  19 || dice == 20 || dice == 21)
	  {
	    printf("left\n");
	    sum = sum + dice;
	  }	
	if(dice == 13 || dice == 14 || dice == 33 || dice == 34 || dice == 35 || dice == 36)
	  {
	    printf("right\n");
	    sum = sum + dice;	    
	  }	
	if(dice == 15 || dice == 30)
	  {
	    printf("ahead\n");
	    sum = sum + dice;
	  }
	if(dice == 8 || dice == 16 || dice == 24 || dice == 26 || dice == 32)
	  {
	    printf("back\n");
	    sum = sum + dice;
	  }	
	if(dice == 1 || dice == 37)
	  {
	    printf("RABBIT !!!\n");
	    sum = sum + dice;
	    return(sum);
	  }
      }
}

/*
    int	main(int c, char **v)
{
  int	n;

  //n = atoi(v[1]);
  srandom(3);
  n = follow_the_white_rabbit();
  printf("n = %d\n", n);
}
*/
