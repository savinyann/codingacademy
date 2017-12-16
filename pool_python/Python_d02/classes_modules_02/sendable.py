#!/usr/bin/python3.4
import datetime;
import time;
from dataalreadysent import DataAlreadySent as DataAlreadySent;

class Sendable:
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