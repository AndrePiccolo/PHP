<?php
class UserDAO
{

    // Create a class member to store the PDO wrapper object
    private static $db;

    // create the init function to start the PDO wrapper
    static function init()
    {
        self::$db = new PDOWrapper('User');
    }

    // get user detail
    static function getUser(string $username)
    {

        // you know the drill
        // return the single result query
        $query = "SELECT * FROM users WHERE users.username = :username";

        try {
            self::$db->query($query);
            self::$db->bind(":username", $username);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->getSingleResult();
    }
}
