<?php

/**
 * +-----------------+------------------+------+-----+---------+----------------+
 * | Field           | Type             | Null | Key | Default | Extra          |
 * +-----------------+------------------+------+-----+---------+----------------+
 * | IDUser          | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
 * | FirstName       | char(30)         | NO   |     | NULL    |                |
 * | LastName        | char(30)         | NO   |     | NULL    |                |
 * | Email           | char(50)         | NO   |     | NULL    |                |
 * | password        | varchar(250)     | NO   |     | NULL    |                |
 * | PermissionLevel | char(30)         | NO   |     | NULL    |                |
 * | Description     | char(30)         | NO   |     | NULL    |                |
 * +-----------------+------------------+------+-----+---------+----------------+
 */

class User
{

    private $IDUser;
    private $FirstName;
    private $LastName;
    private $Email;
    private $password;
    private $PermissionLevel;
    private $Description;

    function getIDUser()
    {
        return $this->IDUser;
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

    function getpassword()
    {
        return $this->password;
    }

    function getPermissionLevel()
    {
        return $this->PermissionLevel;
    }

    function getDescription()
    {
        return $this->Description;
    }

    function setIDUser($IDUser)
    {
        $this->IDUser = $IDUser;
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

    function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    function setPermissionLevel($PermissionLevel)
    {
        $this->PermissionLevel = $PermissionLevel;
    }

    function setDescription($Description)
    {
        $this->Description = $Description;
    }

    //Verify the password
    function verifyPassword(string $passwordToVerify)
    {
        return password_verify($passwordToVerify, $this->password);
    }
}
?>