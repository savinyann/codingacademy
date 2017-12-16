#!/usr/bin/python3.4
import datetime;
import time;
import sys;
from display_time import display_time;
from dataalreadysent import DataAlreadySent;

class Sendable:
	log = {};

	def __init__(self, *warg, _body, _subject, _from, _to):
		if(warg != ()):
			print('parameter have to be named.');
			sys.exit();
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

		key_exist = False;
		to_exist = False;
		for key in Sendable.log:
			if(key == self._from):
				key_exist = True;
				for to in Sendable.log[key]:
					if(to == self._to):
						to_exist = True;

		if(key_exist == True):
			if(to_exist == True):
				Sendable.log[self._from][to].append(self._sent_at)
			else:
				Sendable.log[self._from][self._to] = [self._sent_at]
		else:
			Sendable.log[self._from] = {self._to : [self._sent_at]}

	def history(self):
		for key,value in self.log.items():
			for subkey, subvalue in value.items():
				for subsubvalue in subvalue:
					print(key + ' has send message to ' + subkey + ' at ' + display_time(subsubvalue) + '.');