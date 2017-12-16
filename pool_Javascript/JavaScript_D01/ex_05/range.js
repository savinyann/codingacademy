function range(start, end =0, step = 1)
{
	if(end == 0 && step == 1)
	{
		end = start;
		start = 0;
	}
	if((end - start)/step < 0)
	{
		var temp = end;
		end = start;
		start = temp;
	}

	var array = [];
	var j = 0;
	var count = (end-start)/step;
	while(count >= 0)
	{
		array[j] = start;
		start += step;
		count--;
		j++;
	}
	return(array);
}



console.log(range(301, 0, +20));
console.log(range(15));