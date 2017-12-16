#!/usr/bin/python3.4
import time;

class Email:
	def __init__(self, *, _body, _subject, _from, _to):
		self._body = _body;
		self._subject = _subject;
		self._from = _from;
		self._to = _to;
		self._created_at = time.time();
		self._updated_at = time.time();
		self._sent_at = None;