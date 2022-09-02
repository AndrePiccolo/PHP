DROP DATABASE IF EXISTS projectAPi47025;
CREATE DATABASE IF NOT EXISTS projectAPi47025;

use projectAPi47025;

-- Create Patient table
CREATE TABLE Patient
( IDPatient INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  FirstName CHAR(30) NOT NULL,
  LastName CHAR(30) NOT NULL,
  Email CHAR(50) NOT NULL,
  Phone CHAR(15) NOT NULL,
  Address CHAR(100) not null,
  City CHAR(30) not null,
  ZipCode CHAR(10) not null
) ENGINE=InnoDB;

-- Create User table
CREATE TABLE User
( IDUser INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  FirstName CHAR(30) NOT NULL,
  LastName CHAR(30) NOT NULL,
  Email CHAR(50) NOT NULL,
  password VARCHAR(250) NOT NULL,
  PermissionLevel CHAR(30) NOT NULL,
  Description char(30) NOT NULL
) ENGINE=InnoDB;

-- Create ServiceType table
CREATE TABLE ServiceType
( IDService INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ServiceDesc CHAR(30) NOT NULL,
  Price FLOAT(6,2)
) ENGINE=InnoDB;

-- Create Service table
CREATE TABLE Exam
( IDExam INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  IDPatient INT UNSIGNED NOT NULL,
  IDUser INT UNSIGNED NOT NULL,
  IDService INT UNSIGNED NOT NULL,
  Date DATE NOT NULL,
  Status CHAR(10) NOT NULL,
  FOREIGN KEY (IDPatient) REFERENCES Patient(IDPatient) ON DELETE CASCADE,
  FOREIGN KEY (IDUser) REFERENCES User(IDUser) ON DELETE CASCADE,
  FOREIGN KEY (IDService) REFERENCES ServiceType(IDService) ON DELETE CASCADE
) ENGINE=InnoDB;

-- admin user for login - user:douglascollege@college.com / pwd: douglascollege / user with all permissions
INSERT INTO user (FirstName, LastName, Email, password, PermissionLevel, Description) 
        VALUES ("Douglas", "College", "douglascollege@college.com", "$2y$10$1stKBEhjszcWQo47VfVMSukXRV/Fs50z7m.mqdTArxgfqQ66sN5jK", "Admin", "Owner");
-- user:john@college.com / pwd: john123 / Doctor        
INSERT INTO user (FirstName, LastName, Email, password, PermissionLevel, Description) 
        VALUES ("John", "Travolta", "john@college.com", "$2y$10$e3Horn9QC7epSfEkBHsn3.uAbZFHKRNoA7CG6eAG2QlIGVZ.5/RIe", "Employee", "Doctor");
-- user:joan@college.com / pwd: joan123 / Secretary        
INSERT INTO user (FirstName, LastName, Email, password, PermissionLevel, Description) 
        VALUES ("Joan", "Rivers", "joan@college.com", "$2y$10$1da5wjvMnoobNUKHm1TMK.0l42.G4YhWPb9cz61JBUbgWrYiBxM2O", "Employee", "Secretary");
-- user:alone@college.com / pwd: alone123 / Doctor        
INSERT INTO user (FirstName, LastName, Email, password, PermissionLevel, Description) 
        VALUES ("Sylvester", "Stallone", "alone@college.com", "$2y$10$pY5ZtMFXlywVbxwlQT5OBOd76K.WOP.szOaoN/JP7D.YfC/hm1g4y", "Employee", "Doctor");
-- user:arnold@college.com / pwd: arnold123 / Doctor        
INSERT INTO user (FirstName, LastName, Email, password, PermissionLevel, Description) 
        VALUES ("Arnold", "Schwarzenegger", "arnold@college.com", "$2y$10$8OMEo2V6Ruf6EFlqxn8Fdevhe962dIEAUZXJn8HvyIY69XxM106fa", "Employee", "Doctor");
-- user:driver@college.com / pwd: driver123 / Doctor        
INSERT INTO user (FirstName, LastName, Email, password, PermissionLevel, Description) 
        VALUES ("Jason", "Statham", "driver@college.com", "$2y$10$6zzh46XhsIgIlVO6mIAuyOgQ25Rd1pdP/.t9kUCVSfLDpUvRZMilO", "Employee", "Doctor");

--insert values patient
INSERT INTO patient (FirstName, LastName, Email, Phone, Address, City, ZipCode) 
        VALUES ("Ana", "Jackson", "ana@email.com", "1231231234", "1234 123 Street", "Vancouver", "K8R0B7");
INSERT INTO patient (FirstName, LastName, Email, Phone, Address, City, ZipCode) 
        VALUES ("Noah", "Liam", "noah@email.com", "9879879876", "9876 987 Street", "Surrey", "K9R9B9");
