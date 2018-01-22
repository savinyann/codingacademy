app = require('./../../app')

function test(request, response)
{
	console.log(app)
	
	response.send(app['token'])
}

module.exports=
{
	test:test,
}