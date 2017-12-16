var play = document.getElementsByTagName("canvas")[0];
var pause = document.getElementsByTagName("button")[0];
var stop = document.getElementsByTagName("button")[1];
var mute = document.getElementsByTagName("button")[2];

var pre = document.getElementsByTagName("pre")[0];
pre.innerHTML = "<a href='https://www.youtube.com/watch?v=WWB01IuMvzA'>The Melancholy of Haruhi Suzumiya - God knows</a>";

var play_button = play.getContext("2d");

play_button.beginPath();              
play_button.lineWidth = 1;
play_button.strokeStyle = "white";
play_button.moveTo(6, 6);
play_button.lineTo(14,10);
play_button.lineTo(6,14);
play_button.lineTo(6, 6);
play_button.stroke();


var audio = new Audio("music.mp3");

play.onclick = function()
{
	audio.play();
};

pause.onclick = function()
{
	audio.pause();

};

stop.onclick = function()
{
	audio.pause();
	audio.currentTime = 0;
};

mute.onclick = function()
{
	audio.muted = (audio.muted) ? false : true;
	mute.textContent = (audio.muted) ? "Unmute" : "Mute";
};
