<?php

// require once all the files
require_once("inc/config.inc.php");
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/PDOWrapper.class.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/Validate.class.php");

//Start the session
session_start();

// If no form is submitted
if (!isset($_POST['submit'])) {
    // Verify the Login
    if (LoginManager::verifyLogin()) {
        //Initialize the user DAO
        UserDAO::initialize();

        //Get the current user thats logged in
        $user = UserDAO::getUser($_SESSION['loggedin']);

        //Display page' element corresponding to the user details
        Page::displayHeader();
        Page::displayProfile($user, $question);
        Page::displayFooter();
    } else {
        // if login is not verified, redirect to the login page
        header("Location: Assignment4_login_Api47025.php");
    }
} else {
    // else 
    Page::$heading = $_POST['username'];
    // unset the session
    unset($_SESSION['loggedin']);

    // destroy the session
    session_destroy();

    // display logout page's elements
    Page::displayHeader();
    Page::displayLogout();
    Page::displayFooter();
}
?>