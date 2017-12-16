#!/usr/bin/python3.4
import datetime;

def display_time(timestamps):
	return(datetime.datetime.fromtimestamp(timestamps).strftime('%H:%M:%S, %A, %w* day of the %W* week of %Y, %B'))