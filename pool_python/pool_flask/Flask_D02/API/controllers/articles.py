#!/usr/bin/python3
import os,sys
sys.path.insert(1, os.path.join(sys.path[0], '..'))
from flask import Flask, request, session, g, redirect, url_for, abort, render_template, flash
from model.articles import *
from module.form import *
from module.check_input import *
import json

class articles:
	def __init__(self):
		self.DB = articlesModel()


	""" -----------------     API CONTROLLER     ----------------- """

	def dump_api(self):
		articles_raw = self.DB.dumb_db()
		articles = []
		for article_raw in articles_raw:
			article = {}
			article['id'] = article_raw['id']
			article['title'] = article_raw['title']
			article['body'] = article_raw['body']
			article['creation_date'] = article_raw['creation_date']
			article['user_id'] = article_raw['user_id']
			articles.append(article)

		return(json.dumps(articles))

	def store_api(self):
		message = []
		form = {}
		for data in request.form:
			form[data] = request.form[data]
		
		check_input = CheckInput(form);
		check_input = check_input.get_CheckInput()

		for data,error in check_input.items():
			if(error != True):
				return(json.dumps(error))

		if(message == []):
			return(json.dumps(self.DB.store_article(form)))
		return(json.dumps("something went wrong, I don't know what, I don't know why."))

	def read_api(self,id):
		article = {}
		dumb = self.DB.dumb_db(id)
		if(len(dumb) == 0):
			return(json.dumps("Error: This article doesn't exist yet."))
		article['id'] = dumb[0]['id'];
		article['title'] = dumb[0]['title'];
		article['body'] = dumb[0]['body'];
		article['user_id'] = dumb[0]['user_id'];
		return(json.dumps(article))

	def update_api(self,id):
		message = []
		form = {'id' : id}
		for data in request.form:
			form[data] = request.form[data]

		check_input = CheckInput(form)
		check_input = check_input.get_CheckInput()

		for data,error in check_input.items():
			if(error != True):
				return(json.dumps(error))
		if(message == []):
			return(json.dumps(self.DB.update_article(form)))
		return(json.dumps("something went wrong, I don't know what, I don't know why."))

	def delete_api(self, id):
		return(json.dumps(self.DB.delete_article(id)))