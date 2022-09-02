<?php


/*
+---------------+-------+------+-------------+
| ReservationID | Rooms | Days | RoomsTypeID |
+---------------+-------+------+-------------+
*/

class ReservationDAO
{

    // Declare Static DB member to store the database    
    private static $db;

    static function initialize()
    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService('Reservation');
    }

    // One of the functionality for the class abstracted by this DAO: CREATE
    // Remember that Create means INSERT
    static function createReservation(Reservation $newReservation)
    {

        // QUERY BIND EXECUTE 
        $query = "INSERT INTO reservation (ReservationID, Rooms, Days, RoomsTypeID)
                VALUES (:reservationID, :rooms, :days, :roomsTypeID)";

        try {
            self::$db->query($query);
            self::$db->bind(":reservationID", $newReservation->getReservationID());
            self::$db->bind(":rooms", $newReservation->getRooms());
            self::$db->bind(":days", $newReservation->getDays());
            self::$db->bind(":roomsTypeID", $newReservation->getRoomsTypeID());
            self::$db->execute();
            if (self::$db->rowCount() != 1) {
                throw new Exception("Failed to create reservation register $newReservation->getReservationID()");
            }
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        // You may want to return the last inserted id
        return self::$db->lastInsertedId();
    }

    // GET = READ = SELECT
    // This is for a single result.... when do I need it huh?  
    static function getReservation(string $ReservationId)
    {
        //QUERY, BIND, EXECUTE, RETURN (the single result)
        $query = "SELECT * FROM reservation WHERE reservation.ReservationID = :reservationID";
        try {
            self::$db->query($query);
            self::$db->bind(":reservationID", $ReservationId);
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        return self::$db->singleResult();
    }

    // GET = READ = SELECT ALLL
    // This is to get all purchases, do I even need this function? 
    static function getReservations()
    {
        // I don't need any parameter here, do I need to bind?
        //Prepare the Query
        $query = "SELECT * FROM reservation";
        //execute the query
        self::$db->query($query);
        self::$db->execute();
        //Return results
        return self::$db->resultSet();
    }

    // UPDATE means update    
    static function updateReservation(Reservation $ReservationToUpdate)
    {

        // QUERY, BIND, EXECUTE
        $query = "UPDATE reservation SET Rooms = :rooms,
                 Days = :days,
                 RoomsTypeID = :roomsTypeID
                WHERE ReservationID = :reservationID";

        try {
            self::$db->query($query);
            self::$db->bind(":reservationID", $ReservationToUpdate->getReservationID());
            self::$db->bind(":rooms", $ReservationToUpdate->getRooms());
            self::$db->bind(":days", $ReservationToUpdate->getDays());
            self::$db->bind(":roomsTypeID", $ReservationToUpdate->getRoomsTypeID());
            self::$db->execute();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
        // You may want to return the rowCount
        return self::$db->rowCount();
    }

    // Sorry, I need to DELETE your record   
    static function deleteReservation(string $ReservationId)
    {
        // Yea...yea... it is a drill like the one before
        $query = "DELETE FROM reservation WHERE reservation.ReservationID = :reservationID";

        try {
            self::$db->query($query);
            self::$db->bind(":reservationID", $ReservationId);
            self::$db->execute();
            if (self::$db->rowCount() != 1) {
                throw new Exception("Failed to delete reservation register $ReservationId");
            }
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
        return true;
    }

    // WE NEED TO USE JOIN HERE
    // Make sure to select from both tables joined at the correct column
    // You may need to also query some columns from the RoomsType class/table. 
    // Those columns are needed for cost calculation and display the rooms type detail in the main page
    static function getReservationList()
    {

        //Prepare the Query
        $query = "SELECT  reservation.*,roomstype.RoomsDetail, roomstype.RoomsCost 
                FROM reservation, roomstype 
                WHERE reservation.RoomsTypeID = roomstype.ID";
        self::$db->query($query);
        //execute the query
        self::$db->execute();

        //Return row results
        return self::$db->resultSet();
    }
}
