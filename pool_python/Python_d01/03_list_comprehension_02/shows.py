#!/usr/bin/python3.4
import sys;


def shows(dict):
	return [(key + " -> (" + type(dict[key]).__name__ + ": " + dict[key] + ')') for key in dict];
	"""list_r= [];
	for element in list:
		if(isinstance(element, int) == True):
			list_r.append(element +1);
		else:
			list_r.append(element);
	return(list_r);"""