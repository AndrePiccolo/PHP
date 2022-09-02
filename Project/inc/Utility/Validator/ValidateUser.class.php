<?php

/**
 * Class that validate the user’s inputs form   
 **/

class ValidateUser
{
    static $validationNotify = array();

    static function validate($type)
    {
        if ($type == "add") {
            self::validateText($_POST['firstName'], 30, 'firstName', "Please, enter a valid first name (max size: 30)");
            self::validateText($_POST['lastName'], 30, 'lastName', "Please, enter a valid last name (max size: 30)");
            self::validateEmail($_POST['emailField'], 'emailField', 50, "Please, enter a valid email (max size: 50)");
            self::validateText($_POST['password'], 'password', 20, "Please, enter a valid password (max size: 250)");
        } else {
            self::validateText($_POST['firstName'], 30, 'firstName', "Please, enter a valid first name (max size: 30)");
            self::validateText($_POST['lastName'], 30, 'lastName', "Please, enter a valid last name (max size: 30)");
        }

        if (count(self::$validationNotify) > 0) {
            return false;
        }
        return true;
    }

    static function checkValidNewUser($email)
    {
        // check if email already used, if not we can create a new patient
        if (UserDAO::getUserByEmail($email) == null) {
            return true;
        }
        self::$validationNotify['emailField'] = "Email already used. Please, choose another email";
        return false;
    }

    static function validateText($text, $fieldSize, $key, $value)
    {
        if (strlen(trim($text)) == 0 || strlen($text) > $fieldSize) {
            self::$validationNotify[$key] = $value;
        }
    }

    static function validateEmail($email, $tagEmail, $fieldSize, $value)
    {
        if (
            !filter_input(INPUT_POST, $tagEmail, FILTER_VALIDATE_EMAIL) ||
            strlen($email) > $fieldSize
        ) {
            self::$validationNotify[$tagEmail] = $value;
        }
    }
}
?>