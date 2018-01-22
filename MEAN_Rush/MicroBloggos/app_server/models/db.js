var mongoose = require('mongoose')

mongoose.connect('mongodb://localhost/microbloggos')
var db = mongoose.connection
db.on('error', () => console.log('Connexion error'))
db.on('open', () => console.log('Connected on MicroBloggos DB.'))


module.exports={db:db}