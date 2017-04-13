-- Afficher les id des livres qui n'ont jamais été rendus
SELECT id_livre FROM emprunt WHERE date_rendu IS NULL;
-- un champ NULL se teste avec IS

--------------------------------------------------------------------------------
-- REQUETES IMBRIQUEES (sur plusieurs tables)
-- Afficher le titre des livres dans la nature (date rendu NULL)
SELECT titre FROM livre WHERE id_livre IN
 (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);

 -------------------------------------------------------------------------------
 -- Afficher la liste des abonnés n'ayant pas rendu le livres à la bibliothèque
 SELECT * FROM abonne WHERE id_abonne IN
  (SELECT id_abonne FROM emprunt WHERE date_rendu IS NULL);
-- Afin de réaliser une requête imbriquée, il faut obligatoirement un champ commun entre les deux tables
-- Il faut toujours se poser la question: "*de quelles tables je vais avoir besoin pour executer la requête imbriquée et quel est le champ commun entre les deux tables?

--------------------------------------------------------------------------------
-- Nous aimerions connaitre le n° de(s) livres(s) que chloe a emprunté a la bibliotheque
SELECT id_livre FROM emprunt WHERE id_abonne IN
    (SELECT id_abonne FROM abonne WHERE prenom = 'Chloe');

--------------------------------------------------------------------------------
-- Afficher les prénoms des abonnés ayanr emprunté un livre le 19/12/2014
SELECT prenom FROM abonne WHERE id_abonne IN
    (SELECT id_abonne FROM emprunt WHERE date_sortie = '2014-12-19');

--------------------------------------------------------------------------------
-- Combien de livre Guillaume a emprunté à la bibliothèque?
SELECT COUNT(id_livre) FROM emprunt WHERE id_abonne IN
    (SELECT id_abonne FROM abonne WHERE prenom = 'Guillaume');

--------------------------------------------------------------------------------
-- Afficher la liste des abonnés ayant déjà emprunter un livre d'Alphonse Daudet
-- La liste des abonnés se trouve dans la table abonné
-- Le n° id des livres écrits par Alphonse Daudet se trouve dans la table livre
-- La liste des emprunts (qui a emprunté quoi:?) se trouve dans la table emprunt
-- Nous ne pouvons pas relier la table abonné directement avec la table livre (car ces deux tables ne possèdent pas de champs commun)
-- Nous pouvons relier la table livre avec la table emprunt. Nous pouvons aussi relier la table abonne avec la table emprunt
SELECT prenom FROM abonne WHERE id_abonne IN
    (SELECT id_abonne FROM emprunt WHERE id_livre IN
        (SELECT id_livre FROM livre WHERE auteur = 'Alphonse Daudet'));

--------------------------------------------------------------------------------
-- Nous aimerions connaitre le titre des livres que chloe a emprunté a la bibliotheque
SELECT titre FROM livre WHERE id_livre IN
    (SELECT id_livre FROM emprunt WHERE id_abonne IN
        (SELECT id_abonne FROM abonne WHERE prenom = 'Chloe'));

--------------------------------------------------------------------------------
-- Et aussi nous aimerions connaitre les titres des livres que chloe n'a pas emprunté

SELECT titre FROM livre WHERE id_livre NOT IN
(SELECT id_livre FROM emprunt WHERE id_abonne IN
    (SELECT id_abonne FROM abonne WHERE prenom ='Chloe'));

--------------------------------------------------------------------------------
-- Nous aimerions connaitre le titre des livres que Chloé n'a pas rendu à la bibliotheque

SELECT titre FROM livre WHERE id_livre IN
    (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL AND id_abonne IN
        (SELECT id_abonne FROM abonne WHERE prenom = 'Chloe' ));

--------------------------------------------------------------------------------
-- Qui a emprunté le plus de livres a la bibliotheque
SELECT prenom FROM abonne WHERE id_abonne =
    (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_abonne) DESC LIMIT 0,1);

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
-- JOINTURE
-- Nous aimerions connaitre les dates de sortie et de rendu pour l'abonné Guillaume

