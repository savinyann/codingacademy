USE coding;

SELECT	prod_year AS 'Year of production',
	count(id) AS 'Number of movies'
FROM	movies
WHERE	prod_year<>0
GROUP BY prod_year;
