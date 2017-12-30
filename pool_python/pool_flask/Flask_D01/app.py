#!/usr/bin/python3


#export FLASK_APP=app.py export FLASK_DEBUG=true && flask run
import os
import sqlite3
from flask import Flask, request, session, g, redirect, url_for, abort, render_template, flash
from flask_wtf import FlaskForm
from module.check_input import CheckInput
from module.form import *
from module.hash_password import *
import time
import datetime
import sys

app = Flask(__name__)

app.config.from_object(__name__)

app.config.update(dict(
	DATABASE=os.path.join(app.root_path, 'users.db'),
	SECRET_KEY='gfiorzjfze gjfzepf gjrzoefrj gfiorjgoizehgezegboezigbinozesfjoeaofjznopqmdfjeroi fmzjsgoier gjbdjfvkndf vjcksd nbverzks vberniz ghoeiz gbervn zdfjzprzepbjrepzmgf jetpgfej zrnib erjgnoegfe cb',
	USERNAME='admin',
	PASSWORD='default',
	))

app.config.from_envvar('FLASKR_SETTINGS', silent=True)



""" -----------------        ROUTER        ----------------- """


@app.route('/', methods=['GET'])
def home():
	return render_template('home.html')


@app.route('/dumpdb/', methods=['GET'])
def dump_db():

	db = get_db()
	query = 'SELECT * FROM users'
	users = SQLquery(query)
	return render_template('dump_db.html', db=users)


@app.route('/registration/', methods=['GET'])
def show_registration_form():
	form = MyRegister()
	return render_template('registration.html', form=form)


@app.route('/registration/', methods=['POST'])
def add_user():
	message = []

	post = {}
	post['username'] = request.form['username']
	post['firstname'] = request.form['firstname']
	post['lastname'] =request.form['lastname']
	post['email'] = request.form['email']
	post['birthdate'] = request.form['birthdate']
	post['address'] = request.form['address']
	post['ADN'] = request.form['adn']
	post['eyecolor'] = request.form['eye_color']
	post['password'] = [request.form['password'], request.form['confirm']]

	check_input = CheckInput(post);
	check_input = check_input.get_CheckInput();

	for form,error in check_input.items():
		if(error != True):
			message.append(error)

	if(message == []):

		post['password'], post['salt'] = password_hash(post['password'][0])
		query = 'SELECT * FROM users WHERE username = ?'
		variable = [post['username']]
		usernameAlreadyUsed = SQLquery(query, variable)
		if(usernameAlreadyUsed == []):
			query = 'INSERT INTO users (username, password, salt, first_name, last_name, email, birthdate, address, eye_color, adn_sequence) VALUES (?,?,?,?,?,?,?,?,?,?)'
			variable = [post['username'], post['password'], post['salt'], post['firstname'], post['lastname'], post['email'], post['birthdate'], post['address'], post['eyecolor'], post['ADN']]
			SQLquery(query, variable)
			message.append("Everything was fine, and you were nice, so I have put everything in DB. It was nice to meet you, have a nice day!")
		else:
			message.append("Username is already used. Sorry.")

	form = MyRegister()
#	message = time.mktime(datetime.datetime.strptime(request.form['birthdate'], "%Y-%m-%d").timetuple())
	return render_template('registration.html', form=form, message=message, post=post, username=usernameAlreadyUsed)



@app.route('/login/', methods=['GET'])
def login():
	form = MyLogin()
	return render_template('login.html', form=form)


@app.route('/login/', methods=['POST'])
def loggedin():
	message = []
	
	log = {}
	log['username'] = request.form['username']
	log['password'] = request.form['password']

	check_input = CheckInput(log)
	check_input = check_input.get_CheckInput()

	for data,error in check_input.items():
		if(error != True):
			message.append(error)

	if(message == []):
		query = "SELECT * FROM users where username = ?"
		variable = [log['username']]
		user = SQLquery(query, variable)[0]

		if user == []:
			message.append("This username doesn't exist.")
		elif password_verify(user['password'], log['password'], user['salt']):
			session['loggedin'] = True
			flash('Logged in (DONE)')
			return redirect(url_for('home'))
		else:
			message.append('Bad Password')

	form = MyLogin()
	return render_template('login.html', form=form, log=log, message=message)


@app.route('/logout/')
def logout():
    session.pop('logged_in', None)
    flash('You were logged out')
    return redirect(url_for('home'))
"""
@app.route('/registration', methods=['POST'])
def registration():
	if not session.get('logged_in'):
		abort(401)
	db = get_db()
	db.execute('insert into entries (title, text) values (?, ?)',[request.form['title'], request.form['text']])
	db.commit()
	flash('New entry was successfully posted')
	return redirect(url_for('show_entries'))
"""





""" -----------------        MODEL        ----------------- """

""" Connect to DATABASE """
def connect_db():
	db = sqlite3.connect(app.config['DATABASE'])
	db.row_factory = sqlite3.Row
	return(db)


""" Retrieve a DATABASE connection or open a new one if there is none """
def get_db():
	if not hasattr(g, 'sqlite_DB'):
		g.sqlite_DB = connect_db()
	return g.sqlite_DB

""" Close DATABASE when app context tears down """
@app.teardown_appcontext
def close_db(error):
	if hasattr(g, 'sqlite_db'):
		g.sqlite_db.close()

""" Initialise DATABASE """
def init_db():
	db = get_db()
	with app.open_resource('schema.sql', mode='r') as f:
		db.cursor().executescript(f.read())
	db.commit()

""" Call init_db when required """
@app.cli.command('initdb')
def initdb_command():
	init_db()
	print('Initialized DATABASE')


""" Send a query to DATABASE """
def SQLquery(Query, Variable = None):
	db = get_db()
	if(Variable == None):
		query = db.execute(Query)
	else:
		query = db.execute(Query, Variable)
		db.commit()
	return(query.fetchall())