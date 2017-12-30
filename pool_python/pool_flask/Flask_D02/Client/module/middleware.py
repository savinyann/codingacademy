#!/usr/bin/python3
import requests
from flask import session, abort

class logToAPI:
	def index(self):
		login = False
		for key in session.keys():
			if(key == "login_API"):
				login = True
		if(login == True):
			post = {}
			post['API_token'] = session["API_token"]
			session["API_token"] = requests.post('http://localhost:5000/apilog', post).json()
			if(session["API_token"] == "Bad token" or session["API_token"] == "Disconnected by time"):
				del session["API_token"]
			else:
				return(None)
		session["API_token"] = requests.get('http://localhost:5000/apilog').json()
		session["login_API"] = True
		if(session["login_API"] == False):
			abort(401)
		return(None)