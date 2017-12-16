#!/usr/bin/python3

import hashlib
import uuid

def password_hash(password):
	salt = uuid.uuid4().hex
	return (hashlib.sha512((password + salt).encode('utf-8')).hexdigest(), salt);

def password_verify(password_hashed, password, salt):
	password = hashlib.sha512((password + salt).encode('utf-8')).hexdigest()
	if(password == password_hashed):
		return(True)
	return(False)