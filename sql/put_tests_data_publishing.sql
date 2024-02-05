USE `publishing`;

INSERT INTO Books (ID, ISBN, Name, Pages, Publish_date)
VALUES
(1, 1234567890, 'Book 1', 200, '2023-01-01'),
(2, 2345678901, 'Book 2', 150, '2023-02-15'),
(3, 3456789012, 'Book 3', 300, '2023-03-10'),
(4, 4567890123, 'Book 4', 250, '2023-04-20'),
(5, 5678901234, 'Book 5', 180, '2023-05-05');

INSERT INTO Authors (ID, Name, Surname)
VALUES
(1, 'Ivan', 'Ivanov'),
(2, 'Petr', 'Petrov'),
(3, 'John', 'Snow');

INSERT INTO Genres (ID, Name)
VALUES
(1, 'Fantasy'),
(2, 'Detective'),
(3, 'Russian literature');

INSERT INTO Books_Authors (Book_ID, Author_ID)
VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 2),
(4, 2),
(4, 3),
(5, 3);

INSERT INTO Books_Genres (Book_ID, Genre_ID)
VALUES
(1, 3),
(1, 1),
(2, 1),
(2, 2),
(2, 3),
(3, 3),
(3, 2),
(4, 1),
(4, 2),
(5, 2);