<?php
/*
+-----------+--------------+------+-----+---------+----------------+
| Field     | Type         | Null | Key | Default | Extra          |
+-----------+--------------+------+-----+---------+----------------+
| id        | int(11)      | NO   | PRI | NULL    | auto_increment |
| full_name | varchar(50)  | YES  |     | NULL    |                |
| username  | varchar(20)  | YES  |     | NULL    |                |
| password  | varchar(250) | YES  |     | NULL    |                |
+-----------+--------------+------+-----+---------+----------------+
*/

class User
{

    private $id;
    private $full_name;
    private $username;
    private $password;

    //Setters

    function setId($id)
    {
        $this->id = $id;
    }

    function setFullName($full_name)
    {
        $this->full_name = $full_name;
    }

    function setUserName($username)
    {
        $this->username = $username;
    }

    function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    //getters
    function getId()
    {
        return $this->id;
    }

    function getFullName()
    {
        return $this->full_name;
    }

    function getUserName()
    {
        return $this->username;
    }

    function getPassword()
    {
        return $this->password;
    }

    //Verify the password
    function verifyPassword(string $passwordToVerify)
    {
        //Return a boolean based on verifying if the password given is correct for the current user
        return password_verify($passwordToVerify, $this->password);
    }
}
