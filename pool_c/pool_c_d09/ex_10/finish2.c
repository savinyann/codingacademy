#include "rubiks2.h"

// Dans toutes les fonctions, i fait référence à une ligne et j à une colonne.
// Les itérateurs seront appelés k.

void	print_tab(int **table) // Affiche le pseudo-rubiks cube.
{
  int	i;
  int	j;
  
  i = 0;
  printf("-----------------\n");
  while(i != 4)
    {
      printf("| %d | %d | %d | %d |\n",table[i][0], table[i][1], table[i][2], table[i][3]);
      printf("-----------------\n");
      i++;
    }
}


void	algo_line(int **table, int i) // fais tourner la ligne "i" du cube vers la gauche.
{
  int	j;
  int tmp;

  j = 0;
  tmp = table[i][j];
  while(j != 3)
    {
      table[i][j] = table[i][j+1];
      j++;
    }
  table[i][3] = tmp;
  if(PRINT_SQUARE_DEBUG__ == 1)
    {
      printf("Rotate Left line %d\n", i);
      print_tab(table);      
    }
}


void	algo_column(int **table, int j) // fait tourner la colonne "j" du cube vers le haut.
{
  int	i;
  int tmp;
  
  i = 0;
  tmp = table[i][j];
  while(i != 3)
    {
      table[i][j] = table[i+1][j];
      i++;
    }
  table[3][j] = tmp;
  if (PRINT_SQUARE_DEBUG__ == 1)
    {
      printf("Rotate Top column %d\n", j);
      print_tab(table);
      }
}


void	algo_square(int **table, int square) // fais tourner le carré "square" dans le sens normal.
{
  int tmp;
  
  if(square == 0)
    {
      tmp = table[0][0];
      table[0][0] = table[1][0];
      table[1][0] = table[1][1];
      table[1][1] = table[0][1];
      table[0][1] = tmp;
    }
  if(square == 1)
    {
      tmp = table[0][2];
      table[0][2] = table[1][2];
      table[1][2] = table[1][3];
      table[1][3] = table[0][3];
      table[0][3] = tmp;
    }
  if(square == 2)
    {
      tmp = table[2][0];
      table[2][0] = table[3][0];
      table[3][0] = table[3][1];
      table[3][1] = table[2][1];
      table[2][1] = tmp;
    }
  if(square == 3)
    {
      tmp = table[2][2];
      table[2][2] = table[3][2];
      table[3][2] = table[3][3];
      table[3][3] = table[2][3];
      table[2][3] = tmp;
    }
  if(PRINT_SQUARE_DEBUG__ == 1)
    {
      printf("Rotate Clockwise square %d\n", square);
      print_tab(table);
      }
}


void	algo_line_reverse(int **table, int i) // fait tourner la ligne "i" vers la droite.
{
  int	j;
  int tmp;

  j = 3;
  tmp = table[i][j];
  while(j != 0)
    {
      table[i][j] = table[i][j-1];
      j--;
    }
  table[i][0] = tmp;
  if(PRINT_SQUARE_DEBUG__ == 1)
    {
      printf("Rotate Right line %d\n", i);
      print_tab(table);      
    }
}


void	algo_column_reverse(int **table, int j) // fait tourner la ligne "j" vers le bas.
{
  int	i;
  int tmp;
  
  i = 3;
  tmp = table[i][j];
  while(i != 0)
    {
      table[i][j] = table[i-1][j];
      i--;
    }
  table[0][j] = tmp;
  if (PRINT_SQUARE_DEBUG__ == 1)
    {
      printf("Rotate Down column %d\n", j);
      print_tab(table);
      }
}


