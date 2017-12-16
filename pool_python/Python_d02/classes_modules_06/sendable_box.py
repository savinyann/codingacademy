#!/usr/bin/python3.4
import time;
import sys;
import threading;


class SendableBox:
	all = []

	def __init__(self, max_box, sleep_duration = 1):
		self.all.append(self)
		self.max_box = max_box;
		self.sleep_duration = sleep_duration;
		self.new_message = False;
		k = threading.Thread(target=self.echo)
		k.start();


	def echo(self):
		while(self.max_box > 0):
			if self.new_message == True:
				print("New message from " + self._from + ":\n" + self._message);
				self.new_message = False;
				self.max_box -= 1;
			time.sleep(self.sleep_duration)
		print("SendableBox is full.")


	def recv(self, sendable):
		self._from = sendable._from;
		self._message = sendable._subject if (sendable._subject != None) else sendable._body;
		self.new_message = True;