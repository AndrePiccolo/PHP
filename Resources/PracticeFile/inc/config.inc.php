<?php

// Define configuration  
define("DB_HOST", "localhost");
define("DB_NAME", "StudentList");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_PORT", 3306);

// definition for log file
define('LOGFILE', 'log/error_log.txt');
ini_set("log_errors", TRUE);
ini_set('error_log', LOGFILE);
