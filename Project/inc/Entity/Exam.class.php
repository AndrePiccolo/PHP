<?php

/**
 * +---------------+------------------+------+-----+---------+----------------+
 * | Field         | Type             | Null | Key | Default | Extra          |
 * +---------------+------------------+------+-----+---------+----------------+
 * | IDExam        | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
 * | IDPatient     | int(10) unsigned | NO   | MUL | NULL    |                |
 * | IDUser        | int(10) unsigned | NO   | MUL | NULL    |                |
 * | IDService     | int(10) unsigned | NO   | MUL | NULL    |                |
 * | Date          | date             | NO   |     | NULL    |                |
 * | Status        | char(10)         | NO   |     | NULL    |                |
 * +---------------+------------------+------+-----+---------+----------------+
 */

 class Exam{

    private $IDExam;
    private $IDPatient;
    private $IDUser;
    private $IDService;
    private $Date;
    private $Status;

    function getIDExam(){
        return $this->IDExam;
    }

    function getIDPatient(){
        return $this->IDPatient;
    }

    function getIDUser(){
        return $this->IDUser;
    }

    function getIDService(){
        return $this->IDService;
    }

    function getDate(){
        return $this->Date;
    }

    function getStatus(){
        return $this->Status;
    }

    function setIDExam($IDExam)
    {
        $this->IDExam = $IDExam;
    }

    function setIDPatient($IDPatient)
    {
        $this->IDPatient = $IDPatient;
    }

    function setIDUser($IDUser)
    {
        $this->IDUser = $IDUser;
    }

    function setIDService($IDService)
    {
        $this->IDService = $IDService;
    }

    function setDate($Date)
    {
        $this->Date = $Date;
    }

    function setStatus($Status)
    {
        $this->Status = $Status;
    }
 }
?>