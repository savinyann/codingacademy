USE coding;

SELECT	SUBSTRING(summary,1,92) AS 'Summaries'
FROM	movies
WHERE	id%2 = 1
	AND id >= 42
	AND id <= 84;
