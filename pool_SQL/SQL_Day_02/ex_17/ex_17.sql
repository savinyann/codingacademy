USE coding;

UPDATE	movies
SET	producer_id =
		    IFNULL
		    (
			producer_id,
			(
				SELECT	producer_id
				FROM	(SELECT * FROM movies)	AS movies2
				INNER JOIN producers
				ON    producers.id=movies2.producer_id
				WHERE producers.name LIKE '%film'
				GROUP BY producer_id
				ORDER BY COUNT(movies2.id) LIMIT 1
		    	)
		    )
;
