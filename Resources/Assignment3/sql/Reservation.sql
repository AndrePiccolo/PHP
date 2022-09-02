DROP DATABASE IF EXISTS Assignment3_002_APi47025;
CREATE DATABASE IF NOT EXISTS Assignment3_002_APi47025;
USE Assignment3_002_APi47025;

-- Create table Rooms
create table RoomsType (	
	ID TINYINT(3) AUTO_INCREMENT PRIMARY KEY,
	RoomsCode VARCHAR(2),
	RoomsDetail VARCHAR(20),
	RoomsCost SMALLINT(5)	
) Engine=InnoDB;

-- Insert table Rooms
-- must insert a few data for the foreign key setting in the reservation table to work
insert into RoomsType (ID, RoomsCode, RoomsDetail, RoomsCost) values (1, 'SD', 'Standard Rooms', 80);
insert into RoomsType (ID, RoomsCode, RoomsDetail, RoomsCost) values (2, 'DL', 'Deluxe Rooms', 120);
insert into RoomsType (ID, RoomsCode, RoomsDetail, RoomsCost) values (3, 'LX', 'Luxury Rooms', 200);

-- Create table Reservation
create table Reservation (
	ReservationID VARCHAR(50),
	Rooms INT,
	Days INT,
	RoomsTypeID TINYINT(3),
	FOREIGN KEY (RoomsTypeID) REFERENCES RoomsType (ID) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;

-- Insert table Reservation

insert into Reservation (ReservationID, Rooms, Days, RoomsTypeID) values ('RY582', 2, 3, 2);
insert into Reservation (ReservationID, Rooms, Days, RoomsTypeID) values ('RY738', 2, 2, 1);
insert into Reservation (ReservationID, Rooms, Days, RoomsTypeID) values ('RX053', 2, 4, 1);
insert into Reservation (ReservationID, Rooms, Days, RoomsTypeID) values ('RY004', 3, 3, 3);
insert into Reservation (ReservationID, Rooms, Days, RoomsTypeID) values ('RY660', 1, 2, 1);
insert into Reservation (ReservationID, Rooms, Days, RoomsTypeID) values ('RY172', 3, 3, 2);
insert into Reservation (ReservationID, Rooms, Days, RoomsTypeID) values ('RY429', 3, 1, 3);
insert into Reservation (ReservationID, Rooms, Days, RoomsTypeID) values ('RX575', 2, 5, 2);
insert into Reservation (ReservationID, Rooms, Days, RoomsTypeID) values ('RY841', 2, 4, 2);
insert into Reservation (ReservationID, Rooms, Days, RoomsTypeID) values ('RX037', 1, 2, 1);
