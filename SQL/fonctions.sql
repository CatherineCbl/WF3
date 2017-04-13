--------------------------------------------------------------------------- FONCTIONS PREDEFINIES -------------------------------------------------------------------------------------
-- Fonctions prédéfinies: prévues par le langage SQL et executées par le developpeur, elles permettent d'effectuer un traitement spécifique
SELECT DATABASE();
SELECT VERSION();
INSERT INTO abonne(prenom) VALUES ('test');
SELECT LAST_INSERT_ID(); -- permet d'afficher le dernier identifiant inséré
SELECT CURDATE(); -- retourne la date du jour au format 'YYYY-MM-JJ'
SELECT CURTIME();-- retourne l'heure courante au format 'HH:MM:SS'
SELECT DATE_FORMAT('2012-10-03 22:23:00','%d/%m/%Y - %H:%i:%s'); -- retourne la date et l'heure au format demandé
-- pour toute fonction prédéfinie, il est toujours important de consulter la documentation afin de savoir quels paramètres/arguments nous devons envoyer à notre fonction et surtout de savoir ce qu'ell retourne
SELECT * , DATE_FORMAT(date_rendu, 'le %d/%m/%Y') FROM emprunt; -- met les dates au format français
SELECT DAYNAME('2017-04-13'); -- Affiche le jour d'une date en particulier
SELECT DAYOFYEAR('2017-04-13'); -- Affiche le numero du jour de l'année
INSERT INTO abonne(prenom) VALUES(PASSWORD('mypass')); -- permet de crypter le mdp
SELECT LENGTH('test'); -- calcul la taille de la chaine
SELECT LOCATE('j', 'aujourd\'hui'); -- retourne la position de la lettre "j" dans le mot "aujourd'hui"
SELECT SUBSTRING('bonjour', 4); -- coupe et affiche la chaine a parti du 4eme caractere
SELECT CONCAT_WS("-", "Premier nom", "Deuxieme nom", "troisième nom"); -- La fonction CONCAT_WS( signifie CONCAT With Separator, c'est à dire "concaténation (suivi de ) avec séparateur"
SELECT CONCAT_WS(" ", id_abonne, prenom) AS 'liste' FROM abonne;
SELECT REPLACE('www.cdiscount.fr', 'w', 'W'); -- remplace un caractere dans une chaine par un autre caractère

--------------------------------------------------------------------------- FONCTIONS UTILISATEUR -------------------------------------------------------------------------------------
-- Fonctions utilisateur: prévue, inscrite et executée par le développeur pour un traitement spécifique

DELIMITER $
CREATE FUNCTION calcul_tva(nb INT) RETURNS TEXT
COMMENT 'Fonction permettant le calcul de la TVA'
READS SQL DATA
    BEGIN
        RETURN CONCAT_WS(' : ', 'Les résultat est', (nb*1.2));
    END
$ DELIMITER;

SELECT calcul_tva(10);
-- CREATE FUNCTION permet de créer la fonction
-- calcul_tva represente le nom de notre fonction
-- RETURNS TEXT permet de préciser que la fonction renverra du texte
-- (nb INT) représente un argument (paramètre) entrant de type integer (nombre)
-- COMMENT 'Fonction permettant le calcul de la TVA' commentaire d'accompagnement
-- READS SQL DATA permet d'indiquer au systeme que notre traitement ne fer--READS SQL DATA permet d'indiquer au systeme que notre traitement ne fera que lire( et non pas modifier, supprimer)
-- BEGIN debut de nos instructions
-- RETURN CONCAT_WS(' : ','Le resultat est', (nb*1.2)); nous retournons le montant calculé avec la TVA
-- END fin des instructions
-- DELIMITER $ on change le delimiteur car en inscrivant la fonction, on devra inscrire des points virgules ; alors qu'il ne s'agira pas de la fin de notre fonction
