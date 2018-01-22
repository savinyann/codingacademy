#!/usr/bin/python3
import os,sys
sys.path.insert(1, os.path.join(sys.path[0], '..'))
from flask import Flask, request, session, g, redirect, url_for, abort, render_template, flash
import requests
from flask_wtf import FlaskForm
from module.form import *
from module.check_input import *
from module.hash_password import *
from controllers.comments import comments
import json

class articles:

	def check_log(self):
		if(session['logged_in'] != True):
			flash('You are not allowed to see that, sorry.')
			return(False)
		else:
			return(True)

	def check_author(self, id):
		response = requests.get('http://localhost:5000/article_api/'+str(id))
		response = response.json()
		if(response['user_id'] == session['user']['id']):
			return(response)
		flash('You are not allowed to edit this article.')
		return(False)

	def index(self):
		response = requests.get('http://localhost:5000/article_api')
		response = response.json()
		return(render_template('article/articles.html', article=response))

	def create(self):
		if(self.check_log() == False):
			return(redirect(url_for('home')))
		article_form = MyArticleCreate()
		return(render_template('article/create.html', form=article_form))

	def store(self):
		message = []
		if(self.check_log() == False):
			return(redirect(url_for('home')))

		check_input = CheckInput(request.form)
		check_input = check_input.get_CheckInput()

		for data,error in check_input.items():
			if(error != True):
				flash(error)
				message.append(error)

		if(message == []):
			response = requests.post('http://localhost:5000/new_article_api', request.form)
			flash(response.json())
		article_form = MyArticleCreate()
		return(render_template('article/create.html', form=article_form))

	def read(self, id):
		response = requests.get('http://localhost:5000/article_api/'+str(id))
		response = response.json()
		if(response  == "Error: This article doesn't exist yet."):
			flash(response)
			abort(404)
		comments_article = comments()
		comments_article = comments_article.read(response['id'])
		comment_form = MyCommentCreate()
		return(render_template('article/read.html', data=response, form=comment_form, comments=comments_article))

	def edit(self, id):
		if(self.check_log() == False):
			return(redirect(url_for('article_index')))
		article = self.check_author(id)
		if(article == False):
			return(redirect(url_for('article_index')))
		article_form = MyArticleCreate()
		return(render_template('article/edit.html', article=article, form=article_form))

	def update(self, id):
		if(self.check_log() == False):
			return(redirect(url_for('article_index')))
		article = self.check_author(id)
		if(article == False):
			return(redirect(url_for('article_index')))

		message = []
		check_input = CheckInput(request.form)
		check_input = check_input.get_CheckInput()
		print(check_input)

		for data,error in check_input.items():
			if(error != True):
				flash(error)
				message.append(error)

		if(message == []):
			response = requests.post('http://localhost:5000/article_api/'+str(id),request.form)
			flash(response.json())
		article = self.check_author(id)
		article_form = MyArticleCreate()
		return(render_template('article/edit.html', article=article, form=article_form))

	def delete(self, id):
		if(self.check_log() == False or self.check_author(id) == False):
			return(redirect(url_for('article_index')))
		return(render_template('article/delete.html'))

	def destroy(self, id):
		if(self.check_log() == False or self.check_author(id) == False):
			return(redirect(url_for('article_index')))
		for data in request.form:
			if(data == 'del'):
				response = requests.delete('http://localhost:5000/article_api/'+str(id))
				flash(response.json())
				return(redirect(url_for('article_index')))
		flash('Article is not deleted. You have to check the little box to confirm the deletion.')
		return(render_template('article/delete.html'))