void	algo_square_reverse(int **table, int square) // fait tourner le cube "square" dans le sens inverse.
{
  int tmp;
  
  if(square == 0)
    {
      tmp = table[0][0];
      table[0][0] = table[0][1];
      table[0][1] = table[1][1];
      table[1][1] = table[1][0];
      table[1][0] = tmp;
    }
  if(square == 1)
    {
      tmp = table[0][2];
      table[0][2] = table[0][3];
      table[0][3] = table[1][3];
      table[1][3] = table[1][2];
      table[1][2] = tmp;
    }
  if(square == 2)
    {
      tmp = table[2][0];
      table[2][0] = table[2][1];
      table[2][1] = table[3][1];
      table[3][1] = table[3][0];
      table[3][0] = tmp;
    }
  if(square == 3)
    {
      tmp = table[2][2];
      table[2][2] = table[2][3];
      table[2][3] = table[3][3];
      table[3][3] = table[3][2];
      table[3][2] = tmp;
    }
  if(PRINT_SQUARE_DEBUG__ == 1)
    {
      printf("Rotate Counter Clockwise square %d\n", square);
      print_tab(table);
      }
}


int	is_in_line(int **table, int i, int value)	// renvoi 0 si "value" est dans
{							// la ligne "i", 1 sinon.
  int	j;

  j = 0;
  while(j != 4)
    {
      if(table[i][j] == value)
	{
	  return(0);
	}
      j++;
    }
  return(1);
}


int	is_in_col(int **table, int j, int value)	// renvoi 0 si value est dans
{							// la colonne "j", 1 sinon.
  int	i;
  
  i = 0;
  while(i != 4)
    {
      if(table[i][j] == value)
	{
	  return(0);
	}
      i++;
    }
  return(1); 
}


int	*look_for_space(int **table, int *lines, int *columns, int value)
{						// cherche un espace vide dans
  int	i;					// les lignes et les colonnes
  int	j;					// EMPTY.
  int	*space_found;				// Un espace est vide si il ne
						// contient pas "value".
  space_found = malloc(2*sizeof(int));		// Renvoi ses coordonnées (i, j)
  if(space_found == NULL)			// si il en trouve un, "NULL" sinon.
    {
      return NULL;
    }
  i = 0;
  while(i != 4)
    {
      if(lines[i] == 0)
	{
	  j = 0;
	  while(j != 4)
	    {
	      if (columns[j] == 0)
		{
		  if(table[i][j] != value)
		    {
		      space_found[0] = i;
		      space_found[1] = j;
		      return(space_found);
		    }
		}
	      j++;
	    }
	}
      i++;
    }
  return(NULL);
}



int	*look_for_value(int **table, int *lines, int *columns, int value)
{						// cherche "value" dans les
  int	i;					// lignes et les colonnes
  int	j;					// EMPTY.
  int	*val_found;				// Renvoi les coordonées (i, j)
						// si il trouve value, NULL sinon.
  val_found = malloc(2*sizeof(int));
  if(val_found == NULL)
    {
      return(NULL);
    }
  i = 0; 
  while(i != 4)
    {
      if(lines[i] == 0)
	{
	  j = 0;
	  while(j != 4)
	    {
	      if (columns[j] == 0)
		{
		  if(table[i][j] == value)
		    {
		      val_found[0] = i;
		      val_found[1] = j;
		      return(val_found);
		    }
		}
	      j++;
	    }
	}
      i++;
    }
  return(NULL);
}


void	rotate_lines(int **table, int i, int offset)	// fait tourner la ligne i
{							// n fois, où n est la valeur
  while(offset > 0)					// de offset.
    {							// Si offset est positif, la
      algo_line(table, i);				// ligne tournera vers la gauche.
      offset--;						// Si offset est négatif, la
    }							// ligne tournera vers la droite.
  while(offset < 0)
    {
      algo_line_reverse(table, i);
      offset++;
    }
}


void	rotate_columns(int **table, int j, int offset) // fait tourner la colonne j
{						         // n fois, où n est la valeur
  while(offset > 0)					 // de l'offset.
    {							 // Si offset est positif, la
      algo_column(table, j);				 // colonne tournera vers le haut
      offset--;						 // Si offset est négatif, la
    }							 // colonne tournera vers le bas.
  while(offset < 0)
    {
      algo_column_reverse(table, j);
      offset++;
    } 
}


