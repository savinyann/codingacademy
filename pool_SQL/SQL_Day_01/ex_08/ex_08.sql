USE coding;

SELECT		title
FROM		movies
INNER JOIN	genres
ON    		movies.genre_id = genres.id
WHERE		genres.name = 'romance' OR genres.name = 'action';
