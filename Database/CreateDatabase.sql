create database IF NOT EXISTS book_flights;
use book_flights;

create table IF NOT EXISTS Cities(
	CityID int not null auto_increment primary key,
	CityCode varchar(3) not null,
    CityName varchar(60) not null,
    Airport varchar(60) not null,
    Country varchar(60) not null
);

create table IF NOT EXISTS Flights(
	ID int not null auto_increment primary key,
    FromCityID int not null,
    ToCityID int not null,
    FlightDate date not null,
    FlightDepartTime time not null,
    FlightDuration time not null,
    foreign key(FromCityID) references Cities(CityID),
	foreign key(ToCityID) references Cities(CityID)
);

create table IF NOT EXISTS Prices(
	FlightID int auto_increment not null,
    Class varchar(10) not null,
    Price float not null,
    primary key(FlightID,Class),
	foreign key(FlightID) references Flights(ID)
);

