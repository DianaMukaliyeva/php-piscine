SELECT `name` FROM `distrib`
WHERE 
    `id_distrib` BETWEEN 62 AND 69 OR
    `id_distrib` IN (42, 71, 88, 89, 90) OR
    LOWER(`name`) LIKE '%y%y%'
LIMIT 5 OFFSET 2;
