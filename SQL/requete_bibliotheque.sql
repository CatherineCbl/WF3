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
    (SELECT id_abonne FROM abonne WHERE prenom('Chloe')));
