#!/usr/bin/python3.4
import sys;
import display_time;
import time;

if(len(sys.argv) > 1 and isinstance(int(sys.argv[1]), int)):
	print(display_time.display_time(int(sys.argv[1])-3600));
else:
	print(display_time.display_time(time.time()));