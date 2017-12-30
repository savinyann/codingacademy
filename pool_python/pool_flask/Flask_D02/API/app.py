#!/usr/bin/python3


#export FLASK_APP=app.py export FLASK_DEBUG=true && flask run
import os
from flask import Flask, request, session, g, redirect, url_for, abort, render_template, flash
from flask_wtf import FlaskForm

from module.check_input import CheckInput
from module.form import *
from module.hash_password import *
from module.login_api import middleware
import json
import time
import datetime
from controllers.users import users
from controllers.articles import articles
from controllers.comments import comments


app = Flask(__name__)

app.config.from_object(__name__)

app.config.update(dict(
	DATABASE=os.path.join(app.root_path, 'users.db'),
	SECRET_KEY='gfiorzjfze gjfzepf gjrzoefrj gfiorjgoizehgezegboezigbinozesfjoeaofjznopqmdfjeroi fmzjsgoier gjbdjfvkndf vjcksd nbverzks vberniz ghoeiz gbervn zdfjzprzepbjrepzmgf jetpgfej zrnib erjgnoegfe cb',
	USERNAME='admin',
	PASSWORD='default',
	))

app.config.from_envvar('FLASKR_SETTINGS', silent=True)



""" -----------------        ROUTER HTML        ----------------- """


@app.route('/', methods=['GET'])
def home():
	return render_template('home.html')


@app.route('/show_users', methods=['GET'])
def dump_db():
	show_users = users()
	return(show_users.index())


@app.route('/registration/', methods=['GET'])
def show_registration_form():
	create_user = users()
	return(create_user.create())


@app.route('/registration', methods=['POST'])
def add_user():
	store_user = users()
	return(store_user.store())


@app.route('/login', methods=['GET'])
def login():
	log_user = users()
	return(log_user.login())


@app.route('/login', methods=['POST'])
def loggedin():
	get_user = users()
	return(get_user.logged_in())


@app.route('/logout')
def logout():
    session.pop('logged_in', None)
    flash('You were logged out')
    return redirect(url_for('home'))




""" -----------------        ROUTER API USER        ----------------- """


@app.route('/login_api', methods=['POST'])
def loggedin_api():
	log_user = users()
	return(log_user.login_api())


@app.route('/registration_api', methods=['POST'])
def registrated_api():
	print('registration')
	store_user = users()
	return(store_user.store_api(request.form))

@app.route('/user_api/<int:id>', methods=['GET'])
def show_api(id):
	show_user = users()
	return(show_user.show_api(id))

@app.route('/user_api/<int:id>', methods=['POST'])
def edit_api(id):
	edit_user = users()
	return(edit_user.edit_api(id, request.form))

@app.route('/user_api/<int:id>', methods=['DELETE'])
def delete_api(id):
	del_user = users()
	return(del_user.delete_api(id))


""" -----------------        ROUTER API ARTICLE        ----------------- """

@app.route('/article_api', methods=['GET'])
def index_a():
	article = articles()
	return(article.dump_api())

@app.route('/new_article_api', methods=['POST'])
def create_a():
	new_article = articles()
	return(new_article.store_api())

@app.route('/article_api/<int:id>', methods=['GET'])
def read_a(id):
	article = articles()
	return(article.read_api(id))

@app.route('/article_api/<int:id>', methods=['POST'])
def update_a(id):
	article = articles()
	return(article.update_api(id))

@app.route('/article_api/<int:id>', methods=['DELETE'])
def delete_a(id):
	article = articles()
	return(article.delete_api(id))


""" -----------------        ROUTER API COMMENT        ----------------- """

@app.route('/comment_api/<int:article_id>', methods=['GET'])
def index_c(article_id):
	comment = comments()
	return(comment.dump_api(article_id))

@app.route('/comment_api/<int:article_id>/<int:comment_id>', methods=['GET'])
def read_c(article_id, comment_id):
	comment = comments()
	return(comment.dump_api(article_id, comment_id))

@app.route('/new_comment_api/<int:article_id>', methods=['POST'])
def create_c(article_id):
	new_comment = comments()
	return(new_comment.store_api(article_id))


@app.route('/comment_api/<int:article_id>/<int:comment_id>', methods=['POST'])
def update_c(article_id, comment_id):
	comment = comments()
	return(comment.update_api(comment_id))

@app.route('/comment_api/<int:article_id>/<int:comment_id>', methods=['DELETE'])
def delete_c(article_id, comment_id):
	comment = comments()
	return(comment.delete_api(comment_id))



@app.route('/apilog', methods=['GET', 'POST'])
def test():
	print('Ok Allright')
	login_api = middleware()
	return(login_api.login())



""" -----------------        MODEL        ----------------- """

""" Close DATABASE when app context tears down """
@app.teardown_appcontext
def close_db(error):
	if hasattr(g, 'sqlite_db'):
		g.sqlite_db.close()


""" Call init_db when required """
@app.cli.command('initdb')
def initdb_command():
	init_db()
	print('Initialized DATABASE')