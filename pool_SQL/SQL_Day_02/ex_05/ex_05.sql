USE coding;

SELECT	REPLACE(email, 'machin.com', 'coding-academy.fr')
		       AS 'New email addresses'
FROM	profiles
ORDER BY email desc;
