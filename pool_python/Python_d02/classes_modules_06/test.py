#!/usr/bin/python3.4
import sys;
import email;
import sms;
import time;
import private;
import sendable_box

def die():
	sys.exit()


body = "abcdefghijklmnopqrstuvwxyz123456789";
form = "me";
two = "you"
sub = "trying something";
body2 = "I have made a mistake in my previous mail: abcdefghijklmnopqrstuvwxyz1234567890";

mail1 = email.Email(_body = body, _from = form, _subject = None, _to = two)
mail2 = email.Email(_body = body2, _from = form, _subject = None, _to = two)

mailBox = sendable_box.SendableBox(2,7);



time.sleep(5);
print('~~~~~~~~ SEND MAIL 1 ~~~~~~~~');
mail1.send();


time.sleep(10);
print('~~~~~~~~ SEND MAIL 2 ~~~~~~~~');
mail2.send();


time.sleep(8)
print('~~~~~~~~ HISTORY ~~~~~~~~');
mail1.history();