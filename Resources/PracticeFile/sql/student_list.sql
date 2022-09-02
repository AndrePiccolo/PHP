DROP DATABASE IF EXISTS StudentList;
CREATE DATABASE StudentList;
USE StudentList;

-- Create table course
Create TABLE Department (
    DeptID TINYINT(3) AUTO_INCREMENT PRIMARY KEY,
    ShortName CHAR(5),
    LongName TINYTEXT
) Engine=InnoDB;


-- Insert Department
INSERT INTO Department (ShortName, LongName) 
    VALUES ('MAR', 'Marketing'),
    ('BA', 'Business Administration'),
    ('CSIS', 'Computing Studies'),
    ('ACCT', 'Accounting'),
    ('FIN', 'Finance');


-- create table Student
create table Student (
	StudentID VARCHAR(50) PRIMARY KEY,
	FullName VARCHAR(50),
	Email VARCHAR(50),
	NumberOfTerms INT,
	DateJoin DATE,
	DeptID TINYINT(3),
    FOREIGN KEY (DeptID) REFERENCES Department (DeptID) ON DELETE CASCADE ON UPDATE CASCADE
);

insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300369246', 'Tyne Rollinson', 'tyne.r@douglascollege.ca', 5, '2020-08-20', 4);
insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300300456', 'Mickie Grundle', 'mickie.g@douglascollege.ca', 5, '2019-12-21', 4);
insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300332817', 'Ted Dahlgren', 'ted.d@douglascollege.ca', 2, '2019-11-19', 5);
insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300305807', 'Randi Hunn', 'randi.h@douglascollege.ca', 8, '2019-06-28', 3);
insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300357264', 'Judd Twigge', 'judd.t@douglascollege.ca', 8, '2020-04-05', 1);
insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300348427', 'Tucky Courtois', 'tucky.c@douglascollege.ca', 3, '2019-11-23', 4);
insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300357649', 'Stanly Binning', 'stanly.b@douglascollege.ca', 2, '2020-09-30', 1);
insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300357359', 'Silas Conachie', 'silas.c@douglascollege.ca', 3, '2020-01-11', 3);
insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300318461', 'Eve Tointon', 'eve.t@douglascollege.ca', 2, '2020-01-11', 5);
insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300378434', 'Wald Heinz', 'wald.h@douglascollege.ca', 3, '2020-04-21', 3);
insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300355436', 'Munroe Cuesta', 'munroe.c@douglascollege.ca', 5, '2019-06-05', 1);
insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300382178', 'Cleopatra Minero', 'cleopatra.m@douglascollege.ca', 2, '2020-05-16', 4);
insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300389290', 'Miltie Wonham', 'miltie.w@douglascollege.ca', 4, '2020-08-08', 1);
insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300318254', 'Salomi Klyn', 'salomi.k@douglascollege.ca', 7, '2020-07-31', 3);
insert into Student (StudentID, FullName, Email, NumberOfTerms, DateJoin, DeptID) values ('300385866', 'Tammy Colten', 'tammy.c@douglascollege.ca', 8, '2019-05-22', 2);

-- create table Student
create table users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	full_name VARCHAR(50),	
	username VARCHAR(20),	
	password VARCHAR(250)
) Engine=InnoDB;

-- insert admin user
INSERT INTO users (full_name, username, password) VALUES ('CSIS 3280 Admin','admin','$2y$10$u6VYG5lk7AsvCvfYgfQX/ek/B.8xFY8oyneG67GGPovs8maKcQfUS');

DESC Department; 
SELECT COUNT(*) FROM Department; -- 5
SELECT * FROM Department;

DESC Student;
SELECT COUNT(*) FROM Student; -- 20
SELECT * FROM Student;
