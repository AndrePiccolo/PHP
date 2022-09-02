<?php

class AddAppointmentPage
{

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
                                    <li><a href="AddPatient.php">New Patient</a></li>
                                    <li><a href="Agenda.php">Agenda</a></li>
                                    <li id="selectedIndex"><a href="AddAppointment.php">New Appointment</a></li>
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

                static function displayForm($patientNames, $doctorNames, $servicesType)
                {
                    ?>
                        <main>
                            <div id="contentStyle">
                                <fieldset id="informationDetails">
                                    <legend>Appointment Information</legend>
                                    <form action="" method="post">
                                        <div class="fieldStyle">
                                            <label for="patientName">Patient Name:</label>
                                            <select name="patientName" id="patientName" required>
                                                <?php
                                                foreach ($patientNames as $patient) {
                                                    echo "<option value=\"" . $patient->getIDPatient() . "\">" . $patient->getFirstName() . " " . $patient->getLastName() . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="fieldStyle">
                                            <label for="doctorName">Doctor Name:</label>
                                            <select name="doctorName" id="doctorName" required>
                                                <?php
                                                foreach ($doctorNames as $doctor) {
                                                    echo "<option value=\"" . $doctor->getIDUser() . "\">" . $doctor->getFirstName() . " " . $doctor->getLastName() . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="fieldStyle">
                                            <label for="exam">Exam:</label>
                                            <select name="exam" id="exam" required>
                                                <?php
                                                foreach ($servicesType as $serviceType) {
                                                    echo "<option value=\"" . $serviceType->getIDService() . "\">" . $serviceType->getServiceDesc() . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="fieldStyle">
                                            <label for="date">Date:</label>
                                            <input type="date" name="date" id="date" required>
                                        </div>
                                        <div class="buttonStyle">
                                            <input type="submit" name="submit" class="buttonConfig" value="Add">
                                            <input type="reset" class="buttonConfig" value="Cancel">
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
            }
?>