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

DepartmentDAO::init();
StudentDAO::init();
UserDAO::init();

$requestData = json_decode(file_get_contents('php://input'));

// switch action based on the request method
switch ($_SERVER['REQUEST_METHOD']) {
    case "GET": // read / select
        if (isset($requestData->id)) {
            //get 1 course record
            $student = StudentDAO::getStudent($requestData->id);
            $dept = DepartmentDAO::getDepartment($student->getDeptID());

            //send the course as json obj
            header("Content-Type: application/json");
            echo json_encode(jsonSerialize($student, $dept));
            break;
        }
        break;
}

//Serialize the object to JSON.
function jsonSerialize($student, $dept)
{
    // we will use a stdClass 
    $objInner = new stdClass();
    $objInner->DeptID = $dept->getDeptID();
    $objInner->DeptShortName = $dept->getShortName();
    $objInner->DeptLongName = $dept->getLongName();

    $obj = new stdClass();
    $obj->Studentid = $student->getStudentID();
    $obj->StudentFullName = $student->getFullName();
    $obj->StudentEmail = $student->getEmail();
    $obj->StudentDeptId = $student->getDeptID();
    $obj->StudentDateJoin = $student->getDateJoin();
    $obj->StudentNumberTerms = $student->getNumberOfTerms();
    $obj->department = $objInner;

    return $obj;
}
