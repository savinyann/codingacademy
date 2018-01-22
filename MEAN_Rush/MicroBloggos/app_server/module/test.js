app = require('./../../app')

function SendRequestParams(request, response)
{
	app['tokens'].forEach(function(token)
	{
		if(token['token'] == request.params['token'])
		{
			console.log('True')
		}
		else
		{
			console.log(token['token'])
		}
	})
	response.send({request : request.params, token : response['token']})
}

function ShowResponse(request, response)
{
	console.log(Object.keys(response))
	response.send(Object.keys(response))
}



module.exports=
{
	sendParams:SendRequestParams,
	showResponse:ShowResponse,
}