SELECT REVERSE(SUBSTRING(phone_number, 2))
FROM distrib
WHERE phone_number LIKE '05%';

