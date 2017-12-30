#!/usr/bin/python3
from flask import Flask, request, session, g, redirect, url_for, abort, render_template, flash
from flask import current_app as app
import sqlite3

class database:
	""" Connect to DATABASE """
	def connect_db(self):
		db = sqlite3.connect(app.config['DATABASE'])
		db.row_factory = sqlite3.Row
		return(db)


	""" Retrieve a DATABASE connection or open a new one if there is none """
	def get_db(self):
		if not hasattr(g, 'sqlite_DB'):
			g.sqlite_DB = self.connect_db()
		return g.sqlite_DB


	""" Initialise DATABASE """
	def init_db(self):
		db = self.get_db()
		with app.open_resource('schema.sql', mode='r') as f:
			db.cursor().executescript(f.read())
		db.commit()


	""" Send a query to DATABASE """
	def SQLquery(self, Query, Variable = None):
		db = self.get_db()
		if(Variable == None):
			query = db.execute(Query)
		else:
			query = db.execute(Query, Variable)
			db.commit()
		return(query.fetchall())