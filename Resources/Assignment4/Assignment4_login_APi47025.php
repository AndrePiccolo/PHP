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
    //Initialize the DAO
    UserDAO::initialize();

    //Get the current user 
    $currentUser = $_POST['username'];

    if (trim($currentUser) == "") {
        //if there is no such user, update the page notifications
        Page::$notifications = "Wrong user name or password";
    } else {
        //otherwise, check the DAO if it returns an object of type user
        $user = UserDAO::getUser($currentUser);

        if ($user != null) {
            //Verify the password with the posted data
            if ($user->verifyPassword($_POST['password'])) {

                //Start the session
                session_start();

                //Set the user to logged in. Remember, the username is email address 
                $_SESSION['loggedin'] = $user->getEmail();

                //Use header to send the user to the user profile page
                header("Location: Assignment4_profile_logout_Api47025.php");
            } else {
                // error message invalid password
                Page::$notifications = "Wrong user name or password";
            }
        } else {
            //error message invalid user
            Page::$notifications = "Wrong user name or password";
        }
    }
}

// Display the page element
Page::displayHeader();
Page::displayLogin();
Page::displayFooter();
?>