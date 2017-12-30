#!/usr/bin/python3
from flask import request
import uuid
import json
import time

class middleware:
	user = {}
	def login(self):
		if(request.method == 'POST'):
			token_exist = False
			for key in self.user:
				if(key == "token"):
					token_exist = True
			if(token_exist == False or request.form["API_token"] != self.user["token"]):
				return(json.dumps("Bad token"))
			if(self.user["time"] >= time.time()):
				return(json.dumps("Disconnected by time"))
		self.user['token'] = str(uuid.uuid4())
		self.user['time'] = time.time() + 10
		return(json.dumps(self.user['token']))