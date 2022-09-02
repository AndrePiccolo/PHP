<?php

/**
 * Student Name:            Andre Piccolo
 * Student ID:              300347025
 * Assignment/File Name:    Assignment2
 * Section:                 002
 * 
 * Description: 
 *      class that validate the user’s inputs form
 *    
 **/

class ValidatePage
{

    static $valid_result = [];

    // This static function returns an error array. It is up to you on how to implement the 
    // error array. Make sure that you can use the array to display the error message 
    // and the validated post data
    // make sure to update the valid_result attribute everytime you validate an input.
    // all input are required

    static function validateInput()
    {
        //Validate the name
        if (strlen(trim($_POST['fullName'])) == 0) {
            self::$valid_result['fullName'] = "Please enter a valid name.";
        }

        //Validate the email address, use filter_input
        if(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
            self::$valid_result['email'] = "Please enter a valid email address.";
        }
        
        //Validate the student id, use filter_input with regexp  
        $optionReg = array("options"=>array("regexp"=>"/^\d{3}[\s]?\d{4}$/"));
        if(!filter_input(INPUT_POST, 'studentID', FILTER_VALIDATE_REGEXP, $optionReg) || 
            strlen($_POST['studentID']) != 7){
                self::$valid_result["studentID"] = "Please enter a valid 7 digits student ID.";
            }  

        //Ensure one of the international status options is checked
        if(empty($_POST['international'])){
            self::$valid_result["international"] = "Please choose the internation status.";
        }

        //Ensure the drop down was selected
        if($_POST['program'] == "Select..."){
            self::$valid_result["program"] = "Please select one of the computing sciences programs!";
        }

        //Validate the number of years, use filter_input with minimum range (1) and maximum range (6)
        $optionRange = array('options' => array("min_range" => 1, "max_range" => 6));
        if(!filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT, $optionRange)){
            self::$valid_result["years"] = "The number of years should be between 1 and 6.";
        }

        //Validate the number of courses, use filter_input to make sure it is integer
        if(!filter_input(INPUT_POST, 'courses', FILTER_VALIDATE_INT)){
            self::$valid_result["courses"] = "The number of courses should be integer";
        }

        return self::$valid_result;
    }
}
?>