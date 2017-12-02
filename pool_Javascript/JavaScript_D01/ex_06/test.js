function objectDeeplyEqual(obj1, obj2)
{
	if(typeof obj1 != typeof obj2)
	{
		return(false);
	}
	else if(typeof obj1 == "object")
	{
		var array1 = Object.keys(obj1);

		var arr_test = true;
		array1.forEach(function(element)
		{
			if(!objectDeeplyEqual(obj1[element],obj2[element]))
			{
				arr_test = false;
			}
		});
		return(arr_test);
	}
	else if(obj1 != obj2)
	{
		return(false);
	}
	else
	{
		return(true);
	}
}


/*
var obj1 = {here: {is: "an"}, object: 2, array : [0,1,2,3]};
var obj2 = {here: {is: "an"}, object: 2, array : [0,1,2,3]} ; 
var test = objectDeeplyEqual(obj1,obj2)
console.log(test);
*/