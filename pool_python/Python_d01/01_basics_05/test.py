#!/usr/bin/python3.4
import sys;
import show_method;

if(len(sys.argv) > 1):
	if(sys.argv[1] == 'bool' or sys.argv[1] == 'booleans'):
		show_method.show_method(True);


	elif(sys.argv[1] == 'number' or sys.argv[1] == 'integer'):
		show_method.show_method(2);


	elif(sys.argv[1] == 'string'):
		show_method.show_method("string");


	elif(sys.argv[1] == 'list' or sys.argv[1] == 'List'):
		show_method.show_method([]);


	elif(sys.argv[1] == 'tuple' or sys.argv[1] == 'Tuple'):
		show_method.show_method(('echo', 'echo2'));


	elif(sys.argv[1] == 'dictionnary' or sys.argv[1] == 'dict'):
		show_method.show_method();
	else:
		print("bad parameters. Usage: test.py data_type");
else:
	print("bad parameters. Usage: test.py data_type");