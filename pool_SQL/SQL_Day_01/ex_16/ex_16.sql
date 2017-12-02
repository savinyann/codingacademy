USE coding;

SELECT		MONTHNAME(birthdate)
		AS 'month of birth'
FROM		profiles
ORDER BY	id
LIMIT 		41, 43;
