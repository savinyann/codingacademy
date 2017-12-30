#!/usr/bin/python3
import os,sys
sys.path.insert(1, os.path.join(sys.path[0], '..'))
from flask import Flask, request, session, g, redirect, url_for, abort, render_template, flash
from model.model import *
from module.form import *
from module.check_input import *
from module.hash_password import *
import json

class users:
	def __init__(self):
		self.DB = model()

	def index(self):
		user = self.DB.dumb_db()
		return(render_template('dump_db.html', db=user))


	def create(self):
		registration_form = MyRegister()
		return(render_template('registration.html', form=registration_form))

	def store(self):
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
			message.append(self.DB.store_user(post))
			
		registration_form = MyRegister()
	#	message = time.mktime(datetime.datetime.strptime(request.form['birthdate'], "%Y-%m-%d").timetuple())
		return render_template('registration.html', form=registration_form, message=message, post=post)

	def login(self):
		login_form = MyLogin()
		return(render_template('login.html', form=login_form))

	def logged_in(self):
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
			user = self.DB.get_user(log)
			if user == []:
				message.append("This username doesn't exist.")
			elif password_verify(user[0]['password'], log['password'], user[0]['salt']):
				session['loggedin'] = True
				flash('Logged in (DONE)')
				return(redirect(url_for('home')))
			else:
				message.append('Bad Password')

		form = MyLogin()
		return render_template('login.html', form=form, log=log, message=message)


	""" -----------------     API CONTROLLER     ----------------- """

	def login_api(self, log):# username, password):
		message = []
		check_input = CheckInput(log)
		check_input = check_input.get_CheckInput()

		for data,error in check_input.items():
			if(error != True):
				return(json.dumps(error))

		user = self.DB.get_user(log)

		if user == []:
			return(json.dumps("This username doesn't exist."))
		elif password_verify(user[0]['password'], log['password'], user[0]['salt']):
			user = user[0]
			session['loggedin'] = True
			message.append('You have been logged.')
			result = {}
			result['id'] = user['id']
			result['username'] = user['username']
			result['first_name'] = user['first_name']
			result['last_name'] = user['last_name']
			result['email'] = user['email']
			result['rank'] = user['rank']
			result['address'] = user['address']
			result['eye_color'] = user['eye_color']
			result['adn_sequence'] = user['adn_sequence']
			return(json.dumps(result))
	#			return(json.dumps(session))
		else:
			return(json.dumps({"message" : 'Bad Password'}))


	def store_api(self, post):
		message = []
		form = {}
		for data in post:
			if(data == "password"):
				form[data] = [post['password'], post['confirm']]
			elif(data != 'confirm'):
				form[data] = post[data]
		
		check_input = CheckInput(post);
		check_input = check_input.get_CheckInput();

		for data,error in check_input.items():
			if(error != True):
				return(json.dumps(error))

		if(message == []):
			form['password'], form['salt'] = password_hash(form['password'][0])
			return(json.dumps(self.DB.store_user(form)))
		return(json.dumps("something went wrong, I don't know what, I don't know why."))

	def show_api(self, user_id):
		user_raw = self.DB.dumb_db(user_id)[0]
		user = []
		for data in user_raw:
			user.append(data)
		return(json.dumps(user))

	def edit_api(self, user_id, post):
		message = []
		form = {}
		for data in post:
			if(data == "password"):
				form[data] = [post['password'], post['confirm']]
			elif(data != 'confirm'):
				form[data] = post[data]
		
		check_input = CheckInput(post);
		check_input = check_input.get_CheckInput();

		for data,error in check_input.items():
			if(error != True):
				return(json.dumps(error))

		if(message == []):
			form['password'], form['salt'] = password_hash(form['password'][0])
			form['id'] = user_id
			return(json.dumps(self.DB.update_user(form)))
		return(json.dumps("something went wrong, I don't know what, I don't know why."))

	def delete_api(self, user_id):
		return(json.dumps(self.DB.delete_user(user_id)))