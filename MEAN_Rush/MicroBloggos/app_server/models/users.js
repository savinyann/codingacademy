var messageModel = require('./../models/message')
var mongoose = require('mongoose')
var bcrypt = require('bcrypt')
var db = require('./db')

var userSchema = mongoose.Schema(
{
	name: String,
	email: String,
	password: String,
	followers: {type : Array, default: []},
	following: {type : Array, default: []},
	blocked: {type : Array, default: []},
})

var User = mongoose.model('user', userSchema)

async function UserMailAlreadyExists(user)
{
	var userAlreadyExists = false
	await User.find({email:user['email']}, function(error, user)
	{
		userAlreadyExists = user
		return
	})
	return(userAlreadyExists)
}

function UserNameAlreadyExists(user, response)
{
	User.find({name:user['name']}, function(error, userDB)
	{
		if(userDB.length != 0)
		{

			response.status(400).send({error : 'Name is already used'}).end()
		}
		else
		{
			var salt = bcrypt.genSaltSync(10)
			var hash = bcrypt.hashSync(form['password'], salt)
			form['password'] = hash
			createUser(user, response)
		}
	})
}

function UserEditedNameAlreadyExists(user, id, response)
{
	User.find({name:user['name']}, function(error, userDB)
	{
		if(userDB.length != 0 && userDB[0]['id'] != id)
		{
			response.status(400).send({error : 'Name is already used'}).end()
		}
		else
		{
			console.log(id)
			User.findById(id, function(error, userDB)
			{
				if(error)
				{
					response.status(400).send({error : error}).end()
				}
				else if(userDB.length == 0)
				{
					response.status(404).send({error : 'User not found'})
				}
				else
				{
					var password = user['old']
					var hash = userDB['password']

					bcrypt.compare(password, hash, function(error, result)
					{
						if(result == true)
						{
							var salt = bcrypt.genSaltSync(10)
							var hash = bcrypt.hashSync(form['password'], salt)
							form['password'] = hash
							updateUser(id, user, response)
						}
						else
						{
							response.status(400).send({error : 'Bad Old password'}).end()
						}
						
					})
				}
			})
		}
	})
}

async function createUser(user, response)
{
	var message = 'false'
	var newUser = new User(
	{
		name : user['name'],
		password : user['password'],
		email: user['email']
	})
	await newUser.save(function(error, user)
	{
		if(error)
		{
			response.status(400).send({error : error}).end()
		}
		else
		{
			response.status(200).send({ok : 'User has been saved'}).end()
		}
	})
}


function readUser(user, response)
{
	User.find({email:user['email']}, function(error, userDB)
	{
		if(error)
		{
			response.status(400).send({error : error}).end()
		}
		else if(userDB.length == 0)
		{
			response.status(404).send({error : 'User not found'})
		}
		else
		{
			var password = user['password']
			var hash = userDB[0]['password']

			bcrypt.compare(password, hash, function(error, result)
			{
				if(result == true)
				{
					response.status(200).send(userDB[0]).end()
				}
				else
				{
					response.status(400).send({error : 'Bad password'}).end()
				}
				
			})
		}
	})
}


function readUserID(id, response)
{
	User.findById(id, function(error, userDB)
	{
		if(error)
		{
			response.status(404).send({error : 'User not found'}).end()
		}
		else
		{
			response.status(200).send({user : userDB}).end()
		}
	})
}


async function readAllUsers()
{
	var users
	await User.find({}, function(error, userDB)
	{
		users = (error) ? [] : userDB
	})
	return users
}

function updateUser(id, form, response)
{
	User.update({'_id' : id}, {'$set' : {'name' : form['name'],'email':form['email'],password:form['password']}}, function(error)
	{
		if(error)
		{
			response.status(200).send({error:error}).end()
		}
		else
		{
			response.status(200).send({ok : 'You have been updated'}).end()
		}
	})
}

function deleteUser(id, response)
{
	User.remove({ '_id' : id }, function (error)
	{
		if(error)
		{
			response.status(404).send({error: error}).end()
		}
		else
		{
			response.status(200).send({ok : "You have been deleted"}).end()
		}
	})
}

