#!/usr/bin/python3.4
import datetime;
import time;
import sys;
import sendable_box;
from display_time import display_time;
from dataalreadysent import DataAlreadySent;

class Sendable:
	log = {};

	def __init__(self, *, _body, _subject, _from, _to):
		self._body = _body;
		self._subject = _subject;
		self._from = _from;
		self._to = _to;
		self._created_at = time.time();
		self._updated_at = time.time();
		self._sent_at = None;

	def send(self):
		if self._sent_at != None:
			raise DataAlreadySent
		self._sent_at = time.time();

		from_exist, to_exist = self.check_if_in_log()
		self.add_log(from_exist, to_exist)


	def check_if_in_log(self):
		from_exist = False;
		to_exist = False;
		
		for key in Sendable.log:
			if(key == self._from):
				from_exist = True;
				for to in Sendable.log[key]:
					if(to == self._to):
						to_exist = True;
		return(from_exist, to_exist)



	def add_log(self, key, to):
		if(key == True):
			if(to == True):
				Sendable.log[self._from][self._to].append(self._sent_at)
			else:
				Sendable.log[self._from][self._to] = [self._sent_at]
		else:
			Sendable.log[self._from] = {self._to : [self._sent_at]}
		sendable_box.SendableBox.all[0].recv(self);


	def history(self):
		for key,value in self.log.items():
			for subkey, subvalue in value.items():
				for subsubvalue in subvalue:
					print(key + ' has send message to ' + subkey + ' at ' + display_time(subsubvalue) + '.');


	def encrypt(self, rotate = 13):
		rotate %= 26;
		new_body = "";
		for char in self._body:
			if(char.isalpha()):
				asc = ord(char) + rotate;
				if(asc > 122):
					asc -= 26;
				new_body += chr(asc);
			else:
				new_body += char;
		return(new_body);


	def decrypt(self, rotate = 13):
		rotate %= 26;
		new_body = "";
		for char in self._body:
			if(char.isalpha()):
				asc = ord(char) - rotate;
				if(asc < 97):
					asc += 26;
				new_body += chr(asc);
			else:
				new_body += char;
		return(new_body);