USE coding;

SELECT	title,
	min_duration
FROM	movies
ORDER BY LENGTH(title) desc,
      	 min_duration;
