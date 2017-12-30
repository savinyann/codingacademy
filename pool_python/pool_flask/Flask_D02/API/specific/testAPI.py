#!/usr/bin/python3
import sys
import requests
import json

if(len(sys.argv) < 3):
	print('Bad usage: you must specify a username and a password')
	sys.exit()

data = {}
data['username'] = sys.argv[1]
data['password'] = sys.argv[2]
response = requests.post('http://localhost:5000/login_api', data)
print(response.json())