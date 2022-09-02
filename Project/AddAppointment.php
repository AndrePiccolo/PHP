<?php

require_once('inc/config.inc.php');

//Entity
require_once('inc/Entity/Exam.class.php');
require_once('inc/Entity/Patient.class.php');
require_once('inc/Entity/ServiceType.class.php');
require_once('inc/Entity/User.class.php');

// db connector
require_once('inc/Utility/PDOWrapper.class.php');

//add db Model
require_once('inc/Utility/Model/PatientDAO.class.php');
require_once('inc/Utility/Model/UserDAO.class.php');
require_once('inc/Utility/Model/ServiceTypeDAO.class.php');
require_once('inc/Utility/Model/ExamDAO.class.php');

//add session handler
require_once('inc/Utility/Session/SessionManager.class.php');

//add view
require_once('inc/View/HomePage.class.php');
require_once('inc/View/AddPatientPage.class.php');
require_once('inc/View/AddAppointmentPage.class.php');
require_once('inc/View/PatientPage.class.php');
require_once('inc/View/UserPage.class.php');
require_once('inc/View/AgendaPage.class.php');
require_once('inc/View/ProfitPage.class.php');
require_once('inc/View/AddUserPage.class.php');

if (SessionManager::verifySession()) {

    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        SessionManager::logout();
    } else {
        UserDAO::initialize();
        PatientDAO::initialize();
        ServiceTypeDAO::initialize();

        if (isset($_POST['submit'])) {

            ExamDAO::initialize();

            // Instatiate patient obj
            $exam = new Exam();

            // Get information from form
            $exam->setIDPatient($_POST['patientName']);
            $exam->setIDUser($_POST['doctorName']);
            $exam->setIDService($_POST['exam']);
            $exam->setDate($_POST['date']);
            $exam->setStatus("Open");

            // Save information in db
            ExamDAO::createExam($exam);
        }

        AddAppointmentPage::displayHeader();
        AddAppointmentPage::displayContent();
        AddAppointmentPage::displayForm(PatientDAO::getPatients(), UserDAO::getDoctors(), ServiceTypeDAO::getServicesType());
        AddAppointmentPage::displayFooter();
    }
}
?>