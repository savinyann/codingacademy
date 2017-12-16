#!/usr/bin/python3.4
import sys;

class HasFriend:
	def __init__(self):
		self.my_friends = [];

	def friends(self, friends = None):
		if(friends != None):
			if(hasattr(self, 'friends')):
				self.my_friends.append(friends);
			else:
				self.my_friends = [friends];
		return(self.my_friends);