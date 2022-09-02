<?php

/*
+---------------+-------+------+-------------+
| ReservationID | Rooms | Days | RoomsTypeID |
+---------------+-------+------+-------------+
*/

// Create Reservation Class
class Reservation
{
    // We need all columns 
    // Attributes, make sure they match the column names!    
    private $ReservationID;
    private $Rooms;
    private $Days;
    private $RoomsTypeID;

    //Setters. Why do we need setters in this class?
    function setReservationID(string $reservationID)
    {
        $this->ReservationID = $reservationID;
    }

    function setRooms(int $rooms)
    {
        $this->Rooms = $rooms;
    }

    function setDays(int $days)
    {
        $this->Days = $days;
    }

    function setRoomsTypeID(string $roomsTypeID)
    {
        $this->RoomsTypeID = $roomsTypeID;
    }

    //Getters
    function getReservationID(): string
    {
        return $this->ReservationID;
    }

    function getRooms(): int
    {
        return $this->Rooms;
    }

    function getDays(): int
    {
        return $this->Days;
    }

    function getRoomsTypeID(): int
    {
        return $this->RoomsTypeID;
    }
}
