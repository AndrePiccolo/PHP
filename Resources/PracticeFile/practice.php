<?php

require_once('inc/config.inc.php');

require_once('inc/Entity/Department.class.php');
require_once('inc/Entity/Page.class.php');
require_once('inc/Entity/Student.class.php');
require_once('inc/Entity/User.class.php');

require_once('inc/Utility/DepartmentDAO.class.php');
require_once('inc/Utility/LoginManager.class.php');
require_once('inc/Utility/PDOWrapper.class.php');
require_once('inc/Utility/StudentDAO.class.php');
require_once('inc/Utility/UserDAO.class.php');
require_once('inc/Utility/Validate.class.php');

session_start();

DepartmentDAO::init();
StudentDAO::init();
UserDAO::init();

if (isset($_POST['login']) && !empty($_POST['username'])) {
    $authUser = UserDAO::getUser($_POST['username']);

    // check if the user exist or not
    //check if the password is verified
    if ($authUser && $authUser->verifyPassword($_POST['password'])) {
        // register the session variable
        $_SESSION['loggedin'] = $authUser->getUserName();
    }
}

if (isset($_POST['logout'])) {
    //unset our register session
    unset($_SESSION['loggedin']);
}

if (isset($_POST['filter'])) {
    $departmentID = $_POST['deptID'];
}

if (isset($_POST['action'])) {
    if (Validate::validateInputs()) {
        $newStudent = new Student();
        $newStudent->setStudentID($_POST['id']);
        $newStudent->setFullName($_POST['fullName']);
        $newStudent->setEmail($_POST['email']);
        $newStudent->setDateJoin($_POST['doj']);
        $newStudent->setNumberOfTerms($_POST['terms']);
        $newStudent->setDeptID($_POST['deptID']);

        StudentDAO::createStudent($newStudent);
    }
}

if (LoginManager::verifySession()) {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "delete") {
            StudentDAO::deleteStudent($_GET['id']);
        }
    }
}

Page::header();
if (LoginManager::verifySession()) {
    Page::displayLogout();
} else {
    Page::displayLogin();
}
Page::displayFilterForm(DepartmentDAO::getDepartments());
if (!isset($_POST['filter']) || $departmentID == "") {
    Page::displayStudentList(StudentDAO::getStudentList());
} else {
    Page::displayStudentList(StudentDAO::getStudentList($departmentID));
}

if (LoginManager::verifySession()) {
    Page::displayAddStudentForm(DepartmentDAO::getDepartments());
}

if (LoginManager::verifySession()) {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "detail") {
            $student = new Student();
            $department = new Department();
            $student = StudentDAO::getStudent($_GET['id']);
            $department = DepartmentDAO::getDepartment($student->getDeptID());
            Page::displayStudentDetail($student, $department);
        }
    }
}

Page::footer();
