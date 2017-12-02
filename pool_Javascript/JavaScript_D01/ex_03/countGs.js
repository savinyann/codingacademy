function countGs(str = "")
{
	res = str.split("");
	var count = 0;
	res.forEach(function(element)
	{
		if(element == "G")
		{
			count++;
		}
	});
	console.log(count);
}

countGs(process.argv[2]);