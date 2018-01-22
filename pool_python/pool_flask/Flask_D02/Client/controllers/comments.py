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

class comments:

	def check_log(self):
		if(session['logged_in'] != True):
			flash('You need to be logged to post a comment, sorry.')
			return(False)
		else:
			return(True)

	def check_author(self, article_id, comment_id = None):
		if(comment_id == None):
			response = requests.get('http://localhost:5000/comment_api/'+str(article_id))
		else:
			response = requests.get('http://localhost:5000/comment_api/'+str(article_id)+'/'+str(comment_id))
		response = response.json()[0]
		if(response['user_id'] == session['user']['id']):
			return(response)
		flash('You are not allowed to edit this comment.')
		return(False)

	def index(self):
		response = requests.get('http://localhost:5000/article_api')
		response = response.json()
		return(render_template('article/articles.html', article=response))


	def store(self):
		message = []
		if(self.check_log() == False):
			return(redirect(url_for('login')))

		check_input = CheckInput(request.form)
		check_input = check_input.get_CheckInput()

		for data,error in check_input.items():
			if(error != True):
				flash(error)
				message.append(error)

		if(message == []):
			response = requests.post('http://localhost:5000/new_comment_api/'+request.form['article_id'], request.form)
			flash(response.json())
		return(redirect(url_for('article_read', id=request.form['article_id'])))

	def read(self, article_id):
		response = requests.get('http://localhost:5000/comment_api/'+str(article_id))
		response = response.json()
		return(response)
		return(render_template('article/read.html', data=message))

	def edit(self, article_id, comment_id):
		if(self.check_log() == False):
			return(redirect(url_for('login')))
		comment = self.check_author(article_id, comment_id)
		if(comment == False):
			return(redirect(url_for('article_read', id=article_id)))
		comment_form = MyCommentCreate()
		return(render_template('comment/edit.html', comment=comment, form=comment_form))

	def update(self, article_id, comment_id):
		if(self.check_log() == False):
			return(redirect(url_for('login')))
		comment = self.check_author(article_id, comment_id)
		if(comment == False):
			return(redirect(url_for('article_read', id=article_id)))

		message = []
		check_input = CheckInput(request.form)
		check_input = check_input.get_CheckInput()
		print(check_input)

		for data,error in check_input.items():
			if(error != True):
				flash(error)
				message.append(error)

		if(message == []):
			response = requests.post('http://localhost:5000/comment_api/'+str(article_id)+"/"+str(comment_id),request.form)
			flash = response.json()
		return(redirect(url_for('article_read', id=article_id)))

	def delete(self, article_id, comment_id):
		if(self.check_log() == False):
			return(redirect(url_for('login')))
		comment = self.check_author(article_id, comment_id)
		if(comment == False):
			return(redirect(url_for('article_read', id=article_id)))
		return(render_template('comment/delete.html'))

	def destroy(self, article_id, comment_id):
		if(self.check_log() == False):
			return(redirect(url_for('login')))
		comment = self.check_author(article_id, comment_id)
		if(comment == False):
			return(redirect(url_for('article_read', id=article_id)))
		for data in request.form:
			if(data == 'del'):
				response = requests.delete('http://localhost:5000/comment_api/'+str(article_id)+"/"+str(comment_id))
				flash(response.json())
				return(redirect(url_for('article_read', id=article_id)))
		flash('Comment is not deleted. You have to check the little box to confirm the deletion.')
		return(render_template('comment/delete.html'))