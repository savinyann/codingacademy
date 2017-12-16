USE coding;

UPDATE	profiles
SET	email = (SELECT REPLACE(email,	'machin.com', 'coding-academy.fr'));
