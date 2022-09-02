<?php

require_once('inc/config.inc.php');

//Entity
require_once('inc/Entity/Patient.class.php');
require_once('inc/Entity/User.class.php');

// add validator
require_once('inc/Utility/Validator/ValidatePatient.class.php');

//db connector
require_once('inc/Utility/PDOWrapper.class.php');

//add db Model
require_once('inc/Utility/Model/PatientDAO.class.php');
require_once('inc/Utility/Model/UserDAO.class.php');

//add view
require_once('inc/View/HomePage.class.php');
require_once('inc/View/AddPatientPage.class.php');
require_once('inc/View/AddAppointmentPage.class.php');
require_once('inc/View/PatientPage.class.php');
require_once('inc/View/UserPage.class.php');
require_once('inc/View/AgendaPage.class.php');
require_once('inc/View/ProfitPage.class.php');
require_once('inc/View/AddUserPage.class.php');

//controller
require_once('inc/Utility/Session/SessionManager.class.php');

$invalidFieldsUpdate  = false;

if (SessionManager::verifySession()) {

    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        SessionManager::logout();
    } else {
        PatientDAO::initialize();

        if (isset($_POST['submit'])) {
            if ($_POST['submit'] == "Find") {
                $patient = PatientDAO::getPatientLastName($_POST['lastName']);
            } else if ($_POST['submit'] == "All") {
                $patient = PatientDAO::getPatients();
            } else {
                // Instatiate patient obj
                $patient = new Patient();

                //check if fields are valid
                if (ValidatePatient::validate()) {

                    PatientDAO::initialize();

                    if (ValidatePatient::checkValidNewUser($_POST['emailField'])) {
                        // Get information from form
                        $patient->setIDPatient($_POST['operation']);
                        $patient->setFirstName($_POST['firstName']);
                        $patient->setLastName($_POST['lastName']);
                        $patient->setEmail($_POST['emailField']);
                        $patient->setPhone($_POST['phoneNumber']);
                        $patient->setAddress($_POST['address']);
                        $patient->setCity($_POST['city']);
                        $patient->setZipCode($_POST['zipcode']);

                        // Save information in db
                        PatientDAO::updatePatient($patient);
                        $patient = PatientDAO::getPatients();
                    } else {
                        PatientPage::$notifications = ValidatePatient::$validationNotify;
                        $patient = PatientDAO::getPatient($_POST['operation']);
                        $invalidFieldsUpdate = true;
                    }
                } else {
                    PatientPage::$notifications = ValidatePatient::$validationNotify;
                    $patient = PatientDAO::getPatient($_POST['operation']);
                    $invalidFieldsUpdate = true;
                }
            }
        } else if (isset($_GET['action'])) {
            $patient = PatientDAO::getPatient($_GET['id']);
        } else {
            // All button pressed
            $patient = PatientDAO::getPatients();
        }

        PatientPage::displayHeader();
        PatientPage::displayContent();
        if (isset($_GET['action']) || $invalidFieldsUpdate) {
            PatientPage::displayForm($patient);
        } else {
            PatientPage::displayTable($patient);
        }
        PatientPage::displayFooter();
    }
}
?>