<?php

/*
mysql> desc Student;
+---------------+-------------+------+-----+---------+-------+
| Field         | Type        | Null | Key | Default | Extra |
+---------------+-------------+------+-----+---------+-------+
| StudentID     | varchar(50) | NO   | PRI | NULL    |       |
| FullName      | varchar(50) | YES  |     | NULL    |       |
| Email         | varchar(50) | YES  |     | NULL    |       |
| NumberOfTerms | int(11)     | YES  |     | NULL    |       |
| DateJoin      | date        | YES  |     | NULL    |       |
| DeptID        | int(11)     | YES  | MUL | NULL    |       |
+---------------+-------------+------+-----+---------+-------+
*/

class StudentDAO
{

    // Create a class member to store the PDO wrapper object
    private static $db;

    // create the init function to start the PDO wrapper
    static function init()
    {
        self::$db = new PDOWrapper('Student');
    }

    // function to create user
    static function createStudent(Student $newStudent)
    {
        // make sure the strings being stored in the database are cleaned 
        // and trimmed 
        // OBS: All this process is done in validate class

        // query
        $query = "INSERT INTO student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID)
        VALUES (:studentId, :fullname, :email, :numterm, :datejoin, :deptid)";

        // bind
        try {
            self::$db->query($query);
            self::$db->bind(":studentId", $newStudent->getStudentID());
            self::$db->bind(":fullname", $newStudent->getFullName());
            self::$db->bind(":email", $newStudent->getEmail());
            self::$db->bind(":numterm", $newStudent->getNumberOfTerms());
            self::$db->bind(":datejoin", $newStudent->getDateJoin());
            self::$db->bind(":deptid", $newStudent->getDeptID());

            // execute
            self::$db->execute();
            if (self::$db->rowCount() != 1) {
                throw new Exception("Failed to create student register $newStudent->getFullName()");
            }
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return 0;
        }
        // you may return the rowCount
        return self::$db->rowCount();
    }

    // get user detail
    static function getStudent(string $studentID)
    {

        // you know the drill
        // return the single result query
        $query = "SELECT * FROM student WHERE student.StudentID = :studentID";

        try {
            self::$db->query($query);
            self::$db->bind(":studentID", $studentID);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSingleResult();
    }

    // update the current user profile
    // certainly you don't have the form to facilitate this
    // so, it is not needed in our app, but hey.. more practice is better!
    static function deleteStudent(string $studentID)
    {

        // you know the drill
        $query = "DELETE FROM student WHERE StudentID = :studentID";

        try {
            self::$db->query($query);
            self::$db->bind(":studentID", $studentID);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        // You may want to return the rowCount
        return self::$db->rowCount();
    }

    // get multiple users detail
    // It is not needed in our app, but hey.. more practice is better!
    static function getStudentList(string $deptID = null)
    {

        // you know the drill
        // return the multiple result query    
        $query = "SELECT  student.*, department.LongName FROM student, department 
            WHERE student.DeptID = department.DeptID";
        if ($deptID != null) {
            $query .= " AND student.DeptID = :deptID";
        }

        try {
            self::$db->query($query);
            if ($deptID != null) {
                self::$db->bind(":deptID", $deptID);
            }
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSetResult();
    }
}
