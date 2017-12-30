#!/usr/bin/python3
import os,sys
sys.path.insert(1, os.path.join(sys.path[0], '..'))
from flask import Flask, request, session, g, redirect, url_for, abort, render_template, flash
import model.database as database


class model:
	def __init__(self):
		self.db = database.database()

	def dumb_db(self, user_id = None):
		if(user_id == None):
			query = 'SELECT * FROM users'
			variable = None
		else:
			query = 'SELECT * FROM users WHERE id = ?'
			variable = [user_id]
		return(self.db.SQLquery(query, variable))

	def store_user(self, post):
		if(self.usernameAlreadyUsed(post['username']) == False):
			query = 'INSERT INTO users (username, password, salt, first_name, last_name, email, birthdate, address, eye_color, adn_sequence) VALUES (?,?,?,?,?,?,?,?,?,?)'
			variable = [post['username'], post['password'], post['salt'], post['firstname'], post['lastname'], post['email'], post['birthdate'], post['address'], post['eyecolor'], post['ADN']]
			self.db.SQLquery(query, variable)
		return("Everything was fine, and you were nice, so I have put everything in DB. It was nice to meet you, have a nice day!")
		return("Username is already used. Sorry.")

	def update_user(self, post):
		query = 'UPDATE users SET username = ?, password = ?, salt = ?, first_name = ?, last_name = ?, email = ?, birthdate = ?, address = ?, eye_color = ?, adn_sequence = ? where id = ?'
		variable = [post['username'], post['password'], post['salt'], post['firstname'], post['lastname'], post['email'], post['birthdate'], post['address'], post['eyecolor'], post['ADN'], post['id']]
		self.db.SQLquery(query, variable)
		return('User has been edited.')

	def delete_user(self, id):
		query = 'DELETE FROM users WHERE id = ?'
		variable = [id]
		self.db.SQLquery(query, variable)
		return('User has been deleted')

	def get_user(self, user):
		query = "SELECT * FROM users WHERE username = ?"
		variable = [user['username']]
		return(self.db.SQLquery(query, variable))

	def usernameAlreadyUsed(self, username):
		query = 'SELECT * FROM users WHERE username = ?'
		variable = [username]
		if(self.db.SQLquery(query, variable) == []):
			return(False)
		return(True)