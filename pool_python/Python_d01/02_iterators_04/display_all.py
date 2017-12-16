#!/usr/bin/python3.4
import sys;


def display_all(array):
	for key,value in enumerate(array):
		print(str(key) + ' -> ' + type(value).__name__ + ': ' + str(value) + '\n');