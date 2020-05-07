-- Database: upssiride

-- DROP DATABASE upssiride;

-- DROP TABLE Account CASCADE;
-- DROP TABLE Sponsors CASCADE;
-- DROP TABLE Vehicule CASCADE;
-- DROP TABLE Ride CASCADE;
-- DROP TABLE State CASCADE;
-- DROP TABLE Place CASCADE;
-- DROP TABLE Participate CASCADE;
-- DROP TABLE Recquire CASCADE;
-- DROP TABLE consult_contact_details CASCADE;

CREATE TABLE Account(
   IdAccount serial,
   Name VARCHAR(50),
   FirstName VARCHAR(50),
   Gender VARCHAR(1),
   Password VARCHAR(50),
   PictureProfil VARCHAR(300),
   Email VARCHAR(50),
   Phone VARCHAR(30),
   Birthdate DATE,
   AdminRights INT,
   RegistrationDate DATE,
   Description TEXT,
   CHECK (Gender ='M' OR Gender ='F'),
   CHECK (AdminRights = '0' OR AdminRights = '1'),
   PRIMARY KEY(IdAccount)
);

CREATE TABLE Vehicule(
   Registration VARCHAR(50),
   Brand VARCHAR(50),
   Model VARCHAR(50),
   Color VARCHAR(50),
   IdAccount INT NOT NULL,
   PRIMARY KEY(Registration),
   FOREIGN KEY(IdAccount) REFERENCES Account(IdAccount)
);

CREATE TABLE Place(
   IdPlace serial,
   Address VARCHAR(50),
   Postcode VARCHAR(50),
   City VARCHAR(50),
   Country VARCHAR(50),
   PRIMARY KEY(IdPlace)
);

CREATE TABLE State(
   IdState INT,
   Label VARCHAR(50),
   PRIMARY KEY(IdState)
);

INSERT INTO state VALUES(default,'coming');
INSERT INTO state VALUES(default,'processing');
INSERT INTO state VALUES(default,'completed');
INSERT INTO state VALUES(default,'canceled');

CREATE TABLE Sponsors(
   IdSponsors serial,
   Name VARCHAR(50),
   Description TEXT,
   PictureProfile VARCHAR(50),
   PRIMARY KEY(IdSponsors)
);

CREATE TABLE Ride(
   IdRide serial,
   DepartureDate DATE,
   DepartureTime TIME,
   Comment TEXT,
   MaxPassengersNb INT,
   Music INT,
   Pets INT,
   Smoker INT,
   IdState INT NOT NULL,
   IdPlace INT NOT NULL,
   IdPlace_1 INT NOT NULL,
   IdAccount INT NOT NULL,
   CHECK (MaxPassengersNb <= 8),
   CHECK (Music = '0' OR Music = '1'),
   CHECK (Pets = '0' OR Pets = '1'),
   CHECK (Smoker = '0' OR Smoker = '1'),
   PRIMARY KEY(IdRide),
   FOREIGN KEY(IdState) REFERENCES State(IdState),
   FOREIGN KEY(IdPlace) REFERENCES Place(IdPlace),
   FOREIGN KEY(IdPlace_1) REFERENCES Place(IdPlace),
   FOREIGN KEY(IdAccount) REFERENCES Account(IdAccount)
);

CREATE TABLE Participate(
   IdAccount INT,
   IdRide INT,
   PRIMARY KEY(IdAccount, IdRide),
   FOREIGN KEY(IdAccount) REFERENCES Account(IdAccount),
   FOREIGN KEY(IdRide) REFERENCES Ride(IdRide)
);

CREATE TABLE Recquire(
   IdAccount INT,
   IdRide INT,
   PRIMARY KEY(IdAccount, IdRide),
   FOREIGN KEY(IdAccount) REFERENCES Account(IdAccount),
   FOREIGN KEY(IdRide) REFERENCES Ride(IdRide)
);

CREATE TABLE Consult_Contact_Details(
   IdAccount INT,
   IdAccount_1 INT,
   PRIMARY KEY(IdAccount, IdAccount_1),
   FOREIGN KEY(IdAccount) REFERENCES Account(IdAccount),
   FOREIGN KEY(IdAccount_1) REFERENCES Account(IdAccount)
);