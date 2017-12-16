USE coding;

SELECT	CONCAT
	(
	UPPER(SUBSTRING(lastname,1,1)),
	LOWER(SUBSTRING(lastname,2)),
	'-',
	UPPER(SUBSTRING(firstname,1,1)),
	LOWER(SUBSTRING(firstname,2))
	)
	AS 'Full name'
FROM profiles
ORDER BY birthdate desc;
