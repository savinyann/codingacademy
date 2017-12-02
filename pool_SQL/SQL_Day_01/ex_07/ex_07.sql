USE coding;

SELECT		name	AS 'Name of the most expensive susbscription',
		price	AS 'Price'
FROM		subscriptions
ORDER BY	price desc
LIMIT		1;
