<?php

class Validate
{
    static function validateInputs()
    {
        if (strlen(trim($_POST['id'])) == 0) {
            return false;
        }

        if (strlen(trim($_POST['fullName'])) == 0) {
            return false;
        }

        if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        $optionRange = array('options' => array("min_range" => 1, "max_range" => 8));
        if (!filter_input(INPUT_POST, 'terms', FILTER_VALIDATE_INT, $optionRange)) {
            return false;
        }

        return true;
    }
}
