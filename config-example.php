<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'AnalynSantos20');
define('DB_NAME', 'sampleUser4');
define('DB_NAME2', 'entry');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$link2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME2);