var port = $("#port").text()
var socket = io.connect('http://localhost:'+port)
username = ""
socket.on('broadcast', (broadcast) => display_broa(broadcast))
socket.on('welcome', (welcome) => display_syst(welcome))
socket.on('system', (system) => display_syst(system))
socket.on('message', (message) => display_mess(message))
socket.on('new_message', (message) => display_newm(message))

$("#username").keypress((e)=> {if(e.which == 13){nickName()}})
$("#send_username").click(() => nickName())


$("#message").keypress((e)=> {if(e.which == 13){sendMessage()}})
$("#send_message").click(() => sendMessage())

function nickName()
{
	if(username != $("#username").val())
	{
		socket.emit("change_username", $("#username").val())
		username = $("#username").val()
	}
	else
	{
		$("#chatroom").append("<p class='system'>Your nickname is already " + $("#username").val() + ".</p>")
	}
}

function sendMessage()
{
	socket.emit("new_message", $("#message").val())
	$("#message").val("")
}

function display_syst(message)
{
	$("#chatroom").append("<p class='system'>" + message + ".</p>")
}

function display_mess(message)
{
	$("#chatroom").append("<p class='self'>" + message + "</p>")
}

function display_newm(message)
{
	$("#chatroom").append("<p class='message'>" + message + "</p>")
}

function display_broa(message)
{
	$("#chatroom").append("<p class='broadcast'>" + message + ".</p>")
}