void line_to_square(int **table, int i) // Déplace les éléments de la ligne "i" dans le carré "i"
{
  algo_square(table, i);              	// exemple: line_to_square (table, 0);
  algo_square(table, i);		//
  rotate_lines(table, i, 2);		// transforme  | 0 | 1 | 2 | 3 |       en  | 2 | 3 | x | x |
  if(PRINT_SQUARE_DEBUG__ == 2)		//             | x | x | x | x |           | 1 | 0 | x | x |
    {					//             | x | x | x | x |           | x | x | x | x |
      print_tab(table);			//             | x | x | x | x |           | x | x | x | x |
    }
}


void	build_first_square(int **table)	// Constuit le carré "0".
{
  build_first_line(table);
  line_to_square(table, 0);
}


void	build_first_line(int **table)		// Assemble les quatre "0" du cube sur la première ligne.
{
  int	*ret_value;
  int	*ret_space;
  int	lines[4];
  int	columns[4];
  int	k;


  columns[0] = EMPTY;
  columns[1] = EMPTY;
  columns[2] = EMPTY;
  columns[3] = EMPTY;
  k = 0;
  while( k != 4)
    {
      lines[0] = BLOCKED;					// cherche "0" dans les
      lines[1] = EMPTY;						// ligne EMPTY
      lines[2] = EMPTY;						// et stocke les coordonées
      lines[3] = EMPTY;					        // trouvées dans la variable
      ret_value = look_for_value(table, lines, columns, 0);	// ret_value.
      
      lines[0] = EMPTY;						// cherche un espace vide (non "0")
      lines[1] = BLOCKED;					// dans la ligne EMPTY
      lines[2] = BLOCKED;					// et stocke les coordonnées
      lines[3] = BLOCKED;					// trouvée dans la variable
      ret_space = look_for_space(table, lines, columns, 0);	// ret_space.
      
      if(ret_space == NULL || ret_value == NULL)		// Si aucune valeur ou aucune espace
	{							// vide n'a été trouvé, la fonction s'arrète
	  return;						// (empèche de seg_fault).
	}
      rotate_lines(table, ret_value[0], ret_value[1] - ret_space[1]);   // Déplace le "0" trouvé
      rotate_columns(table, ret_space[1], ret_value[0] - ret_space[0]); // dans l'espace vide trouvé.
      k++;
    }
}


void	build_second_square(int **table)	// Construit le carré "1".
{
  build_last_line(table);
  line_to_square(table, 3);
  push_it_up(table);
}


void	build_last_line(int **table)		// Assemble les quatre "1" du cube sur la dernière ligne.
{
  int	*ret_value;
  int	*ret_space;
  int	lines[4];
  int	columns[4];
  int	k;
  
  columns[0] = EMPTY;
  columns[1] = EMPTY;
  columns[2] = EMPTY;
  columns[3] = EMPTY;
  k = 0;
  while( k != 4)
    {
      lines[0] = EMPTY;						// cherche "1" dans les
      lines[1] = EMPTY;						// ligne EMPTY
      lines[2] = EMPTY;						// et stocke les coordonées
      lines[3] = BLOCKED;		       		        // trouvées dans la variable
      ret_value = look_for_value(table, lines, columns, 1);	// ret_value.

      lines[0] = BLOCKED;					// cherche un espace vide (non 0)
      lines[1] = BLOCKED;					// dans la ligne EMPTY
      lines[2] = BLOCKED;					// et stocke les coordonnées
      lines[3] = EMPTY;						// trouvée dans la variable
      ret_space = look_for_space(table, lines, columns, 1);
      if(ret_space == NULL || ret_value == NULL)		// Si aucune valeur ou aucune espace
	{							// vide n'a été trouvé, la fonction s'arrète
	  return;						// (empèche de seg_fault).
	}
      if(ret_value[1] >= 2)							// Déplace le "1" trouvé
	{									// dans l'espace vide trouvé
	  rotate_lines(table, 3, ret_space[1] - ret_value[1]);			// sans modifié le carré 0
	  rotate_columns(table, ret_value[1], ret_value[0] - ret_space[0]);	// construit dans l'étape
	}									// précédente.
      else									// 
	{									// Un crayon et une feuille
	  rotate_lines(table, ret_value[0], 3 - ret_value[1]);			// est le meilleur moyen de
	  rotate_lines(table, 3, 3 - ret_space[1]);				// comprendre ce qui se passe
	  rotate_columns(table, 3, -1);						// je pense.
	}
      k++;
    }
}


