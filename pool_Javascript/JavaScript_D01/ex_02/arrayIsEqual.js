function arrayIsEqual(array1, array2)
{
	if(array1.length != array2.length)
	{
		return(false);
	}
	else
	{
		var count = 0;
		while(count < array1.length)
		{
			if(array1[count] == array2[count])
			{
				count++;
			}
			else
			{
				return(false);
			}
		}
		return(true);
	}
}


var array1 = [1,2,3,4,5,6,7,8,9];
var array2 = [1,2,3,4,5,6,7,8,9];
var array3 = [1,2,3,4,5,6,7,8,-3];
var array4 = [1,2,3];


if(arrayIsEqual(array1,array2))
	{
		console.log("True");
	}
	else
	{
		console.log("False");	
	}
if(arrayIsEqual(array3,array2))
	{
		console.log("True");
	}
	else
	{
		console.log("False");	
	}
if(arrayIsEqual(array3,array4))
	{
		console.log("True");
	}
	else
	{
		console.log("False");	
	}