var white_block = document.getElementsByTagName("div")[2];
var count = 0;

white_block.textContent = count;
white_block.onclick = clickcount;


function clickcount()
{
	count++;
	white_block.textContent = count;
}