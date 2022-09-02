<?php

/*
+----+-----------+----------------+-----------+
| ID | RoomsCode | RoomsDetail    | RoomsCost |
+----+-----------+----------------+-----------+
*/
// Create Class RoomsType
class RoomsType
{
    // Make sure to have only similar attributes with the RoomsType table in the database
    //Attributes
    private $ID;
    private $RoomsCode;
    private $RoomsDetail;
    private $RoomsCost;

    // And implement only the getter
    // Save your time :)

    //Getters
    function getID(): int
    {
        return $this->ID;
    }

    function getRoomsCode(): string
    {
        return $this->RoomsCode;
    }

    function getRoomsDetail(): string
    {
        return $this->RoomsDetail;
    }

    function getRoomsCost(): int
    {
        return $this->RoomsCost;
    }
}
