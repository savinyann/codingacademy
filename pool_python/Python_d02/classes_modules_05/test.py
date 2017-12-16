#!/usr/bin/python3.4
from contact import Contact

def die():
	sys.exit()

test = Contact();
test.address('21 rue de Dreux')
test.name('Yann');
test.friends('echo');
test.friends('print');
print(test.address());
print(test.name());
print(test.friends());