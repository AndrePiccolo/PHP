<?php

// Please rename me according to the naming convention

// require the config
include_once('inc/config.inc.php');

// require all the entities
include_once('inc/Entity/Page.class.php');
include_once('inc/Entity/Reservation.class.php');
include_once('inc/Entity/RoomsType.class.php');

// require all the utilities: PDO and DAO(s)
include_once('inc/Utility/PDOService.class.php');
include_once('inc/Utility/ReservationDAO.class.php');
include_once('inc/Utility/RoomsTypeDAO.class.php');
include_once('inc/Utility/ValidatePage.class.php');

//Initialize the DAO(s)
ReservationDAO::initialize();
RoomsTypeDAO::initialize();

$displayError = false;

//If there was post data 
if (!empty($_POST)) {
    if (isset($_POST['action'])) {

        // Validate input
        $errorArray = ValidatePage::validateInput();
        if (!empty($errorArray)) {
            $displayError = true;
        } else {
            // if it is an edit (remember the hidden input)
            if ($_POST['action'] == "edit") {
                //Assemble the Reservation record to update        
                $ureservation = new Reservation();
                $ureservation->setReservationID($_POST['reservationID']);
                $ureservation->setRooms($_POST['rooms']);
                $ureservation->setDays($_POST['days']);
                $ureservation->setRoomsTypeID($_POST['roomsTypeID']);
                //Send the Reservation record to the DAO to be updated
                ReservationDAO::updateReservation($ureservation);
            } else { // it is not an edit... it means create a new record
                //Assemble the Reservation record to Insert/Create
                $nreservation = new Reservation();
                $nreservation->setReservationID($_POST['reservationID']);
                $nreservation->setRooms($_POST['rooms']);
                $nreservation->setDays($_POST['days']);
                $nreservation->setRoomsTypeID($_POST['roomsTypeID']);
                //Send the Reservation record to the DAO for creation
                ReservationDAO::createReservation($nreservation);
            }
        }
    }
}

//If there was a delete that came in via GET
if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    //Use the DAO to delete the corresponding record
    ReservationDAO::deleteReservation($_GET['id']);
}

// Display the header (remember to set the title/heading)
// Call the HTML header
Page::header();

if ($displayError) {
    Page::displayErrorMessage($errorArray);
}
// List all Reservation.
// Note: You need to use the results from the corresponding DAO that gives you 
// the Reservation record list
Page::listReservations(ReservationDAO::getReservationList());

//If there was a edit that came in via GET (URL query string) 
// Why we implement GET handler after POST?
// What is the different between the edit GET handler below with the edit form POST handler above?
if (isset($_GET["action"]) && $_GET["action"] == "edit") {
    // Use the DAO to pull that specific Reservation record
    // Hint: notice the url link for Delete.... you should have something similar with Edit
    // And you can access it through $_GET
    $updateReservation = ReservationDAO::getReservation($_GET['id']);

    // Render the  Edit Section form with the corresponding Reservation record to edit. 
    // Remember to use the correct DAO to get the rooms type list
    Page::editReservationForm($updateReservation, RoomsTypeDAO::getRoomsType());
} else {
    // Otherwise, it is an add new Reservation record form
    Page::addReservationForm(RoomsTypeDAO::getRoomsType());
}
// Finally, call the footer function
Page::footer();
