#!/bin/bash
login=your_login
user=root
pw=your_mysql_password
db_name=db_your_login
mysql="/Users/$login/goinfre/mamp/mysql/bin/mysql"
$mysql -"u$user" -"p$pw" -e "drop database $db_name;"
$mysql -"u$user" -"p$pw" < ex00/ex00.sql
$mysql -"u$user" -"p$pw" $db_name < base-student.sql
for i in $(seq -w 01 21); do
	echo "ex$i/ex$i.sql";
	echo "===";
	$mysql -"u$user" -"p$pw" $db_name < "ex$i/ex$i.sql";
done

