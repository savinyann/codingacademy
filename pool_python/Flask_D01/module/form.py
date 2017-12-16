#!/usr/bin/python3
from flask_wtf import FlaskForm
from wtforms import *
from wtforms.validators import DataRequired
from wtforms.fields.html5 import *
from wtforms_components import ColorField

class MyRegister(FlaskForm):
	username = StringField('Username', validators=[DataRequired()])
	password = PasswordField('Password', validators=[DataRequired()])
	confirm = PasswordField('Confirm Password', validators=[DataRequired()])
	firstname = StringField('First Name', validators=[DataRequired()])
	lastname = StringField('Last Name', validators=[DataRequired()])
	email = EmailField('Email')
	birthdate = DateField('Birthdate')
	address = StringField('Address')
	adn = StringField('Favorite ADN sequence')

class MyLogin(FlaskForm):
	username = StringField('Username', validators=[DataRequired()])
	password = PasswordField('Password', validators=[DataRequired()])