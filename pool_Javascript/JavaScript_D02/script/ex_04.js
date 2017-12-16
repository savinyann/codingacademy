var all_blocks = document.getElementsByTagName("body")[0];
var white_block = document.getElementsByTagName("div")[2];
var text_entered = "";
all_blocks.onkeypress= function(event) {myFunction(event)};

function myFunction(keypressed)
{
    var x = keypressed.which || keypressed.keyCode;
    text_entered += String.fromCharCode(x);
	white_block.textContent = text_entered.substr(-42);
}