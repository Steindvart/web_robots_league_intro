-- Create DB schema

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
  FOREIGN KEY (Book_ID) REFERENCES Books(ID) ON DELETE CASCADE,
  FOREIGN KEY (Author_ID) REFERENCES Authors(ID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Books_Genres (
  Book_ID INT,
  Genre_ID INT,
  FOREIGN KEY (Book_ID) REFERENCES Books(ID) ON DELETE CASCADE,
  FOREIGN KEY (Genre_ID) REFERENCES Genres(ID) ON DELETE CASCADE
);

CREATE VIEW Books_Authors_Genres AS
SELECT b.*,
  GROUP_CONCAT(DISTINCT CONCAT(a.Name, ' ', a.Surname) ORDER BY CONCAT(a.Name, ' ', a.Surname) SEPARATOR ', ') AS Authors,
  GROUP_CONCAT(DISTINCT g.Name ORDER BY g.Name SEPARATOR ', ') AS Genres
FROM Books b
LEFT JOIN Books_Authors ba ON b.ID = ba.Book_ID
LEFT JOIN Authors a ON a.ID = ba.Author_ID
LEFT JOIN Books_Genres bg ON b.ID = bg.Book_ID
LEFT JOIN Genres g ON bg.Genre_ID = g.ID
GROUP BY b.ID;

-- Put test data

INSERT INTO Books (ID, ISBN, Name, Pages, Publish_date)
VALUES
(1, '1234567890', 'Book 1', 200, '2023-01-01'),
(2, '2345678901', 'Book 2', 150, '2023-02-15'),
(3, '3456789012', 'Book 3', 300, '2023-03-10'),
(4, '4567890123', 'Book 4', 250, '2023-04-20'),
(5, '5678901234', 'Book 5', 180, '2023-05-05'),
(6, '6789012345', 'Book 6', 220, '2023-06-10'),
(7, '7890123456', 'Book 7', 270, '2023-07-15'),
(8, '8901234567', 'Book 8', 190, '2023-08-20'),
(9, '9012345678', 'Book 9', 320, '2023-09-25'),
(10, '0123456789', 'Book 10', 240, '2023-10-30'),
(11, '9876543210', 'Book 11', 210, '2023-11-05'),
(12, '8765432109', 'Book 12', 280, '2023-12-10'),
(13, '7654321098', 'Book 13', 170, '2024-01-15'),
(14, '6543210987', 'Book 14', 260, '2024-02-20'),
(15, '5432109876', 'Book 15', 300, '2024-03-25'),
(16, '4321098765', 'Book 16', 180, '2024-04-30'),
(17, '3210987654', 'Book 17', 290, '2024-05-05'),
(18, '2109876543', 'Book 18', 230, '2024-06-10'),
(19, '1098765432', 'Book 19', 310, '2024-07-15'),
(20, '0987654321', 'Book 20', 200, '2024-08-20');

INSERT INTO Authors (ID, Name, Surname)
VALUES
(1, 'Ivan', 'Ivanov'),
(2, 'Petr', 'Petrov'),
(3, 'John', 'Snow'),
(4, 'Anna', 'Smith'),
(5, 'Michael', 'Johnson'),
(6, 'Maria', 'Garcia'),
(7, 'James', 'Brown');

INSERT INTO Genres (ID, Name)
VALUES
(1, 'Fantasy'),
(2, 'Detective'),
(3, 'Russian literature'),
(4, 'Science fiction'),
(5, 'Romance'),
(6, 'Horror'),
(7, 'Thriller');

-- INSERT INTO Books_Authors (Book_ID, Author_ID)
-- VALUES
-- (1, 1),
-- (2, 2),
-- (3, 3),
-- (4, 4),
-- (5, 5),
-- (6, 6),
-- (7, 7),
-- (8, 1),
-- (9, 5),
-- (10, 3),
-- (11, 4),
-- (12, 5),
-- (13, 6),
-- (13, 3),
-- (14, 7),
-- (15, 1),
-- (16, 5),
-- (16, 7),
-- (17, 3),
-- (18, 4),
-- (19, 5),
-- (20, 1),
-- (20, 6);

-- INSERT INTO Books_Genres (Book_ID, Genre_ID)
-- VALUES
-- (1, 1),
-- (2, 2),
-- (3, 3),
-- (4, 4),
-- (5, 5),
-- (6, 6),
-- (7, 7),
-- (8, 1),
-- (9, 2),
-- (10, 3),
-- (11, 4),
-- (12, 5),
-- (13, 6),
-- (14, 7),
-- (15, 1),
-- (16, 2),
-- (17, 3),
-- (18, 4),
-- (19, 5),
-- (19, 1),
-- (20, 6);

-- Put random relations within tables

-- Autors one
INSERT INTO Books_Authors (Book_ID, Author_ID)
SELECT
    b.ID,
    FLOOR(1 + RAND() * 7)
FROM
    Books b
ORDER BY RAND()
LIMIT 30; -- max records in table

-- Autors second
INSERT INTO Books_Authors (Book_ID, Author_ID)
SELECT
    b.ID,
    FLOOR(1 + RAND() * 7)
FROM
    Books b
ORDER BY RAND()
LIMIT 30;

-- Genre one
INSERT INTO Books_Genres (Book_ID, Genre_ID)
SELECT
    b.ID,
    FLOOR(1 + RAND() * 7)
FROM
    Books b
ORDER BY RAND()
LIMIT 30;

-- Genre second
INSERT INTO Books_Genres (Book_ID, Genre_ID)
SELECT
    b.ID,
    FLOOR(1 + RAND() * 7)
FROM
    Books b
ORDER BY RAND()
LIMIT 30;