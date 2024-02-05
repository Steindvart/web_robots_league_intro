USE `publishing`;

SELECT b.Name AS Book_Name, CONCAT(a.Name, ' ', a.Surname) AS Author
FROM Books b
JOIN Books_Authors ba ON b.ID = ba.Book_ID
JOIN Authors a ON ba.Author_ID = a.ID
JOIN Books_Genres bg ON b.ID = bg.Book_ID
JOIN Genres g ON bg.Genre_ID = g.ID
WHERE g.Name = 'Fantasy';