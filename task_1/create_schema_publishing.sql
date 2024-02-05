CREATE SCHEMA IF NOT EXISTS `Издательство`;

USE `Издательство`;

CREATE TABLE IF NOT EXISTS Книги (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    ISBN VARCHAR(255) NOT NULL,
    Название VARCHAR(255),
    Страницы INT,
    Дата_публикации DATE,
    UNIQUE (ISBN)
);

CREATE TABLE IF NOT EXISTS Авторы (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Имя VARCHAR(255) NOT NULL,
    Фамилия VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Жанры (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Название VARCHAR(255) NOT NULL,
	UNIQUE (Название)
);

CREATE TABLE IF NOT EXISTS Книги_Авторы (
    Книга_ID INT,
    Автор_ID INT,
    FOREIGN KEY (Книга_ID) REFERENCES Книги(ID),
    FOREIGN KEY (Автор_ID) REFERENCES Авторы(ID)
);

CREATE TABLE IF NOT EXISTS Книги_Жанры (
    Книга_ID INT,
    Жанр_ID INT,
    FOREIGN KEY (Книга_ID) REFERENCES Книги(ID),
    FOREIGN KEY (Жанр_ID) REFERENCES Жанры(ID)
);

CREATE VIEW Книги_Авторы_Жанры AS
SELECT b.*,
	   GROUP_CONCAT(DISTINCT CONCAT(a.Имя, ' ', a.Фамилия) ORDER BY CONCAT(a.Имя, ' ', a.Фамилия) SEPARATOR ', ') AS Авторы,
       GROUP_CONCAT(DISTINCT g.Название ORDER BY g.Название SEPARATOR ', ') AS Жанры
FROM Книги b
JOIN Книги_Авторы ba ON b.ID = ba.Книга_ID
JOIN Авторы a ON a.ID = ba.Автор_ID
JOIN Книги_Жанры bg ON b.ID = bg.Книга_ID
JOIN Жанры g ON bg.Жанр_ID = g.ID
GROUP BY b.ID;