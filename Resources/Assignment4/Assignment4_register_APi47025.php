<?php

// require once all the files
require_once("inc/config.inc.php");
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/PDOWrapper.class.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/Validate.class.php");

//Check if the form was posted
if (isset($_POST['submit'])) {
    // If the form entries are valid
    if (Validate::validateInputs()) {
        // initialize the DAO
        UserDAO::initialize();

        // Check if user already exist in database (Bonus mark)
        $checkUser = UserDAO::getUser($_POST['email']);
        if ($checkUser == null) { // user email not used, we can create a new entry in database
            // instantiate a new user
            $user = new User();

            // assemble the user data
            $user->setUserName($_POST['username']);
            $user->setPicture($_POST['picture']);
            $user->setPassword($_POST['password']);
            $user->setEmail($_POST['email']);
            $user->setPicture($_POST['picture']);
            $user->setQuestion($_POST['question']);
            $user->setAnswer($_POST['answer']);

            // create the user
            UserDAO::createUser($user);

            // send/redirect the user to the login page
            header("Location: Assignment4_login_Api47025.php");
        } else {
            Page::$notifications = "User already in use, choose another email account";
        }
    }
}

// Display the page elements and registration form (with updated page notifications if any)
Page::displayHeader();
Page::displayRegistration();
Page::displayFooter();
?>