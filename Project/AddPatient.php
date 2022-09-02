<?php

require_once('inc/config.inc.php');

//Entity
require_once('inc/Entity/Patient.class.php');
require_once('inc/Entity/User.class.php');

//db connector
require_once('inc/Utility/PDOWrapper.class.php');

//add db Model
require_once('inc/Utility/Model/PatientDAO.class.php');
require_once('inc/Utility/Model/UserDAO.class.php');

// add validator
require_once('inc/Utility/Validator/ValidatePatient.class.php');

//add view
require_once('inc/View/HomePage.class.php');
require_once('inc/View/AddPatientPage.class.php');
require_once('inc/View/AddAppointmentPage.class.php');
require_once('inc/View/PatientPage.class.php');
require_once('inc/View/UserPage.class.php');
require_once('inc/View/AgendaPage.class.php');
require_once('inc/View/ProfitPage.class.php');
require_once('inc/View/AddUserPage.class.php');

//add session handler
require_once('inc/Utility/Session/SessionManager.class.php');

if (SessionManager::verifySession()) {

    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        SessionManager::logout();
    } else {
        if (isset($_POST['submit'])) {
            // validate inputs
            if (ValidatePatient::validate()) {
                // Initialize DAO
                PatientDAO::initialize();

                // validate if email already in use
                if (ValidatePatient::checkValidNewUser($_POST['emailField'])) {
                    // Instatiate patient obj
                    $patient = new Patient();

                    // Get information from form
                    $patient->setFirstName($_POST['firstName']);
                    $patient->setLastName($_POST['lastName']);
                    $patient->setEmail($_POST['emailField']);
                    $patient->setPhone($_POST['phoneNumber']);
                    $patient->setAddress($_POST['address']);
                    $patient->setCity($_POST['city']);
                    $patient->setZipCode($_POST['zipcode']);

                    // Save information in db
                    PatientDAO::createPatient($patient);
                } else {
                    AddPatientPage::$notifications = ValidatePatient::$validationNotify;
                }
            } else {
                AddPatientPage::$notifications = ValidatePatient::$validationNotify;
            }
        }

        AddPatientPage::displayHeader();
        AddPatientPage::displayContent();
        AddPatientPage::displayForm();
        AddPatientPage::displayFooter();
    }
}
?>