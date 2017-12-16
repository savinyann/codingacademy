#!/usr/bin/python3.4
from addressable import Addressable;
from nameable import Nameable;
from has_friend import HasFriend;

class Contact(Addressable, Nameable, HasFriend):
	pass