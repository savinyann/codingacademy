tokenManager = require('./tokenManager')
var app = require('./../../app')

function logVerify(request, response, next)
{
		console.log('MiddleWare Initialized')	
	// console.log("####  LOG VERIFY  ####")
	// console.log("####  STEP 1  ####")

	var token = request['_parsedUrl']['path'].split('/')[2]
	// console.log(token)
	// console.log('App Token List')
	// console.log(app['tokens'])

	var hasToken = false
	app['tokens'].forEach(function(registeredToken)
	{
		if(registeredToken['token'] == token)
		{
			hasToken = registeredToken
		}
	})

	// console.log("####  STEP 2  ####")

	if(hasToken == false)
	{
		response.status(404).send({error : "Bad token"})
		return
	}
	
	// console.log("####  STEP 3  ####")


	if(hasToken['time'] < Date.now())
	{
		response.status(404).send({error : "Connection reset by Time"})
	}
	else
	{
		response['token'] = tokenManager.create(hasToken)
		request['userid'] = hasToken['id']
		next()
	}

	//console.log("####  STEP 4  ####")
	
	setTimeout(function()
		{
			var tokenIndex = app['tokens'].indexOf(hasToken)
			app['tokens'].splice(tokenIndex,1)
		}, 5000)

}

function cors(request, response, next)
{
	response.header("Access-Control-Allow-Origin", "*");
	response.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
	response.header('Access-Control-Allow-Methods', 'POST, GET, PUT, DELETE, OPTIONS');
	next();
}

module.exports=
{
	logVerify:logVerify,
	cors:cors,
}