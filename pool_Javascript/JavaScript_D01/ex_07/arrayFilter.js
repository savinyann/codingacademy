function filter(array, test)
{
	var result = [];
	array.forEach(function(element)
	{
		if(test(element))
		{
			result.push(element);
		}
	});
	return(result);
}

function is_odd(cell)
{
	if(cell %2 ==0)
		return(true);
	return(false);
}


var array = [0,1,2,3,4,5,6,7,8,9];
console.log(filter(array, is_odd));