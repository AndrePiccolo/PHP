<?php

/**
 * +-----------+------------------+------+-----+---------+----------------+
 * | Field     | Type             | Null | Key | Default | Extra          |
 * +-----------+------------------+------+-----+---------+----------------+
 * | IDPatient | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
 * | FirstName | char(30)         | NO   |     | NULL    |                |
 * | LastName  | char(30)         | NO   |     | NULL    |                |
 * | Email     | char(50)         | NO   |     | NULL    |                |
 * | Phone     | char(15)         | NO   |     | NULL    |                |
 * | Address   | char(100)        | NO   |     | NULL    |                |
 * | City      | char(30)         | NO   |     | NULL    |                |
 * | ZipCode   | char(10)         | NO   |     | NULL    |                |
 * +-----------+------------------+------+-----+---------+----------------+
 */

class Patient
{

    private $IDPatient;
    private $FirstName;
    private $LastName;
    private $Email;
    private $Phone;
    private $Address;
    private $City;
    private $ZipCode;

    function getIDPatient()
    {
        return $this->IDPatient;
    }

    function getFirstName()
    {
        return $this->FirstName;
    }

    function getLastName()
    {
        return $this->LastName;
    }

    function getEmail()
    {
        return $this->Email;
    }

    function getPhone()
    {
        return $this->Phone;
    }

    function getAddress()
    {
        return $this->Address;
    }

    function getCity()
    {
        return $this->City;
    }

    function getZipCode()
    {
        return $this->ZipCode;
    }

    function setIDPatient($IDPatient)
    {
        $this->IDPatient = $IDPatient;
    }

    function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
    }

    function setLastName($LastName)
    {
        $this->LastName = $LastName;
    }

    function setEmail($Email)
    {
        $this->Email = $Email;
    }

    function setPhone($Phone)
    {
        $this->Phone = $Phone;
    }

    function setAddress($Address)
    {
        $this->Address = $Address;
    }

    function setCity($City)
    {
        $this->City = $City;
    }

    function setZipCode($ZipCode)
    {
        $this->ZipCode = $ZipCode;
    }
}
?>