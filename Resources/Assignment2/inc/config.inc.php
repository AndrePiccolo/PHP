<?php

// MAKE SURE TO PUT YOUR NAME AND STUDENT ID HERE
define("DEVELOPER_NAME", "Andre Piccolo"); 
define("DEVELOPER_ID", "300347025"); 

// definition for log file
define('LOGFILE','log/error_log.txt');
  
// setting error logging to be active 
ini_set("log_errors", TRUE);  
  
// setting the logging file in php.ini 
ini_set('error_log', LOGFILE); 
?>