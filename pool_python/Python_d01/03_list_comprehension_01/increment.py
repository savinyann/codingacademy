#!/usr/bin/python3.4
import sys;


def increment(list):
	return [(element +1 if isinstance(element, int) else element) for element in list];