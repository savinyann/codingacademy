USE coding;

SELECT COUNT(genre_id) AS "Number of 'western' movies"
FROM movies
INNER JOIN genres
ON movies.genre_id=genres.id
INNER JOIN producers
ON movies.producer_id=producers.id
WHERE genres.name = 'western' AND (producers.name = 'tartan movies' OR producers.name = 'lionsgate uk');
