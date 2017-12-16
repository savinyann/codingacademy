#!/usr/bin/python3.4
import sys;
import shows;

dict = {'name' : 'Yann', 'age' : '28', 'class' : 'CodingAcademy'};
for show in shows.shows(dict):
	print(show);