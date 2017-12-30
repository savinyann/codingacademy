#!/usr/bin/python3
import sys
import re

def isValidEmail(email):
	if len(email) > 7:
		if re.match('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$', email):
			return True
	return False


print(isValidEmail(sys.argv[1]))
