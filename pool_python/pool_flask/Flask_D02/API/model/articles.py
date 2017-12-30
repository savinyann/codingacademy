#!/usr/bin/python3
import os,sys
sys.path.insert(1, os.path.join(sys.path[0], '..'))
from flask import Flask, request, session, g, redirect, url_for, abort, render_template, flash
import config.db as database


class articlesModel:
	def __init__(self):
		self.db = database.database()

	def dumb_db(self, article_id = None):
		if(article_id == None):
			query = 'SELECT * FROM articles'
			variable = None
		else:
			query = 'SELECT * FROM articles WHERE id = ?'
			variable = [article_id]
		return(self.db.SQLquery(query, variable))

	def store_article(self, post):
		if(self.titleAlreadyUsed(post['title']) == False):
			query = 'INSERT INTO articles (title, body, creation_date, user_id) VALUES (?,?,date("NOW"),?)'
			variable = [post['title'], post['body'], post['user_id']]
			self.db.SQLquery(query, variable)
		return("Everything was fine, and you were nice, so I have put everything in DB. It was nice to meet you, have a nice day!")
		return("An article with this title already exist. Sorry.")

	def update_article(self, post):
		query = 'UPDATE articles SET title = ?, body = ? WHERE id = ?'
		variable = [post['title'], post['body'], post['id']]
		self.db.SQLquery(query, variable)
		return('Article has been edited.')

	def delete_article(self, id):
		query = 'DELETE FROM articles WHERE id = ?'
		variable = [id]
		self.db.SQLquery(query, variable)
		return('Article has been deleted')

	def get_user(self, article):
		query = "SELECT * FROM articles WHERE title = ?"
		variable = [article['title']]
		return(self.db.SQLquery(query, variable))

	def titleAlreadyUsed(self, title):
		query = 'SELECT * FROM articles WHERE title = ?'
		variable = [title]
		if(self.db.SQLquery(query, variable) == []):
			return(False)
		return(True)