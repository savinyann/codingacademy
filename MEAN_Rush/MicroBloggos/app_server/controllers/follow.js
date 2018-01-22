var userModel = require('./../models/users')
var CheckInput = require('./../module/checkInput').CheckInput

function createFollow(request, response)
{
	if(request.params['userid'] != request.body['id'])
	{
		response.status(404).send({error : 'You are not who you pretend to be.'}).end()
	}
	else if(request.body['id'] == request.body['follow_id'])
	{
		response.status(400).send({error : 'You can not follow yourself.'}).end()
	}
	else
	{
		userModel.createFollow(request.body, response)
	}
}

function deleteFollow(request, response)
{
	unfollow = {}
	unfollow['userid'] = request.params['userid']
	unfollow['followid'] = request.params['followid']
	userModel.deleteFollow(unfollow, response)
}

function readFollowers(request, response)
{
	userModel.readFollowers(request.params['userid'], response)
}

function readFollowing(request, response)
{
	userModel.readFollowing(request.params['userid'], response)
}

function blockedFollower(request, response)
{
	userModel.blockedFollower(request.params['userid'], response)
}

function blockFollower(request, response)
{
	var user = request.body['userid']
	var follower = request.body['follower']
	userModel.blockFollower(user, follower, response)
}

function unblockFollower(request, response)
{
	var user = request.body['userid']
	var follower = request.body['follower']
	userModel.unblockFollower(user, follower, response)
}


/* EXPORTATION */
module.exports=
{
	create:createFollow,
	readFollowers:readFollowers,
	readFollowing:readFollowing,
	blocked:blockedFollower,
	block:blockFollower,
	unblock:unblockFollower,
	delete:deleteFollow,
}