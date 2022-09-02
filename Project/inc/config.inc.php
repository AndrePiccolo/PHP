<?php

// Set all the database things! double check with the PDOWrapper class and your database 
define("DB_HOST", "localhost");
define("DB_NAME", "projectAPi47025");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_PORT", 3306);

// Set the error log things!
define('LOGFILE', 'log/error_log.txt');
ini_set("log_errors", TRUE);
ini_set('error_log', LOGFILE);

?>