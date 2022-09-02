<?php

class AgendaPage
{
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
                                    <li id="selectedIndex"><a href="Agenda.php">Agenda</a></li>
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

                static function displayTable(array $objectList)
                {
                    ?>
                        <main>
                            <div>
                                <form action="" method="post">
                                    <div>
                                        <table>
                                            <caption>Agenda</caption>
                                            <thead>
                                                <tr>
                                                    <th scope="col">Patient</th>
                                                    <th scope="col">Doctor</th>
                                                    <th scope="col">Exam</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($objectList as $object) {
                                                    echo "<tr>";
                                                    echo "<td>" . $object->userfirst . " " . $object->userlast . "</td>";
                                                    echo "<td>" . $object->doctorfirst . " " . $object->doctorlast . "</td>";
                                                    echo "<td>" . $object->ServiceDesc . "</td>";
                                                    echo "<td>" . $object->getDate() . "</td>";
                                                    echo "<td>" . $object->getStatus() . "</td>";
                                                    $linkConfirm = $_SERVER['PHP_SELF'] . "?action=Confirmed&id=" . $object->getIDExam();
                                                    $linkCancel = $_SERVER['PHP_SELF'] . "?action=Cancelled&id=" . $object->getIDExam();
                                                    echo "<td><a href=\"" . $linkConfirm . "\">Confirm</td>";
                                                    echo "<td><a href=\"" . $linkCancel . "\">Cancel</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="SearchEngine">
                                        <div class="fieldStyle">
                                            <label for="date">Date:</label>
                                            <input type="date" name="date" id="date">
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