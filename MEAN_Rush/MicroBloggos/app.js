var cookieParser = require('cookie-parser')
var bodyParser = require('body-parser')
var favicon = require('serve-favicon')
var express = require('express')
var jwt = require('jwt-express')
var logger = require('morgan')
var path = require('path')

var index = require('./app_server/routes/index');

var app = express()
var server = require('http').Server(app)
var io = require("socket.io")(server)


app.use(function(request, response, next)
{
	response.header("Access-Control-Allow-Origin", "*");
	response.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
	response.header('Access-Control-Allow-Methods', 'POST, GET, PUT, DELETE, OPTIONS');
	next();
});

// view engine setup
app.set('views', path.join(__dirname, 'app_server', 'views'));
app.set('view engine', 'jade');

//app.use(jwt.init('echo'));
app.use(favicon(path.join(__dirname, 'public', 'favicon.ico')));
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use('/', index);

// catch 404 and forward to error handler
app.use(function(req, res, next)
{
	var err = new Error('Not Found');
	err.status = 404;
	next(err);
});

// error handler
app.use(function(err, req, res, next)
{
	// set locals, only providing error in development
	res.locals.message = err.message;
	res.locals.error = req.app.get('env') === 'development' ? err : {};

	// render the error page
	res.status(err.status || 500);
	res.render('error');
});

io.on('connection', (socket => console.log("someone connected to socket")))

module.exports = app;



/***************   Sending a request from a Terminal   ***************\

clear && curl -H "Content-Type: application/json" -X PUT -d '{"name":"Fanny", "password":"Rapace05","email":"sniperfannette@hotmail.fr"}' http://localhost:3000/users/5a55e0add66c2c1769adde3b && printf "\n"

*/
