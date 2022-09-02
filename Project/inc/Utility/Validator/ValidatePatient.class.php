<?php

class ValidatePatient
{
    static $validationNotify = array();

    static function validate()
    {
        self::validateText($_POST['firstName'], 30, 'firstName', "Please, enter a valid first name (max size: 30)");
        self::validateText($_POST['lastName'], 30, 'lastName', "Please, enter a valid last name (max size: 30)");
        self::validateEmail($_POST['emailField'], 'emailField', 50, "Please, enter a valid email (max size: 50)");
        self::validateNumber($_POST['phoneNumber'], 'phoneNumber', 15, "Please, enter a valid phone number (only numbers accepted)");
        self::validateText($_POST['address'], 100, 'address', "Please, enter a valid address (max size: 100)");
        self::validateText($_POST['city'], 30, 'city', "Please, enter a valid city (max size: 30)");
        self::validateText($_POST['zipcode'], 10, 'zipcode', "Please, enter a valid zipcode (max size: 10)");

        if (count(self::$validationNotify) > 0) {
            return false;
        }
        return true;
    }

    static function checkValidNewUser($email)
    {
        // check if email already used, if not we can create a new patient
        if (PatientDAO::getPatientByEmail($email) == null) {
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

    static function validateNumber($number, $tagNumber, $fieldSize, $value)
    {
        $optionReg = array("options" => array("regexp" => "/[0-9]/"));
        if (
            !filter_input(INPUT_POST, $tagNumber, FILTER_VALIDATE_REGEXP, $optionReg) ||
            strlen($number) > $fieldSize
        ) {
            self::$validationNotify[$tagNumber] = $value;
        }
    }
}
?>