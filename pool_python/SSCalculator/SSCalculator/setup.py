#!/usr/bin/python3.4
import os
from setuptools import setup

def read(fname):
	return open(os.path.join(os.path.dirname(__file__), fname)).read();

setup(
    name='SSCalculator',
    version='0.1',
    scripts=['sscalculator.py'],
    description='Simple Scientific Calculator',
    author='Savin Yann',
    author_email='yann.savin@coding-academy.fr',
    url='none@none.none',
    packages=['sscalculator'],
    long_description=read('README'),
	classifiers=[
		"License :: OSI Approved :: GNU General Public License (GPL)",
		"Programming Language :: Python",
		"Development Status :: 3 - Alpha",
		"Intended Audience :: Simple Scientific",
		"Topic :: calculation",
	],
	keywords='Simple Scientific Calculator',
	license='GPL',
	)