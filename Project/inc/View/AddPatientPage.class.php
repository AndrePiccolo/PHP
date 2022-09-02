<?php

class AddPatientPage
{
    static $notifications = array();

    static function displayHeader()
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="css/form.css">
            <link rel="icon" href="images/favicon.png" type="images/ico">
            <title>WalkinClinic</title>
        </head>

    <?php
    }

    static function displayContent()
    {
    ?>

        <body>
            <div class="container">
                <div>
                    <header>
                        <h1>Walk-in Clinic</h1>
                    </header>
                    <div id="flexbox">
                        <div id="navList">
                            <nav>
                                <ul>
                                    <li><a href="Menu.php">Home</a></li>
                                    <li><a href="Patient.php">Patient</a></li>
                                    <li id="selectedIndex"><a href="AddPatient.php">New Patient</a></li>
                                    <li><a href="Agenda.php">Agenda</a></li>
                                    <li><a href="AddAppointment.php">New Appointment</a></li>
                                    <?php
                                    //only admin can use features below
                                    if (SessionManager::isUserAdmin()) {
                                        echo "<li><a href=\"User.php\">User</a></li>";
                                        echo "<li><a href=\"AddUser.php\">New User</a></li>";
                                        echo "<li><a href=\"Profit.php\">Profit</a></li>";
                                    }
                                    $link = $_SERVER['PHP_SELF'] . "?action=logout";
                                    echo "<li><a href=\"" . $link . "\">Logout</a></li>";
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    <?php
                }

                static function displayForm()
                {
                    ?>
                        <main>
                            <div id="contentStyle">
                                <fieldset id="informationDetails">
                                    <legend>Patient Information</legend>
                                    <p class="information"><?php
                                                            if (isset($_POST['firstName']) && empty(self::$notifications)) {
                                                                echo "Patient Added Successfully";
                                                            } ?></p>
                                    <form action="" method="post">
                                        <?php self::checkErrorMessage("firstName"); ?>
                                        <div class="fieldStyle">
                                            <label for="firstName">First Name:</label>
                                            <input type="text" name="firstName" id="firstName" <?php
                                                                                                if (isset($_POST['firstName']) && !empty(self::$notifications)) {
                                                                                                    echo "value=\"" . $_POST['firstName'] . "\"";
                                                                                                }
                                                                                                ?> required>
                                        </div>
                                        <?php self::checkErrorMessage("lastName"); ?>
                                        <div class="fieldStyle">
                                            <label for="lastName">Last Name:</label>
                                            <input type="text" name="lastName" id="lastName" <?php
                                                                                                if (isset($_POST['lastName']) && !empty(self::$notifications)) {
                                                                                                    echo "value=\"" . $_POST['lastName'] . "\"";
                                                                                                }
                                                                                                ?> required>
                                        </div>
                                        <?php self::checkErrorMessage("emailField"); ?>
                                        <div class="fieldStyle">
                                            <label for="emailField">Email:</label>
                                            <input type="email" name="emailField" id="emailField" <?php
                                                                                                    if (isset($_POST['emailField']) && !empty(self::$notifications)) {
                                                                                                        echo "value=\"" . $_POST['emailField'] . "\"";
                                                                                                    }
                                                                                                    ?> required>
                                        </div>
                                        <?php self::checkErrorMessage("phoneNumber"); ?>
                                        <div class="fieldStyle">
                                            <label for="phoneNumber">Phone:</label>
                                            <input type="tel" name="phoneNumber" id="phoneNumber" <?php
                                                                                                    if (isset($_POST['phoneNumber']) && !empty(self::$notifications)) {
                                                                                                        echo "value=\"" . $_POST['phoneNumber'] . "\"";
                                                                                                    }
                                                                                                    ?> required>
                                        </div>
                                        <?php self::checkErrorMessage("address"); ?>
                                        <div class="fieldStyle">
                                            <label for="address">Address:</label>
                                            <input type="text" name="address" id="address" <?php
                                                                                            if (isset($_POST['address']) && !empty(self::$notifications)) {
                                                                                                echo "value=\"" . $_POST['address'] . "\"";
                                                                                            }
                                                                                            ?> required>
                                        </div>
                                        <?php self::checkErrorMessage("city"); ?>
                                        <div class="fieldStyle">
                                            <label for="city">City:</label>
                                            <input type="text" name="city" id="city" <?php
                                                                                        if (isset($_POST['city']) && !empty(self::$notifications)) {
                                                                                            echo "value=\"" . $_POST['city'] . "\"";
                                                                                        }
                                                                                        ?> required>
                                        </div>
                                        <?php self::checkErrorMessage("zipcode"); ?>
                                        <div class="fieldStyle">
                                            <label for="zipcode">Zip Code:</label>
                                            <input type="text" name="zipcode" id="zipcode" <?php
                                                                                            if (isset($_POST['zipcode']) && !empty(self::$notifications)) {
                                                                                                echo "value=\"" . $_POST['zipcode'] . "\"";
                                                                                            }
                                                                                            ?> required>
                                        </div>
                                        <div class="buttonStyle">
                                            <input type="submit" name="submit" class="buttonConfig" value="Add">
                                            <input type="reset" class="buttonConfig" value="Clean">
                                        </div>
                                    </form>
                                </fieldset>
                            </div>
                        </main>
                    </div>
                <?php
                }

                static function displayFooter()
                {
                ?>
                    <footer>
                        Copyright &copy;2022 Andre Piccolo 300347025
                    </footer>
                </div>
            </div>
        </body>

        </html>
<?php
                }

                static function checkErrorMessage($field)
                {
                    if (array_key_exists($field, self::$notifications)) {
                        echo "<p class=\"error\">";
                        echo self::$notifications[$field];
                        echo "</p>";
                    }
                }
            }
            ?>