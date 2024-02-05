USE `Издательство`;

SELECT b.Название AS Название_книги,
	   GROUP_CONCAT(DISTINCT CONCAT(a.Имя, ' ', a.Фамилия) ORDER BY CONCAT(a.Имя, ' ', a.Фамилия) SEPARATOR ', ') AS Авторы
FROM Книги b
JOIN Книги_Авторы ba ON b.ID = ba.Книга_ID
JOIN Авторы a ON ba.Автор_ID = a.ID
JOIN Книги_Жанры bg ON b.ID = bg.Книга_ID
JOIN Жанры g ON bg.Жанр_ID = g.ID
WHERE g.Название = 'Фантастика'
GROUP BY b.ID;