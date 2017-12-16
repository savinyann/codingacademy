function fizzBuzz(nbr = 20)
{
	var count = 1;
	var str = "";
	while(count <= nbr)
	{
		if(count%5 == 0 && count%3 == 0)
		{
			str= str+"FizzBuzz";
		}
		else if(count%3 == 0)
		{
			str= str+"Fizz";
		}
		else if(count%5 == 0)
		{
			str= str+"Buzz";
		}
		else
		{
			str= str+count;
		}
		if(count != nbr)
		{
			str= str+", "
		}
		else
		{
			str= str+"."
		}
			count++;
	}
	console.log(str);
}


fizzBuzz(process.argv[2]);