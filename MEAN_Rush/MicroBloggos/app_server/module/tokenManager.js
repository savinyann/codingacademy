var randomString = require('randomstring')
var app = require('./../../app')

// Time in seconds before the token expires
const resetTime = 600

function tokenGenerator(user)
{
	token =
	{
		id : user['id'],
		token : randomString.generate({length:50, charset:'alphanumeric'}),
		time : Date.now() + resetTime * 1000 }
	if(app['tokens'])
	{
		app['tokens'].push(token)
	}
	else
	{
		app['tokens'] = [token]
	}
	//console.log('#### LASTEST TOKEN #### = '+token['token'])
	return(token['token'])
}

module.exports=
{
	create:tokenGenerator
}