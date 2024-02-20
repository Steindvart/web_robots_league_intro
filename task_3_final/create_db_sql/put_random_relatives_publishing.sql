use publishing;

TRUNCATE TABLE Books_Authors;

TRUNCATE TABLE Books_Genres;

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
LIMIT 30;  -- количество записей в таблице Books_Genres