<?php

// set the folder path for the image files
define("IMAGES", './images/');

// Set all the database things! double check with the PDOWrapper class and your database 
define("DB_HOST", "localhost");
define("DB_NAME", "Assignment4");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_PORT", 3306);

// Set the error log things!
define('LOGFILE', 'log/error_log.txt');
ini_set("log_errors", TRUE);
ini_set('error_log', LOGFILE);

// Do not change anything below this line
$question = array(
    "Q1" => "What is your favorite security question?",
    "Q2" => "What is your favorite villain character?",
    "Q3" => "Which planet do you want to go for your next vacation?",
    "Q4" => "What is the purpose of this question?",
    "Q5" => "When did you stop trying hard to pass this course?"
);
?>