SELECT a.id, u.firstname, u.lastname
FROM users u, articles a
WHERE u.id = a.id_user
AND a.id = 10;
