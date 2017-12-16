#!/usr/bin/python3.4
import sys;


def display_all(dict):
	for value in dict:
		print("(" + type(dict[value]).__name__, ': ', str(dict[value]) + ")\n");