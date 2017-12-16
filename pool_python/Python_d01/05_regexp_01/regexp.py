#!/usr/bin/python3.4
import sys;
import functools;

ERROR = "This is not a valid email: "

def parse_email(string):
	result = ""
	for char in string:
		if(char == "@"):
			user = result;
			result = "";
		else:
			result += char;
	if(result == string):
		print("This is not a valid email. Asshole.");
		sys.exit();
	return(user, result);

def parse_domain(string):
	subdomain = [];
	result = ""
	for char in string:
		if(char == "."):
			subdomain.append(result);
			result = "";
		else:
			result += char;
	subdomain.append(result);
	return(subdomain);



def user_verify(string):
	if(len(string) < 2):
		print( ERROR + "USER is too short.");
		sys.exit();
	if(len(string) > 1022):
		print(ERROR + "USER is too long.");
		sys.exit();
	if(string.isalnum() != True):
		print(ERROR + "USER contain illegal caracters");
		sys.exit();
	return(True);

def domain_verify(string):
	if(len(string) < 2):
		print( ERROR + "DOMAIN is too short.");
		sys.exit();
	if(len(string) > 252):
		print(ERROR + "DOMAIN is too long.");
		sys.exit();
	return(True);

def subdomain_verify(string):
	if(string[0].isalpha() == False):
		print(ERROR + subdomain + " is not a valid subdomain because it doesn't start with a alphabetic character")
		sys.exit();
	if(string[1:].isalnum() == False):
		print(ERROR + subdomain + " is not a valid subdomain because it contain a non-alphanumeric character")
		sys.exit();
	if(len(string[1:]) < 1):
		print(ERROR + subdomain + " is too short to be a valid subdomain")
		sys.exit();
	if(len(string[1:]) > 61):
		print(ERROR + subdomain + " is too long to be a valid subdomain")
		sys.exit();
	return(True);



if(len(sys.argv) > 1):
	EMAIL = sys.argv[1];
	(USER, DOMAIN) = parse_email(EMAIL);
	print('User', user_verify(USER));
	print('DOMAIN', domain_verify(DOMAIN));
	SUBDOMAIN = parse_domain(DOMAIN);
	print(SUBDOMAIN);
	for subdomain in SUBDOMAIN:
		print(subdomain, subdomain_verify(subdomain));
	print(USER, DOMAIN);
	print(EMAIL + ' is a valid email.');