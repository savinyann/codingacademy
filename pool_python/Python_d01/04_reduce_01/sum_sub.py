#!/usr/bin/python3.4
import sys;
import functools;

if(len(sys.argv)) == 1:
	print(0);
else:
	print([(int(element)) for element in sys.argv[1:]]);
	print(functools.reduce(lambda x, y: x+y if (x % 2 == 0) else x-y, [(int(element)) for element in sys.argv[1:]]));