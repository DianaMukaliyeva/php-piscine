INSERT INTO db_dmukaliy.ft_table(`login`, `group`, `creation_date`)
SELECT `last_name` AS `login`, 'other' AS `group`, `birthdate` AS `creation_date`
FROM db_dmukaliy.user_card
WHERE
    (length(`last_name`) < 9) AND
    (`last_name` LIKE '%a%')
ORDER BY `last_name` ASC
LIMIT 10;
