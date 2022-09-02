<?php

require_once('inc/config.inc.php');

//Entity
require_once('inc/Entity/User.class.php');

//db connector
require_once('inc/Utility/PDOWrapper.class.php');

//add db Model
require_once('inc/Utility/Model/UserDAO.class.php');

// add validator
require_once('inc/Utility/Validator/ValidateUser.class.php');

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

    if (!SessionManager::isUserAdmin()) {
        SessionManager::logout();
    }

    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        SessionManager::logout();
    } else {
        if (isset($_POST['submit'])) {

            //validate user input
            if (ValidateUser::validate("add")) {
                // Initialize DAO
                UserDAO::initialize();

                // validate if email already in use
                if (ValidateUser::checkValidNewUser($_POST['emailField'])) {
                    // Instatiate patient obj
                    $user = new User();

                    // Get information from form
                    $user->setFirstName($_POST['firstName']);
                    $user->setLastName($_POST['lastName']);
                    $user->setEmail($_POST['emailField']);
                    $user->setPassword($_POST['password']);
                    $user->setPermissionLevel($_POST['permissionLevel']);
                    $user->setDescription($_POST['description']);

                    // Save information in db
                    UserDAO::createUser($user);
                } else {
                    AddUserPage::$notifications = ValidateUser::$validationNotify;
                }
            } else {
                AddUserPage::$notifications = ValidateUser::$validationNotify;
            }
        }

        AddUserPage::displayHeader();
        AddUserPage::displayContent();
        AddUserPage::displayForm();
        AddUserPage::displayFooter();
    }
}
?>