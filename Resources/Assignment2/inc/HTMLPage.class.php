<?php

/**
 * Student Name:            Andre Piccolo
 * Student ID:              300347025
 * Assignment/File Name:    Assignment2
 * Section:                 002
 * 
 * Description: 
 *      class that has all the static methods to display the page
 *    
 **/

class HTMLPage
{
    static private $title = "Assignment 2: Form Processing by " . DEVELOPER_NAME . " -- " . DEVELOPER_ID;

    // This static function set the HTML header including the title and display the student name and ID
    static function displayHeader()
    {
        ?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta name="author" content="">
            <title></title>
            <link href="css/styles.css" rel="stylesheet">
        </head>

        <body>
            <header>
                <h1>
                    <?php echo self::$title; ?>
                </h1>
            </header>

            <section class="main">
        <?php
    }

    // This static function close all the HTML tags at the bottom of the document
    static function displayFooter()
    {
        ?>
            </body>

            </html>
        <?php
    }

    // This static function display the form. It gets the information of the valid input 
    // that can be part of the $errors array variable returned by the validateForm() static function
    // Note: The correct post data will be displayed within the HTML input object
    static function displayForm($valid_status)
    {
        ?>
        <div class="form">
            <form action="" method="post">
                <fieldset id="form">
                    <legend>Douglas Student Info Page</legend>
                    <div>
                        <label for="fullName">Full Name</label>
                        <input type="text" name="fullName" id="fullName" 
                        <?php self::checkFieldToPrint($valid_status, 'fullName') ?> placeholder="First and last name">
                    </div>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email"
                        <?php self::checkFieldToPrint($valid_status, 'email') ?> placeholder="someone@here.ca">
                    </div>
                    <div>
                        <label for="studentID">Student ID</label>
                        <input type="text" name="studentID" id="studentID"
                        <?php self::checkFieldToPrint($valid_status, 'studentID') ?> placeholder="XXXXXXX">
                    </div>
                    <div>
                        <label for="international">International Student?</label>
                        <span>
                            <input type="radio" name="international" id="internationalYes" 
                            <?php self::checkFieldToSelect($valid_status, 'international', "yes", 'radio')?> value="yes"> Yes
                            <input type="radio" name="international" id="internationalNo"
                            <?php self::checkFieldToSelect($valid_status, 'international', "no", 'radio')?> value="no"> No
                        </span>
                    </div>
                    <div>
                        <label for="program">Program</label>
                        <select name="program">
                            <option value="Select...">Please select one option</option>
                            <option value="Emerging Technology"
                            <?php self::checkFieldToSelect($valid_status, 'program', "Emerging Technology", 'dropbox')?>>Emerging Technology</option>
                            <option value="Data Analytic"
                            <?php self::checkFieldToSelect($valid_status, 'program', "Data Analytic", 'dropbox')?>>Data Analytic</option>
                            <option value="Mobile Computing"
                            <?php self::checkFieldToSelect($valid_status, 'program', "Mobile Computing", 'dropbox')?>>Mobile Computing</option>
                        </select>
                    </div>
                    <div>
                        <label for="years">Number of Years at Douglas</label>
                        <input type="text" name="years" id="years"
                        <?php self::checkFieldToPrint($valid_status, 'years') ?> placeholder="number of years less than 7">
                    </div>
                    <div>
                        <label for="courses">Number of Courses Taken</label>
                        <input type="text" name="courses" id="courses"
                        <?php self::checkFieldToPrint($valid_status, 'courses') ?>  placeholder="number of courses taken">
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Submit Information">
                        <input type="reset" name="reset" value="Clear Data">
                    </div>
                </fieldset>
            </form>
        </div>
        </section>
        <section class="sidebar">
        <?php
    }

    static function checkFieldToPrint($valid_status, $htmlField){
        if (!array_key_exists($htmlField, $valid_status) && (isset($_POST[$htmlField]))) {
            echo "value=\"" . $_POST[$htmlField] . "\"";
        }
    }

    static function checkFieldToSelect($valid_status, $htmlField, $message, $typeSelection){
        if(!array_key_exists($htmlField, $valid_status) && (isset($_POST[$htmlField])) && $_POST[$htmlField]==$message){
            if($typeSelection == 'radio'){
                echo 'checked';
            } else{
                echo 'selected="selected"';
            }
        }
    }

    // This static function read the $errors variable returned by the validateForm() static function
    // and display the error messages
    static function displayErrorMessage($valid_status)
    {
        ?>
            <div class="highlight">
                <p>Please fix the following errors:</p>
                <ul>
                    <?php
                    foreach ($valid_status as $key => $value) {
                        echo '<li>' . $value . '</li>';
                    }
                    ?>
                </ul>
            </div>
        <?php
    }

    // This static function display the thank you message
    static function displayThanks()
    {
        ?>
            <div class="highlight">
                <h3>
                    Thank your for your input.<br>

                </h3>

            </div>
        <?php
    }

    // This static function display the submitted data
    static function displayData()
    {
        ?>
            <div class="data">
                <b>Entered data is:</b>
                <table>

                    <tr>
                        <th>Name</th>
                        <td><?php echo $_POST['fullName'] ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $_POST['email'] ?></td>
                    </tr>
                    <tr>
                        <th>Student ID</th>
                        <td><?php echo $_POST['studentID'] ?></td>
                    </tr>
                    <tr>
                        <th>International Student Status</th>
                        <td><?php echo $_POST['international'] ?></td>
                    </tr>
                    <tr>
                        <th>Program</th>
                        <td><?php echo $_POST['program'] ?></td>
                    </tr>
                    <tr>
                        <th>Number of Years</th>
                        <td><?php echo $_POST['years'] ?></td>
                    </tr>
                    <tr>
                        <th>Number of Courses</th>
                        <td><?php echo $_POST['courses'] ?></td>
                    </tr>
                </table>
            </div>
        </section>
    <?php
    }
}
?>