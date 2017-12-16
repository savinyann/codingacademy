#!/usr/bin/python3.4

import sys;

class Addressable:
	def address(self, adresse = None):
		if(adresse != None):
			self.my_adresse = adresse;
		return(self.my_adresse);