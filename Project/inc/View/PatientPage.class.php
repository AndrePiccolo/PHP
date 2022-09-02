<?php

class PatientPage
{
    static $notifications = array();

    static function displayHeader()
    {
?>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="css/table.css">
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
                                    <li id="selectedIndex"><a href="Patient.php">Patient</a></li>
                                    <li><a href="AddPatient.php">New Patient</a></li>
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

                static function displayTable($objectList)
                {
                    ?>
                        <main>
                            <div>
                                <form action="" method="post">
                                    <div>
                                        <table>
                                            <caption>Patient Information</caption>
                                            <thead>
                                                <tr>
                                                    <th scope="col">First Name</th>
                                                    <th scope="col">Last Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($objectList as $object) {
                                                    echo "<tr>";
                                                    echo "<td>" . $object->getFirstName() . "</td>";
                                                    echo "<td>" . $object->getLastName() . "</td>";
                                                    echo "<td>" . $object->getEmail() . "</td>";
                                                    $link = $_SERVER['PHP_SELF'] . "?action=edit&id=" . $object->getIDPatient();
                                                    echo "<td><a href=\"" . $link . "\">Edit</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="SearchEngine">
                                        <div class="fieldStyle">
                                            <label for="lastName">Last Name:</label>
                                            <input type="text" name="lastName" id="lastName">

                                        </div>
                                        <div class="buttonStyle">
                                            <input type="hidden" name="operation" value="find">
                                            <input type="submit" name="submit" class="buttonConfig" value="Find">
                                            <input type="submit" name="submit" class="buttonConfig" value="All">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </main>
                    </div>
                </div>
            <?php
                }

                static function displayForm($patient)
                {
            ?>
                <main>
                    <div id="contentStyle">
                        <fieldset id="informationDetails">
                            <legend>Patient Information</legend>
                            <form action=<?= $_SERVER['PHP_SELF'] ?> method="post">
                                <?php self::checkErrorMessage("firstName"); ?>
                                <div class="fieldStyle">
                                    <label for="firstName">First Name:</label>
                                    <input type="text" name="firstName" id="firstName" value="<?php echo  $patient->getFirstName(); ?>" required>
                                </div>
                                <?php self::checkErrorMessage("lastName"); ?>
                                <div class="fieldStyle">
                                    <label for="lastName">Last Name:</label>
                                    <input type="text" name="lastName" id="lastName" value="<?php echo  $patient->getLastName(); ?>" required>
                                </div>
                                <?php self::checkErrorMessage("emailField"); ?>
                                <div class="fieldStyle">
                                    <label for="emailField">Email:</label>
                                    <input type="email" name="emailField" id="emailField" value="<?php echo  $patient->getEmail(); ?>" required>
                                </div>
                                <?php self::checkErrorMessage("phoneNumber"); ?>
                                <div class="fieldStyle">
                                    <label for="phoneNumber">Phone:</label>
                                    <input type="tel" name="phoneNumber" id="phoneNumber" value="<?php echo  $patient->getPhone(); ?>" required>
                                </div>
                                <?php self::checkErrorMessage("address"); ?>
                                <div class="fieldStyle">
                                    <label for="address">Address:</label>
                                    <input type="text" name="address" id="address" value="<?php echo  $patient->getAddress(); ?>" required>
                                </div>
                                <?php self::checkErrorMessage("city"); ?>
                                <div class="fieldStyle">
                                    <label for="city">City:</label>
                                    <input type="text" name="city" id="city" value="<?php echo  $patient->getCity(); ?>" required>
                                </div>
                                <?php self::checkErrorMessage("zipcode"); ?>
                                <div class="fieldStyle">
                                    <label for="zipcode">Zip Code:</label>
                                    <input type="text" name="zipcode" id="zipcode" value="<?php echo  $patient->getZipCode(); ?>" required>
                                </div>
                                <div class="buttonStyle">
                                    <input type="hidden" name="operation" value=<?php echo $patient->getIDPatient(); ?>>
                                    <input type="submit" name="submit" class="buttonConfig" value="Edit Patient">
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