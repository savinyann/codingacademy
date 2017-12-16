#!/usr/bin/python3.4
import sys;
import email;
import sms;
import private;

def die():
	sys.exit()


body = "abcdefghijklmnopqrstuvwxyz123456789";
form = "me";
two = "you"
sub = "trying something";

mail1 = email.Email(_body = body, _from = form, _subject = sub, _to = two)
mail2 = email.Email(_body = body, _from = form, _subject = sub, _to = two)

private1 = private.Private(_body = body, _from = form, _subject = sub, _to = two)
body = "print";
form = "you";
two = "me"


sms = sms.Sms(_body = body, _from = form, _to = two)
print(mail1._body);
if(len(sys.argv) > 1):
	print(mail1.encrypt(int(sys.argv[1])));
	print(mail1.decrypt(int(sys.argv[1])));
else:
	print(mail1.encrypt());	
	print(mail1.decrypt());