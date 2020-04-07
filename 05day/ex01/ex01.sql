CREATE TABLE IF NOT EXISTS ft_table (
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	login VARCHAR(8) DEFAULT 'toto' NOT NULL,
	`group` ENUM ('staff', 'student', 'other') NOT NULL,
	creation_date DATE NOT NULL
);

