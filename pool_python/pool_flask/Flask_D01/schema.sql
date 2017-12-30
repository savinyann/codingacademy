drop table if exists users;
create table users
	(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	username TEXT NOT NULL,
	password CHAR(128) NOT NULL,
	salt CHAR(32) NOT NULL,
	first_name TEXT NOT NULL,
	last_name TEXT NOT NULL,
	email TEXT NOT NULL,
	birthdate INTEGER NOT NULL,
	rank INTEGER DEFAULT 0,
	address TEXT,
	eye_color CHAR(10),
	adn_sequence TEXT,
	picture BLOB
	);