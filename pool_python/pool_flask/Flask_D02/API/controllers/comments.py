#!/usr/bin/python3
import os,sys
sys.path.insert(1, os.path.join(sys.path[0], '..'))
from flask import Flask, request, session, g, redirect, url_for, abort, render_template, flash
from model.comments import *
from module.form import *
from module.check_input import *
import json

class comments:
	def __init__(self):
		self.DB = commentsModel()


	""" -----------------     API CONTROLLER     ----------------- """

	def dump_api(self, article_id, comment_id = None):
		comments_raw = self.DB.dumb_db(article_id, comment_id)
		comments = []
		for comment_raw in comments_raw:
			comment = {}
			comment['id'] = comment_raw['id']
			comment['message'] = comment_raw['message']
			comment['creation_date'] = comment_raw['creation_date']
			comment['article_id'] = comment_raw['article_id']
			comment['user_id'] = comment_raw['user_id']
			comments.append(comment)
			print('comment = ',comment)
		return(json.dumps(comments))

	def store_api(self, article_id):
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
			return(json.dumps(self.DB.store_comment(form, article_id)))
		return(json.dumps("something went wrong, I don't know what, I don't know why."))

	def read_api(self, article_id, comment_id):
		comment = {}
		dumb = self.DB.dumb_db(article_id, comment_id)[0]
		comment['id'] = dumb['id'];
		comment['message'] = dumb['message'];
		comment['creation_date'] = dumb['creation_date']
		comment['article_id'] = dumb['article_id'];
		comment['user_id'] = dumb['user_id'];
		return(json.dumps(comment))

	def update_api(self, comment_id):
		message = []
		form = {'id' : comment_id}
		for data in request.form:
			form[data] = request.form[data]

		check_input = CheckInput(form)
		check_input = check_input.get_CheckInput()

		for data,error in check_input.items():
			if(error != True):
				return(json.dumps(error))
		if(message == []):
			return(json.dumps(self.DB.update_comment(form)))
		return(json.dumps("something went wrong, I don't know what, I don't know why."))

	def delete_api(self, comment_id):
		return(json.dumps(self.DB.delete_comment(comment_id)))