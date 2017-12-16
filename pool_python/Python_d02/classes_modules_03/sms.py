import sendable;
import time;

class Sms(sendable.Sendable):
	def __init__(self, *, _body, _from, _to):
		super().__init__(_body = _body, _from = _from, _to = _to, _subject = None)
		self._body = _body;
		self._from = _from;
		self._to = _to;
		self._created_at = time.time();
		self._updated_at = time.time();
		self._sent_at = None;