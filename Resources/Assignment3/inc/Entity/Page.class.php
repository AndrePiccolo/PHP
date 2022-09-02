<?php

# Make sure to :
# 1. Edit the studentName and studentID
# 2. Edit the page's meta author and title
# 3. Edit the page's main heading to use the static member
# 4. Complete the listReservations(), addReservationForm() and editReservationForm()


class Page
{

    public static $studentName = "Andre Piccolo";
    public static $studentID = "300347025";

    static function header()
    { ?>
        <!-- Start the page 'header' -->
        <!DOCTYPE html>
        <html>

        <head>
            <title></title>
            <meta charset="utf-8">
            <meta name="author" content="">
            <title></title>
            <link href="css/stylesB.css" rel="stylesheet">
        </head>

        <body>
            <header>
                <h1>Assignment 03: PDO CRUD with DAO -- <?php echo self::$studentName . " (" . self::$studentID . ")"; ?></h1>
            </header>
            <article>
            <?php }

        static function footer()
        { ?>
                <!-- Start the page's footer -->
            </article>
        </body>

        </html>

    <?php }

        // This function lists all reservation records
        // The $reservations is the array of Reservation object obtained from the ReservationDAO from the controller
        static function listReservations(array $reservations)
        {
    ?>
        <!-- Start the page's show data form -->
        <section class="main">
            <h2>Current Data</h2>
            <table id="list">
                <thead>
                    <tr>
                        <th>Reservation ID</th>
                        <!-- Complete the remaining header -->
                        <th>Rooms</th>
                        <th>Days</th>
                        <th>Room Type</th>
                        <th>Cost</th>
                        <th>Edit</th>
                        <th>Delete</th>
                </thead>
                <?php

                //List all the sections
                $i = 0;
                foreach ($reservations as $reservation) {
                    // make sure to use the correct tr class
                    // echo "<tr class=
                    if ($i % 2 == 1) {
                        echo "<tr class=\"oddRow\">";
                    } else {
                        echo "<tr class=\"evenRow\">";
                    }

                    // ... Write your code ...

                    // RoomsTypeDetail is not a member of Reservation object. However, if you 
                    // perform the join correctly when you implement getReservationList, you 
                    // should be able to access it here if you do it correctly

                    // Make sure to calculate the cost. Remember that RoomsCost is not part of the 
                    // Reservation object. Make sure to perform join correctly when you implement 
                    // getReservationList. You should be able to access it here if you do it correctly.
                    echo "<td>" . $reservation->getReservationID() . "</td>";
                    echo "<td>" . $reservation->getRooms() . "</td>";
                    echo "<td>" . $reservation->getDays() . "</td>";
                    echo "<td>" . $reservation->RoomsDetail . "</td>";
                    echo "<td> $" . number_format(($reservation->RoomsCost * $reservation->getRooms() * $reservation->getDays()), 2) . "</td>";


                    // example of how you make the delete link!
                    $link = $_SERVER['PHP_SELF'] . '?action=edit&id=' . $reservation->getReservationID();
                    echo "<td><a href=\"" . $link . "\">Edit</td>";

                    $link = $_SERVER['PHP_SELF'] . '?action=delete&id=' . $reservation->getReservationID();
                    echo "<td><a href=\"" . $link . "\">Delete</td>";
                    echo "</tr>";
                    $i++;
                }

                echo '</table>
            </section>';
            }

