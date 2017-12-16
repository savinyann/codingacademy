import sendable;

class Private(sendable.Sendable):
	def __init__(self, *warg, _body, _subject, _from, _to):
		super().__init__(_body = _body, _from = _from, _to = _to, _subject = _subject);
		self.already_send = False;

	def send(self):
		if(self.already_send == True):
			raise DataAlreadySent
		self.already_send = True
