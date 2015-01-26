<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'todo_list');
define('DB_USER', 'codeup');
define('DB_PASS', 'codeup');
require_once('db_connect.php');

$query = 'CREATE TABLE todo_list (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    priority_field INT UNIQUE NOT NULL,
    todo_item VARCHAR(255) NOT NULL,
    time_stamp DATETIME NOT NULL,
    mark_complete DATE,
    PRIMARY KEY (id)
)';

$dbc->exec($query);