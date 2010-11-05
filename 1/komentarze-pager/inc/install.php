<?php

/* open new database */
$connect = sqlite_open("comments.db");

/* build an SQL statement */
$sql = "create table comments(id INTEGER PRIMARY KEY, nick char, content char)";

/* run the query */
sqlite_query($sql, $connect);

/* build an SQL statement */
$sql = "insert into comments values (NULL, 'yarpo', 'działa')";

/* run the query */
sqlite_query($sql, $connect);

/* build an SQL statement */
$sql = "select * from comments";

/* run the query */
$res = sqlite_single_query($sql, $connect);

/* print the result */
print($res);
?> 
