USE coding;

LOAD DATA	INFILE '/tmp/jobs.csv'
INTO TABLE	jobs
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
IGNORE 1 LINES;