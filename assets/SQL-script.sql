-- Drop tables if they do exist already. --

DROP TABLE IF EXISTS `SoundsInPresets`;
DROP TABLE IF EXISTS `Presets`;
DROP TABLE IF EXISTS `Sounds`;
DROP TABLE IF EXISTS `Users`;
DROP TABLE IF EXISTS `Genres`;
DROP TABLE IF EXISTS `Categories`;
DROP TABLE IF EXISTS `Roles`;


-- CREATE TABLES --

-- Roles
CREATE TABLE Roles(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(20) COLLATE utf8_swedish_ci NOT NULL,
    PRIMARY KEY(Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- Categories
CREATE TABLE Categories(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(30) COLLATE utf8_swedish_ci NOT NULL,
    PRIMARY KEY(Id) 
) engine = innoDB DEFAULT CHARSET=utf8 COLLATE utf8_swedish_ci;

-- Genres
CREATE TABLE Genres(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(30) COLLATE utf8_swedish_ci NOT NULL,
    PRIMARY KEY(Id)
) engine = innoDB DEFAULT CHARSET=utf8 COLLATE utf8_swedish_ci;

-- Users
CREATE TABLE Users(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Username` VARCHAR(20) COLLATE utf8_swedish_ci NOT NULL,
    `Password` VARCHAR(32) NOT NULL,
    `Email` VARCHAR(254) NOT NULL,
    `RolesId` INT NOT NULL,
    `Date_created` DATETIME NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY(Id),
    FOREIGN KEY(RolesId) REFERENCES Roles(Id)
) engine = innoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- Sounds
/* FIX - ändra till NOT NULL när allt funkar */
CREATE TABLE Sounds(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(40) COLLATE utf8_swedish_ci,
    `Fileformat` VARCHAR(10),
    `Bitrate` INT,
    `Size` INT,
    `CategoriesId` INT,
    `GenresId` INT,
    `Date_uploaded` DATETIME NOT NULL DEFAULT current_timestamp(),
    `UsersId` INT,
    `FileURL` TEXT NOT NULL COLLATE utf8_swedish_ci,
    PRIMARY KEY(Id),
    FOREIGN KEY(CategoriesId) REFERENCES Categories(Id),
    FOREIGN KEY(GenresId) REFERENCES Genres(Id),
    FOREIGN KEY(UsersId) REFERENCES Users(Id)
) engine = innoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- Presets
/* FIX - Ändra till NOT NULL på users/genres om det ska vara ofrivilligt */ 
CREATE TABLE Presets(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(30) COLLATE utf8_swedish_ci,
    `Date_created` DATETIME NOT NULL DEFAULT current_timestamp(),
    `UsersId` INT, 
    `GenresId` INT,
    PRIMARY KEY(Id),
    FOREIGN KEY(UsersId) REFERENCES Users(Id),
    FOREIGN KEY(GenresId) REFERENCES Genres(Id) 
) engine = innoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- SoundsInPresets
CREATE TABLE SoundsInPresets(
    `Id` INT NOT NULL AUTO_INCREMENT,
    `SoundsId` INT NOT NULL,
    `PresetsId` INT NOT NULL,
    `Keyname` VARCHAR(10) NOT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY(SoundsId) REFERENCES Sounds(Id),
    FOREIGN KEY(PresetsId) REFERENCES Presets(Id)
) engine = innoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- * TEST DATA * --


-- ROLES
INSERT INTO Roles(Name) VALUES ("Admin");
INSERT INTO Roles(Name) VALUES ("User");

-- USERS
INSERT INTO Users(Username, Password, Email, RolesId) VALUES ("admin", "5f4dcc3b5aa765d61d8327deb882cf99", "admin@example.com", 1);
INSERT INTO Users(Username, Password, Email, RolesId) VALUES ("user", "5f4dcc3b5aa765d61d8327deb882cf99", "user@example.com", 2);

-- GENRES
INSERT INTO Genres(Name) VALUES ("Hiphop");

-- PRESETS
INSERT INTO Presets(Name, UsersId, GenresId) VALUES ("TestPreset", 1, 1);

-- SOUNDS
INSERT INTO Sounds(Name, Fileformat, FileURL) VALUES ("clap", "wav", "assets/sounds/clap.wav");
INSERT INTO Sounds(Name, Fileformat, FileURL) VALUES ("hihat", "wav", "assets/sounds/hihat.wav");
INSERT INTO Sounds(Name, Fileformat, FileURL) VALUES ("kick", "wav", "assets/sounds/kick.wav");
INSERT INTO Sounds(Name, Fileformat, FileURL) VALUES ("openhat", "wav", "assets/sounds/openhat.wav");
INSERT INTO Sounds(Name, Fileformat, FileURL) VALUES ("boom", "wav", "assets/sounds/boom.wav");
INSERT INTO Sounds(Name, Fileformat, FileURL) VALUES ("ride", "wav", "assets/sounds/ride.wav");
INSERT INTO Sounds(Name, Fileformat, FileURL) VALUES ("snare", "wav", "assets/sounds/snare.wav");
INSERT INTO Sounds(Name, Fileformat, FileURL) VALUES ("tom", "wav", "assets/sounds/tom.wav");
INSERT INTO Sounds(Name, Fileformat, FileURL) VALUES ("tink", "wav", "assets/sounds/tink.wav");

-- SOUNDS IN PRESETS
INSERT INTO SoundsInPresets(SoundsId, PresetsId, Keyname) VALUES (1, 1, "A");
INSERT INTO SoundsInPresets(SoundsId, PresetsId, Keyname) VALUES (2, 1, "S");
INSERT INTO SoundsInPresets(SoundsId, PresetsId, Keyname) VALUES (3, 1, "D");
INSERT INTO SoundsInPresets(SoundsId, PresetsId, Keyname) VALUES (4, 1, "F");
INSERT INTO SoundsInPresets(SoundsId, PresetsId, Keyname) VALUES (5, 1, "G");
INSERT INTO SoundsInPresets(SoundsId, PresetsId, Keyname) VALUES (6, 1, "H");
INSERT INTO SoundsInPresets(SoundsId, PresetsId, Keyname) VALUES (7, 1, "J");
INSERT INTO SoundsInPresets(SoundsId, PresetsId, Keyname) VALUES (8, 1, "K");
INSERT INTO SoundsInPresets(SoundsId, PresetsId, Keyname) VALUES (9, 1, "L");