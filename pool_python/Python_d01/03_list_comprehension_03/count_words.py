#!/usr/bin/python3.4
import sys;


def my_count_words(list):
	return {key : list.count(key) for key in list};