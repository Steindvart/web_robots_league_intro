DROP SCHEMA IF EXISTS `publishing`;
CREATE SCHEMA IF NOT EXISTS `publishing`;

USE `publishing`;

CREATE TABLE IF NOT EXISTS Books (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    ISBN VARCHAR(255) NOT NULL,
    Name VARCHAR(255),
    Pages INT,
    Publish_date DATE,
    UNIQUE (ISBN)
);

CREATE TABLE IF NOT EXISTS Authors (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Surname VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Genres (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
	UNIQUE (Name)
);

CREATE TABLE IF NOT EXISTS Books_Authors (
    Book_ID INT,
    Author_ID INT,
    FOREIGN KEY (Book_ID) REFERENCES Books(ID),
    FOREIGN KEY (Author_ID) REFERENCES Authors(ID)
);

CREATE TABLE IF NOT EXISTS Books_Genres (
    Book_ID INT,
    Genre_ID INT,
    FOREIGN KEY (Book_ID) REFERENCES Books(ID),
    FOREIGN KEY (Genre_ID) REFERENCES Genres(ID)
);

CREATE VIEW Books_Authors_Genres AS
SELECT b.*, CONCAT(a.Name, ' ', a.Surname) AS Author, g.Name AS Genre
FROM Books b
JOIN Books_Authors ba ON b.ID = ba.Book_ID
JOIN Authors a ON a.ID = ba.Author_ID
JOIN Books_Genres bg ON b.ID = bg.Book_ID
JOIN Genres g ON bg.Genre_ID = g.ID;