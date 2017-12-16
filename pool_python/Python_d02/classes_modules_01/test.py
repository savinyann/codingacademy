#!/usr/bin/python3.4
import sys;
import email;
from display_time import display_time;


body = "echo";
sub = "trying something";
form = "me";
two = "you"

mail = email.Email(_body = body, _from = form, _subject = sub, _to = two)

print('Body\t\t=', mail._body);
print('Sub\t\t=', mail._subject);
print('Form\t\t=', mail._from);
print('To\t\t=', mail._to);
print('Created at\t=', display_time(mail._created_at));
print('Updated at\t=', display_time(mail._updated_at));
print('Sent at\t\t=', mail._sent_at);