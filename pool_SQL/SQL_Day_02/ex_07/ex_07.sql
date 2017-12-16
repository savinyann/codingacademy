USE coding;

SELECT	title	AS 'Movie title'
FROM	movies
WHERE	SUBSTRING(title,1,1) >= 'O'
	AND SUBSTRING(title,1,1) <= 'T'
ORDER BY title;
