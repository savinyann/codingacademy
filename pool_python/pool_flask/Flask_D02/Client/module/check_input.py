#!/usr/bin/python3
import re


class CheckInput():
	checkInput = {}
	def __init__(self, input):
		for key,value in input.items():
			if(key == 'title'):
				self.checkInput[key] = self.Check_Title(value)

			if(key == 'body'):
				self.checkInput[key] = self.Check_Body(value)

			if(key == 'user_id'):
				self.checkInput[key] = self.Check_UserID(value)

			if(key == 'username'):
				self.checkInput[key] = self.Check_UserName(value)

			if(key == 'password'):
				self.checkInput[key] = self.Check_Password(value)

			if(key == 'firstname'):
				self.checkInput[key] = self.Check_FirstName(value)

			if(key == 'lastname'):
				self.checkInput[key] = self.Check_LastName(value)

			if(key == 'email'):
				self.checkInput[key] = self.Check_Email(value)

			if(key == 'birthdate'):
				self.checkInput[key] = self.Check_Birthdate(value)

			if(key == 'address'):
				self.checkInput[key] = self.Check_Address(value)

			if(key == 'eyecolor'):
				self.checkInput[key] = self.Check_EyeColor(value)

			if(key == 'ADN'):
				self.checkInput[key] = self.Check_ADN(value)

	def get_CheckInput(self):
		return(self.checkInput)


	def Check_UserName(self, username):
		if(len(username) == 0):
			return("You can not don't have an username, be serious please.")
		if(len(username) < 3):
			return("Username too short, like your penis. A correct username will have like, 3 characters, at least.")
		if(len(username) >15):
			return("Username is too long. It can exceed 15 caracters, because horse.")
		return(True)


	def Check_Password(self, password):
		if(type(password).__name__ == 'str'):
			if(len(password) == 0):
				return("Do you really expect to come in without a password ? LoL !")
			if(len(password) <= 8):
				return('I do not have to check if this is your password, because it is an invalide password.')
		else:
			if(len(password[0]) == 0):
				return("Yeah, fuck security ! FUCK YOU, PUT A FUCKING PASSWORD !")
			if(len(password[0]) <= 8):
				return("ARE YOU KIDDING ME ? SOME PEOPLE WILL CRACK YOUR PASSWORD IN LEAST THAN A SECOND, YOU CUNT ! MAKE IT LONGER.")
			if(len(password[0]) >15):
				return("Ok, password length is important, but too long is too long. Please, make it shorter.")
			if(password[0] != password[1]):
				return("This password doesn't match with its confirmation. Please, go back to CP and learnt to write.")
		return(True)
		

	def Check_FirstName(self, firstname):
		if(len(firstname) == 0):
			return("You can not don't have a name. Or your parents doesn't like you ?")
		return(True)
		

	def Check_LastName(self, lastname):
		if(len(lastname) == 0):
			return("You don't know your onw lastname ? What a shame !")
		if(len(lastname) <= 3):
			return("Username to short, like your penis. A correct username will have like, 3 characters, at least.")
		if(len(lastname) >15):
			return("Username is too long. It can exceed 15 caracters, because horse.")
		return(True)
		

	def Check_Email(self, email):
		if re.match('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$', email):
			return(True)
		return("This email is not valid, you homeless.")


	def Check_Birthdate(self, birthdate):
		return(True)
		

	def Check_Address(self, address):
		return(True)

	def Check_EyeColor(self, eye_color):
		return(True)

	def Check_ADN(self, ADN):
		if re.match('^[ATCG]{0,}$', ADN):
			return(True)
		return("This is not a valid ADN sequence.")

	def Check_UserID(self, id):
		if(id.isnumeric()):
			return(True)
		return("This is not a valid id. An id is an integer.")

	def Check_Title(self, title):
		if(len(title) > 5):
			return(True)
		return("Title is too short. It must contain at least 6 characters.")

	def Check_Body(self, body):
		return(True)