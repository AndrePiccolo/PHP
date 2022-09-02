<?php

/**
 * Student Name:            Andre Piccolo
 * Student ID:              300347025
 * Assignment/File Name:    Assignment2
 * Section:                 002
 * 
 * Description: 
 *      Main file
 *    
 **/

require_once('inc/config.inc.php');
require_once('inc/HTMLPage.class.php');
require_once('inc/ValidatePage.class.php');

$errorArray = array();

HtmlPage::displayHeader();

if (isset($_POST['submit'])) {
    $errorArray = ValidatePage::validateInput();
    if (!empty($errorArray)) {
        HTMLPage::displayForm($errorArray);
        HTMLPage::displayErrorMessage($errorArray);
    } else {
        HTMLPage::displayThanks();
        HTMLPage::displayData();
    }
} else {
    HTMLPage::displayForm($errorArray);
}
HtmlPage::displayFooter();
?>