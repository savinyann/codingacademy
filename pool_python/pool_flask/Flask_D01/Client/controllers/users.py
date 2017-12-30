#!/usr/bin/python3
import os,sys
sys.path.insert(1, os.path.join(sys.path[0], '..'))
from flask import Flask, request, session, g, redirect, url_for, abort, render_template, flash
import requests
from flask_wtf import FlaskForm
from module.form import *
from module.check_input import *
from module.hash_password import *
import json

class users:
	"""
	def index(self):
		user = self.DB.dumb_db()
		return(render_template('dump_db.html', db=user))
	"""

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
		post['password'] = request.form['password']
		post['confirm'] = request.form['confirm']

		check_input = CheckInput(post);
		check_input = check_input.get_CheckInput();

		for form,error in check_input.items():
			if(error != True):
				message.append(error)

		if(message == []):
			response = requests.post('http://localhost:5000/registration_api', post)
			message=(response.json())
			
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
			response = requests.post('http://localhost:5000/login_api', log)
			message=(response.json())

		form = MyLogin()
		return(render_template('login.html', form=form, log=log, message=message))

	def edit(self, id):
		edit_form = MyEdit()
		return(render_template('edit.html', form=edit_form))

	def update(self, id):
		response = requests.post('http://localhost:5000/user_api/'+str(id), request.form)
		message = response.json()

		edit_form = MyEdit()
		return(render_template('edit.html', form=edit_form, message=message))

	def delete(self, id):
		return(render_template('delete.html'))

	def destroy(self, id):
		response = requests.delete('http://localhost:5000/user_api/'+str(id))
		message = response.json()
		return(render_template('delete.html', message=message))