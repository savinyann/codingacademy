import sendable;

class Email(sendable.Sendable):
	def __init__(self, *warg, _body, _subject, _from, _to):
		super().__init__(_body = _body, _from = _from, _to = _to, _subject = _subject);