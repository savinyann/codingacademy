function drawTriangle(height = 6)
{
	var count = 0;
	var dollar = "";
	while(count < height)
		{
				var dollar = dollar + "$";
				console.log(dollar)
				count++;
		}
}

drawTriangle(process.argv[2]);