function createFollow(follow, response)
{
	User.findById(follow['id'], function(error, userDB)
	{
		if(!userDB['following'].includes(follow['follow_id']))
		{
			User.update({'_id' : follow['id']}, {'$push' : {following : follow['follow_id']}}, function(error)
			{
				if(error)
				{
					response.status(400).send({error : error}).end()
				}
				else
				{
					User.update({'_id' : follow['follow_id']}, {'$push' : {followers : follow['id']}}, function(error)
					{
						if(error)
						{
							response.status(400).send({error : error}).end()
						}
						else
						{
							response.status(200).send({ok : 'Follow added'}).end()
						}
					})
				}
			})
		}
		else
		{
			response.status(400).send({error : 'You already follow this user'}).end()
		}
	})
}

function deleteFollow(unfollow, response)
{
	User.findById(unfollow['userid'], function(error, userDB)
	{
		if(userDB['following'].includes(unfollow['followid']))
		{
			User.update({'_id' : unfollow['userid']}, {'$pull' : {following : unfollow['followid']}}, function(error)
			{
				if(error)
				{
					reponse.status(400).send({error : error}).end()
				}
				else
				{
					User.update({'_id' : unfollow['followid']}, {'$pull' : { followers : unfollow['userid']}}, function(error)
					{
						if(error)
						{
							response.status(400).send({error : error}).end()
						}
						else
						{
							response.status(200).send({ok : 'Follow removed'}).end()
						}
					})
				}
			})
		}
		else
		{
			response.status(400).send({error : "You don't follow this user"}).end()
		}
	})
}

function readFollowers(userid, response)
{
	User.findById(userid, function (error, userDB)
	{
		if(error)
		{
			response.status(404).send({error : error}).end()
		}
		else
		{
			var followers = userDB['followers']
			User.find({}).where('_id').in(followers).select("_id name").exec(function(error, followers)
			{
				if(error)
				{
					response.status(400).send({error : error}).end()
				}
				else
				{
					response.status(200).send(followers).end()
				}
			})
		}
	})
}

function readFollowing(userid, response)
{
	User.findById(userid, function(error, userDB)
	{
		if(error)
		{
			response.status(404).send({error : error}).end()
		}
		else
		{
			var following = userDB['following']
			User.find({}).where('_id').in(following).select("_id name blocked").exec(function(error, following)
			{
				if(error)
				{
					response.status(400).send({error : error}).end()
				}
				else
				{
					messageModel.readFollowing(userDB, following, response)
				}
			})
		}
	})
}

function blockedFollower(userid, response)
{
	User.findById(userid,"blocked", function(error, userDB)
	{
		if(error)
		{
			response.status(404).send({error : error}).end()
		}
		else
		{
			response.status(200).send(userDB["blocked"]).end()
		}
	})
}

function blockFollower(user, follower, response)
{
	User.find({'_id' : user}, function(error, userDB)
	{
		if(error)
		{
			response.status(404).send({error : error}).end()
		}
		else
		{
			User.update({'_id' : user}, {'$push' : {blocked : follower}},function(error)
			{
				if(error)
				{
					response.status(400).send({error : error}).end()
				}
				else
				{
					response.status(200).send({ok : 'Follower blocked'}).end()
				}
			})
		}
	})
}

function unblockFollower(user, follower, response)
{
	User.find({'_id' : user}, function(error, userDB)
	{
		if(error)
		{
			response.status(404).send({error : error}).end()
		}
		else
		{
			User.update({'_id' : user}, {'$pull' : {blocked : follower}},function(error)
			{
				if(error)
				{
					response.status(400).send({error : error}).end()
				}
				else
				{
					response.status(200).send({ok : 'Follower unblocked'}).end()
				}
			})
		}
	})
}


// EXPORTATION //
module.exports=
{
	UserEditedNameAlreadyExists:UserEditedNameAlreadyExists,
	UserMailAlreadyExists:UserMailAlreadyExists,
	UserNameAlreadyExists:UserNameAlreadyExists,
	createUser:createUser,
	readUser:readUser,
	readUserID:readUserID,
	readAllUsers:readAllUsers,
	updateUser:updateUser,
	deleteUser:deleteUser,
	createFollow:createFollow,
	readFollowers:readFollowers,
	readFollowing:readFollowing,
	deleteFollow:deleteFollow,
	blockedFollower:blockedFollower,
	blockFollower:blockFollower,
	unblockFollower:unblockFollower,
}