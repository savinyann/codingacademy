#!/usr/bin/python3.4
import sys;
import email;
import sms;
import private;


body = "echo";
form = "me";
two = "you"
sub = "trying something";

mail1 = email.Email(_body = body, _from = form, _subject = sub, _to = two)
form = "you"
mail2 = email.Email(_body = body, _from = form, _subject = sub, _to = two)
private1 = private.Private(_body = body, _from = form, _subject = sub, _to = two)

body = "print";
form = "you";
two = "me"

sms = sms.Sms(_body = body, _from = form, _to = two)



print('~~~~~~~~ SEND PRIVATE ~~~~~~~~');
private1.send();
print(private.sendable.Sendable.log);

print('~~~~~~~~ SEND MAIL1 ~~~~~~~~');
mail1.send();
print(email.sendable.Sendable.log);

print('~~~~~~~~ SEND MAIL2 ~~~~~~~~');
mail2.send();
print(email.sendable.Sendable.log);

print('~~~~~~~~ HISTORY ~~~~~~~~');
mail1.history();