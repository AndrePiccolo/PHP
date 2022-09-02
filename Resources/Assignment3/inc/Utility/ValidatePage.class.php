<?php

/**
 * Class that validate the user’s inputs form   
 **/

class ValidatePage
{
    static $valid_result = [];

    static function validateInput()
    {
        //Validate the reservationID
        if (strlen(trim($_POST['reservationID'])) == 0) {
            self::$valid_result['reservationID'] = "Please enter a valid reservation ID.";
        }

        //Validate the number of rooms, use filter_input with minimum range (1) and maximum range (3)
        $optionRange = array('options' => array("min_range" => 1, "max_range" => 3));
        if (!filter_input(INPUT_POST, 'rooms', FILTER_VALIDATE_INT, $optionRange)) {
            self::$valid_result["rooms"] = "The number of rooms should be between 1 and 3.";
        }

        //Validate the number of days, use filter_input with minimum range (1) and maximum range (5)
        $optionRange = array('options' => array("min_range" => 1, "max_range" => 5));
        if (!filter_input(INPUT_POST, 'days', FILTER_VALIDATE_INT, $optionRange)) {
            self::$valid_result["days"] = "The number of days should be between 1 and 5.";
        }

        return self::$valid_result;
    }
}
