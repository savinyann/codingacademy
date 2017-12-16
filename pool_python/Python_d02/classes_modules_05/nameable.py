#!/usr/bin/python3.4
import sys;

class Nameable:
	def name(self, name = None):
		if(name != None):
			self.my_name = name;
		return(self.my_name);