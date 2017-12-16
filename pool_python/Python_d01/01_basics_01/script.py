#!/usr/bin/python3.4
import sys

count = 0;
for data in sys.argv[1:]:
	for char in data:
		count += char.isalnum()
print(count);