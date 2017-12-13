CREATE TABLE Role(
id int not null primary key auto_increment,
name varchar(255),
permissionLevel int
);

CREATE TABLE Stack(
id int not null primary key auto_increment,
name varchar(255)
);

CREATE TABLE Artist(
id int not null primary key auto_increment,
name varchar(255)
);

CREATE TABLE Label(
id int not null primary key auto_increment,
name varchar(255)
);

CREATE TABLE RoleIDs(
id int not null primary key auto_increment,
userID int,
roleID int,
FOREIGN KEY (roleID)REFERENCES Role(id)
);

CREATE TABLE User(
id int not null primary key auto_increment,
username varchar(255),
password varchar(255),
role int,
FOREIGN KEY (role) REFERENCES RoleIDs(id)
);

CREATE TABLE Album(
id int not null primary key auto_increment,
name varchar(255),
label int,
FOREIGN KEY (label) REFERENCES Label(id)
);

CREATE TABLE Song(
id int not null primary key auto_increment,
artist int,
title varchar(255),
playCount int,
album int,
FOREIGN KEY (artist) REFERENCES Artist(id),
FOREIGN KEY (Album) REFERENCES Album(id)
);

CREATE TABLE PlaylistEntry (
id int not null primary key auto_increment,
submittime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
stack int,
userID int,
song int,
FOREIGN KEY (userID) REFERENCES User(id),
FOREIGN KEY (stack) REFERENCES Stack(id),
FOREIGN KEY (song) REFERENCES Song(id)
);
