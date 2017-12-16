#!/usr/bin/python3.4
import sys;
import email;
import sms;
from display_time import display_time
from dataalreadysent import DataAlreadySent as DataAlreadySent;


body = "echo";
sub = "trying something";
form = "me";
two = "you"

mail = email.Email(_body = body, _from = form, _subject = sub, _to = two)
sms = sms.Sms(_body = body, _from = form, _to = two)

print('~~~~~~~~ EMAIL ~~~~~~~~');
print('Body\t\t=', mail._body);
print('Sub\t\t=', mail._subject);
print('Form\t\t=', mail._from);
print('To\t\t=', mail._to);
print('Created at\t=', display_time(mail._created_at));
print('Updated at\t=', display_time(mail._updated_at));
print('Sent at\t\t=', mail._sent_at);

print("\n");

print('~~~~~~~~ SMS ~~~~~~~~');
print('Body\t\t=', sms._body);
print('Sub\t\t=', sms._subject);
print('Form\t\t=', sms._from);
print('To\t\t=', sms._to);
print('Created at\t=', display_time(sms._created_at));
print('Updated at\t=', display_time(sms._updated_at));
print('Sent at\t\t=', sms._sent_at);


try:
	print('~~~~~~~~ SEND MAIL 1st Time ~~~~~~~~');
	mail.send();
	print('~~~~~~~~ SEND MAIL 2nd Time ~~~~~~~~');

	mail.send();
except DataAlreadySent:
	print('This mail has already been send.');