USE coding;

SELECT	*
FROM	 movies
INTO OUTFILES	'/tmp/movies.csv'
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
