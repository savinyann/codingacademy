var all_blocks = document.getElementsByTagName("body")[0];
var button = document.getElementsByTagName("button");
var selection = document.getElementsByTagName("select")[0];
var size = 16;

button[0].onclick = increaseFontSize;
button[1].onclick = decreaseFontSize;

selection.onchange = function()
{
	changeBackgroundColor(this.value);
};


function increaseFontSize()
{
	size++;
	all_blocks.style.fontSize = size+"px";
}

function decreaseFontSize()
{
	size--;
	all_blocks.style.fontSize = size+"px";
}


function changeBackgroundColor(color)
{
	all_blocks.style.backgroundColor = color;
}