INSERT INTO patient (FirstName, LastName, Email, Phone, Address, City, ZipCode) 
        VALUES ("Lucas", "Benjamin", "lucas@email.com", "1231231234", "1234 123 Street", "Burnaby", "K8R0B7");
INSERT INTO patient (FirstName, LastName, Email, Phone, Address, City, ZipCode) 
        VALUES ("Oliver", "Ethan", "oliver@email.com", "9879879876", "9876 987 Street", "White Rock", "K9R9B9");
INSERT INTO patient (FirstName, LastName, Email, Phone, Address, City, ZipCode) 
        VALUES ("Jacob", "Leo", "jacob@email.com", "1231231234", "1234 123 Street", "Coquitlam", "K8R0B7");
INSERT INTO patient (FirstName, LastName, Email, Phone, Address, City, ZipCode) 
        VALUES ("Logan", "William", "logan@email.com", "9879879876", "9876 987 Street", "New Westminster", "K9R9B9");
INSERT INTO patient (FirstName, LastName, Email, Phone, Address, City, ZipCode) 
        VALUES ("Grayson", "Jack", "jack@email.com", "1231231234", "1234 123 Street", "Vancouver", "K8R0B7");
INSERT INTO patient (FirstName, LastName, Email, Phone, Address, City, ZipCode) 
        VALUES ("James", "Ethan", "james@email.com", "9879879876", "9876 987 Street", "Surrey", "K9R9B9");
INSERT INTO patient (FirstName, LastName, Email, Phone, Address, City, ZipCode) 
        VALUES ("Aiden", "Lincoln", "aiden@email.com", "1231231234", "1234 123 Street", "Surrey", "K8R0B7");
INSERT INTO patient (FirstName, LastName, Email, Phone, Address, City, ZipCode) 
        VALUES ("Theo", "Thomas", "theo@email.com", "9879879876", "9876 987 Street", "Burnaby", "K9R9B9");

-- insert Service types
INSERT INTO servicetype (ServiceDesc, Price) VALUES ("X rays", 25);
INSERT INTO servicetype (ServiceDesc, Price) VALUES ("Blood Pressure Check", 30);
INSERT INTO servicetype (ServiceDesc, Price) VALUES ("Dental Clean", 38);
INSERT INTO servicetype (ServiceDesc, Price) VALUES ("Covid Test", 42);
INSERT INTO servicetype (ServiceDesc, Price) VALUES ("Blood Exam", 80);
INSERT INTO servicetype (ServiceDesc, Price) VALUES ("Skin Biopsy", 132);
INSERT INTO servicetype (ServiceDesc, Price) VALUES ("Flu Shot", 200);
INSERT INTO servicetype (ServiceDesc, Price) VALUES ("Genetic Test", 273);
INSERT INTO servicetype (ServiceDesc, Price) VALUES ("Electrocardiogram", 349);

-- insert into exam
INSERT INTO exam (IDPatient, IDUser, IDService, Date, Status) VALUES (1, 2, 1, "2022-08-10", "Confirmed");
INSERT INTO exam (IDPatient, IDUser, IDService, Date, Status) VALUES (2, 4, 2, "2022-08-23", "Confirmed");
INSERT INTO exam (IDPatient, IDUser, IDService, Date, Status) VALUES (5, 5, 3, "2022-08-12", "Cancelled");
INSERT INTO exam (IDPatient, IDUser, IDService, Date, Status) VALUES (2, 6, 4, "2022-09-07", "Confirmed");
INSERT INTO exam (IDPatient, IDUser, IDService, Date, Status) VALUES (3, 5, 5, "2022-09-10", "Open");
INSERT INTO exam (IDPatient, IDUser, IDService, Date, Status) VALUES (8, 4, 6, "2022-09-15", "Cancelled");
INSERT INTO exam (IDPatient, IDUser, IDService, Date, Status) VALUES (7, 4, 3, "2022-10-17", "Open");
INSERT INTO exam (IDPatient, IDUser, IDService, Date, Status) VALUES (6, 2, 8, "2022-12-04", "Open");
INSERT INTO exam (IDPatient, IDUser, IDService, Date, Status) VALUES (9, 5, 9, "2023-01-09", "Open");
INSERT INTO exam (IDPatient, IDUser, IDService, Date, Status) VALUES (3, 5, 2, "2023-08-11", "Open");
INSERT INTO exam (IDPatient, IDUser, IDService, Date, Status) VALUES (5, 3, 4, "2023-08-27", "Open");
INSERT INTO exam (IDPatient, IDUser, IDService, Date, Status) VALUES (1, 2, 5, "2022-07-30", "Open");