void	push_it_up(int **table)	// Déplace le les éléments du carré 3 dans le carré 1.
{
  rotate_columns(table, 2, 2);
  rotate_columns(table, 3, 2);
}


void	build_final_line(int **table)		// Construit les carrés "2" et "3".
{
  build_two_last_line(table);
  line_to_square(table, 3);
}


void	build_two_last_line(int **table)	// Assemble les "2" dans la lignes "2"
{						// et les "3" dans la ligne "3".
  int	*ret_value;
  int	*ret_space;
  int	lines[4];
  int	columns[4];
  int	k;
  
  lines[0] = BLOCKED;	// Bloquer les lignes 0 et 1
  lines[1] = BLOCKED;	// pour ne pas les déconstruire.
  columns[0] = EMPTY;
  columns[1] = EMPTY;
  columns[2] = EMPTY;
  columns[3] = EMPTY;
  k = 0;
  while( k != 4)
    {
      lines[2] = EMPTY;						//
      lines[3] = BLOCKED;					// cherche un 3 dans la ligne 2.
      ret_value = look_for_value(table, lines, columns, 3);	//

      lines[2] = BLOCKED;					// cherche un espace vide pour
      lines[3] = EMPTY;						// recevoir le 3 trouvé précédemment.
      ret_space = look_for_space(table, lines, columns, 3);	// Cet espace vide ne peut que contenir un 2.
      
      if(ret_space == NULL || ret_value == NULL)		// Si aucun 3 n'a été trouvé dans la ligne 2,
	{							// la fonction s'arrète
	  return;						// (évite de seg_fault).
	}
      rotate_lines(table, ret_value[0], ret_value[1] - 3);	// Echange le 3 trouvé sur la ligne 2 contre
      rotate_lines(table, ret_space[0], ret_space[1] - 2);	// le 2 trouvé sur la ligne 3, 
      algo_square(table, 3);					// sans changer la ligne des autres cases.
      k++;							// exemple:
      lines[2] = EMPTY;						//      initial              rotate            algo_square(3)
      lines[3] = BLOCKED;					// | 3 | a | b | c | => | a | b | c | 3 | => | a | b | 2 | c |
    }								// | z | 2 | x | y | => | y | z | 2 | x | => | y | z | x | 3 | 
}


int	main()
{
  int	**table;
  int	i;
  int	j;
  int	*lines;
  int	*columns;
  int	*empty_space;
  int	*value_found;

  i = 0;
  empty_space = malloc(2*sizeof(int));
  if(empty_space == NULL)
    {
      return(0);
    }
  value_found = malloc(2*sizeof(int));
  if(value_found == NULL)
    {
      return(0);
    }
  lines = malloc(4*sizeof(int));
  if(lines == NULL)
    {
      return(0);
    }
  columns = malloc(4*sizeof(columns));
  if(columns == NULL)
      {
	return(0);
      }
  table = malloc(5 *sizeof(int *));
  if(table == NULL)
    {
      return(0);
    }
  while(i != 4)
    {
      table[i] = malloc(5 * sizeof(int));
      if(table[i] == NULL)
	{
	  return(0);
	}
      i++;
    }
  table[0][0] = 3;
  table[0][1] = 2;
  table[0][2] = 1;
  table[0][3] = 3;
  table[1][0] = 0;
  table[1][1] = 0;
  table[1][2] = 2;
  table[1][3] = 1;
  table[2][0] = 1;
  table[2][1] = 3;
  table[2][2] = 2;
  table[2][3] = 0;
  table[3][0] = 2;
  table[3][1] = 3;
  table[3][2] = 1;
  table[3][3] = 0;
  print_tab(table);
  build_first_square(table);
  build_second_square(table);
  build_final_line(table);
  print_tab(table);
  while(i != 5)
    {
      free(table[i]);
      i++;
    }
  free(table);
  free(empty_space);
  free(value_found);
  free(lines);
  free(columns);
  return(0);
}
