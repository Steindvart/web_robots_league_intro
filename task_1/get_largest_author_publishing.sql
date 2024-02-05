USE `Издательство`;

SELECT CONCAT(a.Имя, ' ', a.Фамилия) AS Автор, COUNT(ba.Книга_ID) AS Количество_книг
FROM Авторы a
LEFT JOIN Книги_Авторы ba ON a.ID = ba.Автор_ID
LEFT JOIN Книги b ON ba.Книга_ID = b.ID
GROUP BY a.ID
ORDER BY Количество_книг DESC
LIMIT 1;