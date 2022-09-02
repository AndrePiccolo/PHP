<?php

require_once('inc/config.inc.php');

//Entity
require_once('inc/Entity/User.class.php');

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

if (SessionManager::verifySession()) {

    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        SessionManager::logout();
    } else {
        HomePage::displayHeader();
        HomePage::displayContent();
        HomePage::displayFooter();
    }
}
?>