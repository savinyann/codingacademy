USE coding;

SELECT		min_duration AS 'Duration of the shortest movie'
FROM		movies
WHERE		min_duration<>0 AND min_duration IS NOT NULL
ORDER BY	min_duration
LIMIT 		1;
