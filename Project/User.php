<?php

require_once('inc/config.inc.php');

//Entity
require_once('inc/Entity/User.class.php');

// add validator
require_once('inc/Utility/Validator/ValidateUser.class.php');

//db connector
require_once('inc/Utility/PDOWrapper.class.php');

//add db Model
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

//add session handler
require_once('inc/Utility/Session/SessionManager.class.php');

$invalidFieldsUpdate = false;

if (SessionManager::verifySession()) {

    if (!SessionManager::isUserAdmin()) {
        SessionManager::logout();
    }

    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        SessionManager::logout();
    } else {
        UserDAO::initialize();

        if (isset($_POST['submit'])) {
            if ($_POST['submit'] == "Find") {
                if ($_POST['description'] == "All") {
                    $users = UserDAO::getUsers();
                } else {
                    $users = UserDAO::getUserByDescription($_POST['description']);
                }
            } else {
                // Instatiate patient obj
                $user = new User();

                //check if fields are valid
                if (ValidateUser::validate("update")) {
                    // Get information from form
                    $user->setIDUser($_POST['operation']);
                    $user->setFirstName($_POST['firstName']);
                    $user->setLastName($_POST['lastName']);
                    $user->setPermissionLevel($_POST['permissionLevel']);
                    $user->setDescription($_POST['description']);

                    // Save information in db
                    UserDAO::updateUser($user);
                    $users = UserDAO::getUsers();
                } else {
                    UserPage::$notifications = ValidateUser::$validationNotify;
                    $users = UserDAO::getUser($_POST['operation']);
                    $invalidFieldsUpdate = true;
                }
            }
        } else if (isset($_GET['action'])) {
            $users = UserDAO::getUser($_GET['id']);
        } else {
            $users = UserDAO::getUsers();
        }

        UserPage::displayHeader();
        UserPage::displayContent();
        if (isset($_GET['action'])  || $invalidFieldsUpdate) {
            UserPage::displayForm($users);
        } else {
            UserPage::displayTable($users);
        }
        UserPage::displayFooter();
    }
}
?>