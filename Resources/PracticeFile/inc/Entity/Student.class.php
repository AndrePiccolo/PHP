<?php

/*
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

class Student
{
    private $StudentID;
    private $FullName;
    private $Email;
    private $NumberOfTerms;
    private $DateJoin;
    private $DeptID;

    //getters 
    function getStudentID()
    {
        return $this->StudentID;
    }

    function getFullName()
    {
        return $this->FullName;
    }

    function getEmail()
    {
        return $this->Email;
    }

    function getNumberOfTerms()
    {
        return $this->NumberOfTerms;
    }

    function getDateJoin()
    {
        return $this->DateJoin;
    }

    function getDeptID()
    {
        return $this->DeptID;
    }

    //setters
    function setStudentID($StudentID)
    {
        $this->StudentID = $StudentID;
    }

    function setFullName($FullName)
    {
        $this->FullName = $FullName;
    }

    function setEmail($Email)
    {
        $this->Email = $Email;
    }

    function setNumberOfTerms($NumberOfTerms)
    {
        $this->NumberOfTerms = $NumberOfTerms;
    }

    function setDateJoin($DateJoin)
    {
        $this->DateJoin = $DateJoin;
    }

    function setDeptID($DeptID)
    {
        $this->DeptID = $DeptID;
    }
}