            // this function displays the add new reservation record
            // $rooms is the array of rooms objects obtained from the RoomsTypeDAO
            // $rooms is required to display the rooms option
            static function addReservationForm(array $roomsType)
            { ?>
                <!-- Start the page's add entry form -->
                <section class="form1">
                    <h3>Add a New Reservation</h3>
                    <!-- make sure to edit the form action -->
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                        <table>
                            <tr>
                                <td>Reservation ID</td>
                                <td><input type="text" name="reservationID" id="reservationID" placeholder="R{X|Y}XXX"></td>
                            </tr>
                            <tr>
                                <td>Rooms</td>
                                <td><input type="text" name="rooms" id="rooms" placeholder="1 to 3"></td>
                            </tr>
                            <tr>
                                <td>Days</td>
                                <td><input type="text" name="days" id="days" placeholder="1 to 5"></td>
                            </tr>
                            <tr>
                                <td>RoomsType</td>
                                <td>
                                    <select name="roomsTypeID">
                                        <?php
                                        // use loop to list all RoomsTypeDetail here
                                        // from the database to display the html's option elements
                                        foreach ($roomsType as $roomType) {
                                            echo "<option value=\"" . $roomType->getID() . "\">" .
                                                $roomType->getRoomsDetail() . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <!-- Use input type hidden to let us know that this action is to create record -->
                        <input type="hidden" name="action" value="create">
                        <input type="submit" value="Add Reservation">
                    </form>
                </section>

            <?php }

            // This function is to show the edit reservation record form
            // The edit form should be displayed only when the Edit link is clicked
            // Whether you will display add form or edit form should be controlled in the main file.

            // The $reservationToEdit is a singleResult record of reservation whose link was clicked
            // The $rooms contains the array of rooms objects from the RoomsTypeDAO
            static function editReservationForm(Reservation $reservationToEdit, array $roomsType)
            {
                // Make sure the form's method is pointing to $_SERVER["PHP_SELF"]
                // and it is using post method
            ?>
                <!-- Start the page's edit entry form -->
                <section class="form1">
                    <h3>Edit Reservation - <?php echo $reservationToEdit->getReservationID();
                                            ?></h3>
                    <form action="<?= $_SERVER['PHP_SELF'];
                                    ?>" method="post">
                        <table>
                            <tr>
                                <td>Reservation ID</td>
                                <td><?php echo $reservationToEdit->getReservationID();
                                    ?></td>
                            </tr>
                            <!-- 
                        You know the drill from the add new reservation form 
                        Make sure to add all input entries corresponding to the selected 
                        reservation id. Don't forget to put/display the values...
                    -->
                            <tr>
                                <td>Rooms</td>
                                <td><input type="text" name="rooms" id="rooms" placeholder="1 to 3" value=<?= $reservationToEdit->getRooms(); ?>></td>
                            </tr>
                            <tr>
                                <td>Days</td>
                                <td><input type="text" name="days" id="days" placeholder="1 to 5" value=<?= $reservationToEdit->getDays(); ?>></td>
                            </tr>
                            <tr>
                                <td>RoomsType</td>
                                <td>
                                    <select name="roomsTypeID">
                                        <?php
                                        // use loop to list all rooms type names 
                                        // from the database to build the html's option element
                                        // make sure the corresponding rooms type for this reservation is selected
                                        foreach ($roomsType as $roomType) {
                                            if ($roomType->getID() == $reservationToEdit->getRoomsTypeID()) {
                                                echo "<option value=\"" . $roomType->getID() . "\" selected>" .
                                                    $roomType->getRoomsDetail() . "</option>";
                                            } else {
                                                echo "<option value=\"" . $roomType->getID() . "\">" .
                                                    $roomType->getRoomsDetail() . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <!-- We need another hidden input for reservation id here. Why? -->
                        <input type="hidden" name="reservationID" value="<?php echo $reservationToEdit->getReservationID();
                                                                            ?>">

                        <!-- Use input type hidden to let us know that this action is to edit -->
                        <input type="hidden" name="action" value="edit">
                        <input type="submit" value="Edit Reservation">
                    </form>
                </section>

        <?php }

            // Added method to validate inputs and just show in the screen validation messages
            static function displayErrorMessage($valid_status)
            { {
                    echo "<div class=\"error\" style=\"display: block;\">
                        <h2>Invalid inputs</h2>
                        <ul>";
                    foreach ($valid_status as $key => $value) {
                        echo "<li>" . $value . "</li>";
                    }
                    echo "</ul>
                        </div>";
                }
            }
        }
