<?php

// See the textbook CH 9 for more information about string functions

class Validate
{

    public static $ERROR_MESSAGE = "All inputs are required. <br> Please fix the error(s) in the username, email, password, password confirm, profile picture, not secret question, and not secret answer inputs";

    // create a function to validate the registration form
    static function validateInputs()
    {
        // Please use filter to validate the inputs whenever possible    

        // What to validate?

        // username should not be empty
        // Also replace occurences of whitespace, semicolon, colon, comma, ampersand,
        // dollar sign, < and > and any improper character with nothing    
        $pattern = "/[^a-zA-Z0-9]/";
        if (strlen(trim($_POST['username'])) == 0) {
            Page::$notifications = self::$ERROR_MESSAGE;
        } else {
            $_POST['username'] = preg_replace($pattern, "", $_POST['username']);
        }

        // password
        // should be a 5 digits string
        // both password and password confirm needs to be exactly similar
        if (
            strlen(trim($_POST['password'])) != 5 ||
            strcmp(trim($_POST['password']), trim($_POST['password2'])) != 0
        ) {
            Page::$notifications = self::$ERROR_MESSAGE;
            return false;
        }

        // Email should be email format
        if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            Page::$notifications = self::$ERROR_MESSAGE;
            return false;
        }

        // One of the profile images must be chosen
        if (empty($_POST['picture'])) {
            Page::$notifications = self::$ERROR_MESSAGE;
            return false;
        }

        // One of the not security questions should be selected
        if ($_POST['question'] == "") {
            Page::$notifications = self::$ERROR_MESSAGE;
            return false;
        }

        // The answer should not be empty
        if (strlen(trim($_POST['answer'])) == 0) {
            Page::$notifications = self::$ERROR_MESSAGE;
            return false;
        }

        // the function should update the page's notifications
        // you can also return some value to the calling function 
        return true;
    }
}
?>