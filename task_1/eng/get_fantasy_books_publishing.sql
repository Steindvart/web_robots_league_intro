USE `publishing`;

SELECT b.Name AS Books_name,
	GROUP_CONCAT(DISTINCT CONCAT(a.Name, ' ', a.Surname) ORDER BY CONCAT(a.Name, ' ', a.Surname) SEPARATOR ', ') AS Authors
FROM Books b
JOIN Books_Authors ba ON b.ID = ba.Book_ID
JOIN Authors a ON ba.Author_ID = a.ID
JOIN Books_Genres bg ON b.ID = bg.Book_ID
JOIN Genres g ON bg.Genre_ID = g.ID
WHERE g.Name = 'Fantacy'
GROUP BY b.ID;