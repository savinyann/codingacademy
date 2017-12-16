USE coding;

SELECT	COUNT(id)
		AS 'Number of members',
	ROUND(AVG(TIMESTAMPDIFF(YEAR,birthdate,TIMESTAMP(CURDATE()))),0)
		AS 'Average age'
FROM profiles;
