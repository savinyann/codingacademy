var message = require('./../controllers/message')
var follow = require('./../controllers/follow')
var users = require('./../controllers/users')
var auth = require('./../controllers/auth')
var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', (request, response, next) => response.render('index', { title: 'µBloggos' }))


/* Users Controller */
router.get('/users', (request, response) => users.usersReadAll(request, response))
router.get('/users/:userid', (request, response) => users.usersReadOne(request, response))
router.put('/users/:userid', (request, response) => users.usersUpdateOne(request, response))
router.delete('/users/:userid', (request, response) => users.usersDeleteOne(request, response))

/* Authentication Controller */
router.post('/register', (request, response) => auth.register(request, response))
router.get('/login', (request, response) => response.status(200).send({name:'echo'}).end())
router.post('/login', (request, response) => auth.login(request, response))

/* Message Controller */
router.get('/message/:userid', (request, response) => message.read(request, response))
router.post('/message', (request, response) => message.create(request, response))
router.put('/message/:userid', (request, response) => message.update(request, response))
router.delete('/message/:userid/:messageid', (request, response) => message.delete(request, response))
router.get('/hashtag/:hashtag', (request, response) => message.hashtag(request, response))

/* Follow Controller */
router.put('/follow/:userid', (request, response) => follow.create(request, response))
router.delete('/follow/:userid/:followid', (request, response) => follow.delete(request, response))
router.get('/follow/followers/:userid', (request, response) => follow.readFollowers(request, response))
router.get('/follow/following/:userid', (request, response) => follow.readFollowing(request, response))
router.post('/follow/block', (request, response) => follow.block(request, response))
router.post('/follow/unblock', (request, response) => follow.unblock(request, response))
router.get('/follow/blocked/:userid', (request, response) => follow.blocked(request, response))

module.exports = router;