SELECT
	COUNT(id_sub) AS nb_susc,
	ROUND(AVG(price), 0) AS av_susc,
	SUM(MOD(duration_sub, 42)) AS ft
FROM subscription;

