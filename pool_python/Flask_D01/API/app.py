#!/usr/bin/python3


#export FLASK_APP=app.py export FLASK_DEBUG=true && flask run
import os
from flask import Flask, request, session, g, redirect, url_for, abort, render_template, flash
from flask_wtf import FlaskForm
from module.check_input import CheckInput
from module.form import *
from module.hash_password import *
import json
#import controllers.registration as registration
import time
import datetime
from controllers.users import users
#import controllers.dumpdb as dumpdb

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




""" -----------------        ROUTER API        ----------------- """


@app.route('/login_api', methods=['POST'])
def loggedin_api():
	log_user = users()
	return(log_user.login_api(request.form))


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