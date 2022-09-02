<?php

// NOTICE THE CHANGES IN PDOWRAPPER's FUNCTION NAMES: getSingleResult() and getSetResult()

class UserDAO
{

    // Create a class member to store the PDO wrapper object
    private static $db;

    // create the init function to start the PDO wrapper
    static function initialize()
    {
        self::$db = new PDOWrapper('User');
    }

    // function to create user
    static function createUser(User $user)
    {
        // make sure the strings being stored in the database are cleaned 
        // and trimmed 
        // OBS: All this process is done in validate class

        // query
        $query = "INSERT INTO user (username, password, email, picture, question, answer)
        VALUES (:username, :password, :email, :picture, :question, :answer)";

        // bind
        try {
            self::$db->query($query);
            self::$db->bind(":username", $user->getUserName());
            self::$db->bind(":password", $user->getPassword());
            self::$db->bind(":email", $user->getEmail());
            self::$db->bind(":picture", $user->getPicture());
            self::$db->bind(":question", $user->getQuestion());
            self::$db->bind(":answer", $user->getAnswer());

            // execute
            self::$db->execute();
            if (self::$db->rowCount() != 1) {
                throw new Exception("Failed to create reservation register $user->getUserName()");
            }
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return 0;
        }
        // you may return the rowCount
        return self::$db->rowCount();
    }

    // get user detail
    static function getUser(string $username)
    {

        // you know the drill
        // return the single result query
        $query = "SELECT * FROM user WHERE user.email = :username";

        try {
            self::$db->query($query);
            self::$db->bind(":username", $username);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSingleResult();
    }

    // update the current user profile
    // certainly you don't have the form to facilitate this
    // so, it is not needed in our app, but hey.. more practice is better!
    static function updateUser(User $user)
    {

        // you know the drill
        $query = "UPDATE user SET username = :username,
                                password = :password,
                                email = :email,
                                picture = :picture,
                                question = :question,
                                answer = :answer,
                    WHERE id = :userid";

        try {
            self::$db->query($query);
            self::$db->bind(":username", $user->getUserName());
            self::$db->bind(":password", $user->getPassword());
            self::$db->bind(":email", $user->getEmail());
            self::$db->bind(":picture", $user->getPicture());
            self::$db->bind(":question", $user->getQuestion());
            self::$db->bind(":answer", $user->getAnswer());
            self::$db->bind(":userid", $user->getId());
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        // You may want to return the rowCount
        return self::$db->rowCount();
    }

    // get multiple users detail
    // It is not needed in our app, but hey.. more practice is better!
    static function getUsers()
    {

        // you know the drill
        // return the multiple result query    
        $query = "SELECT  user.username FROM user";

        try {
            self::$db->query($query);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSetResult();
    }
}
?>