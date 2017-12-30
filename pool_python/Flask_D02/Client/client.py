#!/usr/bin/python3
from flask import Flask, request, session, g, redirect, url_for, abort, render_template, flash
#from flask_wtf import FlaskForm
from controllers.users import users
from controllers.articles import articles
from controllers.comments import comments
from module.middleware import logToAPI

app = Flask(__name__)

app.config.from_object(__name__)

app.config.update(dict(
	SECRET_KEY='gfiorzjfze gjfzepf gjrzoefrj gfiorjgoizehgezegboezigbinozesfjoeaofjznopqmdfjeroi fmzjsgoier gjbdjfvkndf vjcksd nbverzks vberniz ghoeiz gbervn zdfjzprzepbjreplzmgf jetpgfej zrnib erjgnoegfe cb',
	USERNAME='admin',
	PASSWORD='default',
	))

app.config.from_envvar('FLASKR_SETTINGS', silent=True)

""" ---------------------   BEFORE REQUEST   --------------------- """

@app.before_request
def logAPI():
	middle = logToAPI()
	return(middle.index())

""" ---------------------   ROUTER USER   --------------------- """

@app.route('/', methods=['GET'])
@app.route('/home', methods=['GET'])
def home():
	return(render_template('home.html'))

@app.route('/registration', methods=['GET'])
def registration():
	user_registration = users()
	return(user_registration.create())

@app.route('/registration', methods=['POST'])
def registrated():
	user_registration = users()
	return(user_registration.store())

@app.route('/login', methods=['GET'])
def login():
	user_login = users()
	return(user_login.login())

@app.route('/login', methods=['POST'])
def logged_in():
	user_login = users()
	return(user_login.logged_in())

@app.route('/logout', methods=['GET'])
def logout():
	user = users()
	return(user.logout())

@app.route('/user/edit/<int:id>', methods=['GET'])
def edit(id):
	user_edit = users()
	return(user_edit.edit(id))

@app.route('/user/edit/<int:id>', methods=['POST'])
def update(id):
	user_update = users()
	return(user_update.update(id))

@app.route('/user/delete/<int:id>', methods=['GET'])
def delete(id):
	user_delete = users()
	return(user_delete.delete(id))

@app.route('/user/delete/<int:id>', methods=['POST'])
def destroy(id):
	user_destroy = users()
	return(user_destroy.destroy(id))


""" ---------------------   ROUTER ARTICLE   --------------------- """



@app.route('/article', methods=['GET'])
def article_index():
	article = articles()
	return(article.index())

@app.route('/article/create', methods=['GET'])
def article_create():
	article = articles()
	return(article.create())

@app.route('/article/create', methods=['POST'])
def article_store():
	article = articles()
	return(article.store())

@app.route('/article/<int:id>', methods=['GET'])
def article_read(id):
	article = articles()
	return(article.read(id))

@app.route('/article/<int:id>/edit', methods=['GET'])
def article_edit(id):
	article = articles()
	return(article.edit(id))

@app.route('/article/<int:id>/edit', methods=['POST'])
def article_update(id):
	article = articles()
	return(article.update(id))

@app.route('/article/<int:id>/delete', methods=['GET'])
def article_delete(id):
	article = articles()
	return(article.delete(id))

@app.route('/article/<int:id>/delete', methods=['POST'])
def article_destroy(id):
	article = articles()
	return(article.destroy(id))


""" ---------------------   ROUTER COMMENT   --------------------- """

@app.route('/comment/create', methods=['POST'])
def comment_store():
	comment = comments()
	return(comment.store())

@app.route('/comment/edit/<int:article_id>/<int:comment_id>', methods=['GET'])
def comment_edit(article_id, comment_id):
	comment = comments()
	return(comment.edit(article_id, comment_id))

@app.route('/comment/edit/<int:article_id>/<int:comment_id>', methods=['POST'])
def comment_update(article_id, comment_id):
	comment = comments()
	return(comment.update(article_id, comment_id))

@app.route('/comment/delete/<int:article_id>/<int:comment_id>', methods=['GET'])
def comment_delete(article_id, comment_id):
	comment = comments()
	return(comment.delete(article_id, comment_id))

""" -----------------        ROUTER API COMMENT        ----------------- """

@app.route('/comment/delete/<int:article_id>/<int:comment_id>', methods=['POST'])
def comment_destroy(article_id, comment_id):
	comment = comments()
	return(comment.destroy(article_id, comment_id))

"""
@app.route('/test', methods=['GET'])
def test():
	middle = logToAPI()
	return(middle.index())
"""


""" -----------------        ERROR HANDLER        ----------------- """

@app.errorhandler(404)
def page_not_found(e):
    return render_template('error/404.html'), 404

@app.errorhandler(401)
def unauthentified_to_API(e):
    return render_template('error/401.html'), 401


app.run(port=3000)