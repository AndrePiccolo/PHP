<?php
/*
+----+-----------+----------------+-----------+
| ID | RoomsCode | RoomsDetail    | RoomsCost |
+----+-----------+----------------+-----------+
*/
class RoomsTypeDAO
{

    // Declare static DB member to store the database
    private static $db;

    //Initialize the RoomsTypeDAO
    static function initialize()
    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService('RoomsType');
    }

    //Get all the Rooms Type
    static function getRoomsType()
    {
        // SELECT statement
        $query = "SELECT * FROM roomstype";
        // Prepare the Query
        self::$db->query($query);
        // Perform the Query
        self::$db->execute();
        //Return the results
        return self::$db->resultSet();
    }
}
