USE coding;

SELECT	title AS 'Number of movies that starts with "eX"'
FROM	movies
WHERE	title COLLATE latin1_general_CS LIKE 'eX%';
