#!/usr/bin/python3
import os,sys
sys.path.insert(1, os.path.join(sys.path[0], '..'))
from flask import Flask, request, session, g, redirect, url_for, abort, render_template, flash
import config.db as database


class commentsModel:
	def __init__(self):
		self.db = database.database()

	def dumb_db(self, article_id, comment_id = None):
		if(comment_id == None):
			query = 'SELECT * FROM comments WHERE article_id = ?'
			variable = [article_id]
		else:
			query = 'SELECT * FROM comments WHERE id = ? AND article_id = ?'
			variable = [comment_id, article_id]
		return(self.db.SQLquery(query, variable))

	def store_comment(self, post, article_id):
		query = 'INSERT INTO comments (message, creation_date,article_id, user_id) VALUES (?,date("NOW"),?,?)'
		variable = [post['message'], article_id, post['user_id']]
		self.db.SQLquery(query, variable)
		return("Everything was fine, and you were nice, so I have put everything in DB. It was nice to meet you, have a nice day!")
	
	def update_comment(self, post):
		query = 'UPDATE comments SET message = ? WHERE id = ?'
		variable = [post['message'], post['id']]
		self.db.SQLquery(query, variable)
		return('Comment has been edited.')

	def delete_comment(self, id):
		query = 'DELETE FROM comments WHERE id = ?'
		variable = [id]
		self.db.SQLquery(query, variable)
		return('Comment has been deleted')

	def get_user(self, comment):
		query = "SELECT * FROM comments WHERE title = ?"
		variable = [comment['title']]
		return(self.db.SQLquery(query, variable))