#!/usr/bin/python3
from flask import Flask, request, session, g, redirect, url_for, abort, render_template, flash
#from flask_wtf import FlaskForm
from controllers.users import users

app = Flask(__name__)

app.config.from_object(__name__)

app.config.update(dict(
	SECRET_KEY='gfiorzjfze gjfzepf gjrzoefrj gfiorjgoizehgezegboezigbinozesfjoeaofjznopqmdfjeroi fmzjsgoier gjbdjfvkndf vjcksd nbverzks vberniz ghoeiz gbervn zdfjzprzepbjrepzmgf jetpgfej zrnib erjgnoegfe cb',
	USERNAME='admin',
	PASSWORD='default',
	))

app.config.from_envvar('FLASKR_SETTINGS', silent=True)


""" ---------------------   ROUTER   --------------------- """

@app.route('/', methods=['GET'])
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

@app.route('/edit/<int:id>', methods=['GET'])
def edit(id):
	user_edit = users()
	return(user_edit.edit(id))

@app.route('/edit/<int:id>', methods=['POST'])
def update(id):
	user_update = users()
	return(user_update.update(id))

@app.route('/delete/<int:id>', methods=['GET'])
def delete(id):
	user_delete = users()
	return(user_delete.delete(id))

@app.route('/delete/<int:id>', methods=['POST'])
def destroy(id):
	user_destroy = users()
	return(user_destroy.destroy(id))



app.run(port=3000)