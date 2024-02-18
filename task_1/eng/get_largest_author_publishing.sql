USE `publishing`;

SELECT CONCAT(a.Name, ' ', a.Surname) AS Author, COUNT(ba.Book_ID) AS Books_quantity
FROM Authors a
LEFT JOIN Books_Authors ba ON a.ID = ba.Author_ID
LEFT JOIN Books b ON ba.Book_ID = b.ID
GROUP BY a.ID
ORDER BY Books_quantity DESC
LIMIT 1;