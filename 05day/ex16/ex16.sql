SELECT COUNT(id_film) AS movies
FROM member_history
WHERE
	(DATE(date) < DATE('2007-07-27') AND
	DATE(date) > DATE('2006-12-24')) OR
	(MONTH(date) = '12' AND 
	DAY(date) = '24');

