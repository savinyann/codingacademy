var white_box = document.getElementsByTagName("div")[2];
var black_square = document.getElementsByTagName("canvas")[0];
var pos_box = document.getElementsByTagName("div")[3];
white_box.setAttribute("position", "relative");
black_square.setAttribute("draggable","true");
white_box.style.position = "relative";
black_square.style.position = "absolute";
black_square.ondragstart= drag;
white_box.ondrop= drop;
white_box.ondragover= allowDrop;


function allowDrop(ev)
{
	ev.preventDefault();
}

function drag(ev)
{
	ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev)
{
	offsetX = black_square.style.left;
	offsetY = black_square.style.top;
	var startX = (ev.clientX - 345) + "px";
	var startY = (ev.clientY - 205) + "px";
	black_square.style.position = "absolute";
	ev.preventDefault();
	black_square.style.left= startX;
	black_square.style.top= startY;
	pos_box.innerHTML = "New Coordinates => {x: "+ startX +", y: "+ startY +"}";
}