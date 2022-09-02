drop database if exists Assignment4;
create database Assignment4;
use Assignment4;

create table user (
	id INT AUTO_INCREMENT PRIMARY KEY,		
	username VARCHAR(50),
	password VARCHAR(250),				
	email VARCHAR(50),
	picture VARCHAR(15),	
	question VARCHAR(50),
	answer VARCHAR(20)		
) Engine=InnoDB;

