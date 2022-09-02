<?php

class UserPage
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
                                    <li><a href="Patient.php">Patient</a></li>
                                    <li><a href="AddPatient.php">New Patient</a></li>
                                    <li><a href="Agenda.php">Agenda</a></li>
                                    <li><a href="AddAppointment.php">New Appointment</a></li>
                                    <li id="selectedIndex"><a href="User.php">User</a></li>
                                    <li><a href="AddUser.php">New User</a></li>
                                    <li><a href="Profit.php">Profit</a></li>
                                    <?php
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
                                            <caption>User Information</caption>
                                            <thead>
                                                <tr>
                                                    <th scope="col">First Name</th>
                                                    <th scope="col">Last Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Function</th>
                                                    <th scope="col">Permission Level</th>
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
                                                    echo "<td>" . $object->getDescription() . "</td>";
                                                    echo "<td>" . $object->getPermissionLevel() . "</td>";
                                                    $link = $_SERVER['PHP_SELF'] . "?action=edit&id=" . $object->getIDUser();
                                                    echo "<td><a href=\"" . $link . "\">Edit</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="SearchEngine">
                                        <div class="fieldStyle">
                                            <label for="description">Function:</label>
                                            <select name="description" id="description">
                                                <option value="All">All</option>
                                                <option value="Owner">Owner</option>
                                                <option value="Doctor">Doctor</option>
                                                <option value="Secretary">Secretary</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="buttonStyle">
                                            <input type="hidden" name="operation" value="find">
                                            <input type="submit" name="submit" class="buttonConfig" value="Find">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </main>
                    </div>
                </div>
            <?php
                }

                static function displayForm($user)
                {
            ?>
                <main>
                    <div id="contentStyle">
                        <fieldset id="informationDetails">
                            <legend>User Information</legend>
                            <form action=<?= $_SERVER['PHP_SELF'] ?> method="post">
                                <?php self::checkErrorMessage("firstName"); ?>
                                <div class="fieldStyle">
                                    <label for="firstName">First Name:</label>
                                    <input type="text" name="firstName" id="firstName" value=<?php echo $user->getFirstName(); ?> required>
                                </div>
                                <?php self::checkErrorMessage("lastName"); ?>
                                <div class="fieldStyle">
                                    <label for="lastName">Last Name:</label>
                                    <input type="text" name="lastName" id="lastName" value=<?php echo $user->getLastName(); ?> required>
                                </div>
                                <div class="fieldStyle">
                                    <label for="permissionLevel">Permission Level:</label>
                                    <select name="permissionLevel" id="permissionLevel" required>
                                        <option value="Admin" <?php echo self::checkValue($user->getPermissionLevel(), "Admin"); ?>>Administrator</option>
                                        <option value="Employee" <?php echo self::checkValue($user->getPermissionLevel(), "Employee"); ?>>Employee</option>
                                    </select>
                                </div>
                                <div class="fieldStyle">
                                    <label for="description">Description:</label>
                                    <select name="description" id="description" required>
                                        <option value="Owner" <?php echo self::checkValue($user->getDescription(), "Owner"); ?>>Owner</option>
                                        <option value="Doctor" <?php echo self::checkValue($user->getDescription(), "Doctor"); ?>>Doctor</option>
                                        <option value="Secretary" <?php echo self::checkValue($user->getDescription(), "Secretary"); ?>>Secretary</option>
                                        <option value="Other" <?php echo self::checkValue($user->getDescription(), "Other"); ?>>Other</option>
                                    </select>
                                </div>
                                <div class="buttonStyle">
                                    <input type="hidden" name="operation" value=<?php echo $user->getIDUser(); ?>>
                                    <input type="submit" name="submit" class="buttonConfig" value="Update User">
                                    <input type="reset" class="buttonConfig" value="Clean">
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </main>
            </div>
        <?php
                }

                static function checkValue($valueCheck, $valueDefault)
                {
                    if ($valueCheck == $valueDefault) {
                        return 'selected="selected"';
                    }
                    return "";
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