<?php

/**
 * +----------+--------------+------+-----+---------+----------------+
 * | Field    | Type         | Null | Key | Default | Extra          |
 * +----------+--------------+------+-----+---------+----------------+
 * | id       | int(11)      | NO   | PRI | NULL    | auto_increment |
 * | username | varchar(50)  | YES  |     | NULL    |                |
 * | password | varchar(250) | YES  |     | NULL    |                |
 * | email    | varchar(50)  | YES  |     | NULL    |                |
 * | picture  | varchar(15)  | YES  |     | NULL    |                |
 * | question | varchar(50)  | YES  |     | NULL    |                |
 * | answer   | varchar(20)  | YES  |     | NULL    |                |
 * +----------+--------------+------+-----+---------+----------------+
 */

class User
{

    //Properties
    private $id;
    private $username;
    private $password;
    private $email;
    private $picture;
    private $question;
    private $answer;

    //Setters

    function setId($id)
    {
        $this->id = $id;
    }

    function setUserName($username)
    {
        $this->username = $username;
    }

    function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setPicture($picture)
    {
        $this->picture = $picture;
    }

    function setQuestion($question)
    {
        $this->question = $question;
    }

    function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    //Getters
    function getId()
    {
        return $this->id;
    }

    function getUserName()
    {
        return $this->username;
    }

    function getPassword()
    {
        return $this->password;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getPicture()
    {
        return $this->picture;
    }

    function getQuestion()
    {
        return $this->question;
    }

    function getAnswer()
    {
        return $this->answer;
    }

    //Verify the password
    function verifyPassword(string $passwordToVerify)
    {
        //Return a boolean based on verifying if the password given is correct for the current user
        return password_verify($passwordToVerify, $this->password);
    }
}
?>