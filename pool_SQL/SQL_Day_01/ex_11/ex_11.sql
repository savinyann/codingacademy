USE coding;

SELECT	COUNT(title)
		AS 'Number of movies ending with "tion"'
FROM	movies
WHERE	title like '%tion';
