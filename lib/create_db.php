<?php
mysql_connect('localhost', 'root', '');
mysql_select_db('fastcompany');

mysql_query("CREATE TABLE pending_users (
    token CHAR(40) NOT NULL,
    username VARCHAR(45) NOT NULL,
    tstamp INTEGER UNSIGNED NOT NULL,
    PRIMARY KEY(token)
)");