-- Différence Jointure et requete imbriquée: une jointure et une requete imbriquée permettent de faire des relations entre les differentes tables afin d'avoir des colonnes associées pour former qu'un seul résultat
-- Une jointure est possible dans tous les cas.
-- Une requete imbriquée est possible seulement dans le cas ou le résultat est issu de la même table.

SELECT a.prenom, e.date_sortie, e.date_rendu
FROM abonne a, emprunt e
WHERE a.id_abonne = e.id_abonne
AND a.prenom = 'Guillaume';
--1ere ligne: ce qu'on souhaite afficher
--2eme ligne: de quelle table cela provient, et de quelle table je vais avoir besoin
--3eme ligne: condition, quel est le champs en commun dans les 2 tables qui me permet d'effectuer les jointures

-- en requete imbriquée
SELECT date_sortie, date_rendu FROM emprunt WHERE id_abonne IN
    (SELECT id_abonne FROM abonne WHERE prenom='Guillaume');

--------------------------------------------------------------------------------
-- Nous aimerions connaitre les mouvements des livres (date_sortie et date_rendu) ecrit par "Alphonse Daudet"
SELECT l.auteur, e.date_sortie, e.date_rendu
FROM livre l, emprunt e
WHERE l.id_livre = e.id_livre
AND l.auteur = 'ALPHONSE DAUDET';

--requete imbriquée
SELECT date_sortie, date_rendu FROM emprunt WHERE id_livre IN
    (SELECT id_livre FROM livre WHERE auteur = 'ALPHONSE DAUDET');

--------------------------------------------------------------------------------
-- Qui a emprunté le livre "une vie" sur l'année 2014?

SELECT a.prenom
FROM abonne a, emprunt e, livre l
WHERE a.id_abonne=e.id_abonne
AND e.id_livre=l.id_livre
AND e.date_sortie LIKE'2014%' AND l.titre = 'Une vie';

--requete imbriquée
SELECT prenom FROM abonne WHERE id_abonne IN
    (SELECT id_abonne FROM emprunt WHERE date_sortie LIKE '2014%' AND id_livre IN
        (SELECT id_livre FROM livre WHERE titre = 'Une vie'));

--------------------------------------------------------------------------------
-- Nous aimerions connaitre le nombre de livre(s) emprunté par chaque abonné
SELECT a.prenom, COUNT(e.id_livre)
FROM abonne a, emprunt e
WHERE a.id_abonne = e.id_abonne
GROUP BY e.id_abonne;

--------------------------------------------------------------------------------
-- Nous aimerions connaitre le nombre de livre(s) a rendre pour chaque abonné
SELECT COUNT(e.id_livre), a.prenom
FROM abonne a, emprunt e
WHERE a.id_abonne = e.id_abonne
AND e.date_rendu IS NULL
GROUP BY e.id_abonne;
--------------------------------------------------------------------------------
-- Qui a emprunté Quoi? et quand? (titres des livres empruntés, a quelle date et savoir par qui)
SELECT a.prenom, e.date_sortie, l.titre
FROM livre l, emprunt e, abonne a
WHERE l.id_livre = e.id_livre
AND e.id_abonne = a.id_abonne;

--------------------------------------------------------------------------------
-- Afficher les prénoms des abonnés avec le n° des livres qu'ils ont empruntés
SELECT a.prenom, e.id_livre
FROM emprunt e, abonne a
WHERE e.id_abonne = a.id_abonne;

-- Rajoutez vous dans la liste d'abonnés de la bibliothèque
INSERT INTO abonne (prenom) VALUES ('Catherine');
-- Relancer la dernière jointure, vous n'apparaissez pas...

SELECT abonne.prenom, emprunt.id_livre
FROM abonne
LEFT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne;
-- La clause LEFT JOIN permet de rappatrier toutes les données dans la table considérée comme étant de gauche(donc abonne dans notre cas) sans correspondance exigée dans l'autre table (emprunt). C'est ce que l'on appelle une jointure externe.
