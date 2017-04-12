CREATE DATABASE nom_de_la_base; -- Créer une nouvelle base de données

SHOW DATABASES; -- permet de voir les bases de données

USE nom_de_la_base; -- sélectionner et utiliser la base de données

DROP DATABASE nom_de_la_base; -- supprimer une base de données

DROP table nom_de_la_table; -- supprimer une table

TRUNCATE nom_de_la_table; -- vider la table

--------------------------------------------------------------------------------
-- REQUETE DE SELECTION

-- AFFICHAGE COMPLET
SELECT id_employes, prenom, nom, sexe, service, date_embauche, salaire
FROM employes;

SELECT * FROM employes; -- affichage de la table employes avec le raccourci de l'étoile "*" pour dire "ALL"
-- affiche-moi [* toutes les colonnes] de [la table employes]
--------------------------------------------------------------------------------
-- Quels sont les noms et prenoms des employés travaillant dans l'entreprise?
SELECT nom, prenom FROM employes;

--------------------------------------------------------------------------------
-- Quels sont les différents services occupés par les employés travaillant dans l'entreprise?
SELECT service FROM employes;

--------------------------------------------------------------------------------
-- DISTINCT
-- Affichage des services différents
SELECT DISTINCT service FROM employes;
-- DISTINCT permet d'éliminer les doublons

--------------------------------------------------------------------------------
-- Condition WHERE
-- Affichage des employes du service informatique
SELECT nom, prenom, service FROM employes WHERE service = 'informatique';
-- WHERE = à condition Que
-- WHERE [colonne = valeur]

--------------------------------------------------------------------------------
-- BETWEEN
--Affichage des employes ayant été recrutés entre 2010 et aujourd'hui
SELECT CURDATE();-- Affiche la date du jour
SELECT NOW();-- Affiche la date du jour

SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND CURDATE;
-- BETWEEN + AND = entre ... et ...
-- Pas de différence entre les quotes '' et les guillemets "". Quand il y a une valeur il faut mettre les guillemets ou les quotes, en revanche quand il s'agit d'un chiffre, one ne doit pas les mettre

--------------------------------------------------------------------------------
-- LIKE : valeur approchante
-- Affichage des employes ayant un prenom commencant par la lettre 's'
SELECT prenom FROM employes WHERE prenom LIKE 's%';

-- Je souhaite connaitre le nom des personnes finissant par la lettre "s"
SELECT prenom FROM employes WHERE prenom LIKE '%s';

SELECT prenom FROM employes WHERE prenom LIKE   '%-%'; -- Je souhaite connaitre le prénom des personnes de l'entreprise qui contient un trai d'union dans leur prenom

-- % : peut importe la suite...

-- ID ---- nom --   code postal
-- 1     Appart1    75015
-- 2     Appart2    75011
-- 3     Appart3    75016
-- 4     Appart4    95000

-- SELECT * FROM appartement WHERE code_postal = 75;
-- SELECT * FROM appartement WHERE code_postal LIKE '75%';

--------------------------------------------------------------------------------
-- Affichage de tous les employes (sauf les informaticiens)
SELECT * FROM employes WHERE service != 'informatique'; -- Je souhaite connaitre le nom et prénom de tous les employes de l'entreprise NE travaillant PAS dans le service informatique
-- != différent de ...

-- OPERATEURS DE COMPARAISON
-- =  "est égal"
-- >  "strictement supérieur"
-- <  "strictement inférieur"
-- >=  "inférieur ou égal à"
-- <=  "supérieur ou égal à"
-- <> ou !=  "différent de"

--------------------------------------------------------------------------------
-- Afficher le nom, prenom, service et salaire des employés de l'entreprise ayant un salaire supérieur à 3000€

SELECT nom, prenom, service, salaire FROM employes WHERE salaire > 3000;

--------------------------------------------------------------------------------
-- ORDER BY
-- Affichage des employes dans l'ordre alphabétique
SELECT prenom FROM employes ORDER BY prenom ASC;
SELECT prenom FROM employes ORDER BY prenom;
SELECT prenom FROM employes ORDER BY prenom DESC;
SELECT prenom, salaire FROM employes ORDER BY salaire DESC, prenom ASC;
-- ORDER BY  permet d'effectuer un classement
-- ASC : Ascendant croissant
-- DESC : descendant décroissant
--------------------------------------------------------------------------------
-- LIMIT
-- Affichage des employés 3 par 3
SELECT prenom, nom FROM employes ORDER BY prenom LIMIT 0,3;
-- LIMIT 0,3 : 0 est la position de départ de mon tableau et 3 est le nombre d'employés que je souhaite afficher
--------------------------------------------------------------------------------
-- Affichage des employes avec un salaire annuel
SELECT prenom, salaire*12 FROM employes;
SELECT prenom, salaire*12 AS 'salaire annuel' FROM employes;
-- AS : Alias

--------------------------------------------------------------------------------
-- SUM
-- Affichage de la "masse salariale" sur 12 mois
SELECT SUM(salaire*12) AS 'masse salariale sur une année' FROM employes;
-- SUM : Somme

--------------------------------------------------------------------------------
-- AVG
-- affichage du salaire moyen
SELECT AVG(salaire) AS 'Salaire moyen' FROM employes;
-- AVG : moyenne
-- ROUND
SELECT ROUND(AVG(salaire) ,2) AS 'Salaire moyen' FROM employes;
--ROUND permet d'arrondir ROUND(...,2) le 2 permet d'afficher un chiffre arrondi à 2 chiffres après la virgule
--------------------------------------------------------------------------------
-- COUNT
-- Affichage du nombre de femme(s) travaillant dans l'entreprise
SELECT COUNT(*) AS 'Nombre de femmes' FROM employes WHERE sexe = 'f';
-- COUNT permet de compter

--------------------------------------------------------------------------------
-- MIN/MAX
-- Affichage du salaire minimum / maximum
SELECT MIN(salaire) FROM employes;
SELECT MAX(salaire) FROM employes;

-- Exercice : Afficher le prénom et le salaire de l'employé ayant le salaire le plus petit

SELECT prenom, salaire FROM employes WHERE salaire = (SELECT MIN(salaire) FROM employes);
-- requête détaillée
SELECT prenom, salaire FROM employes WHERE salaire = 1390;

SELECT prenom, salaire FROM employes ORDER BY salaire LIMIT 0,1;
--------------------------------------------------------------------------------
-- IN
-- Je souhaite connaitre le prenom des employes travaillant dans le service comptabilité et le service informatique
SELECT prenom, service FROM employes WHERE service IN('informatique', 'comptabilite');
-- IN permet de sélectionner plusieurs valeurs
-- = Permet de sélectionner une seule valeurs

--------------------------------------------------------------------------------
-- Je souhaite connaitre le prénom des employes ne travaillant pas dans les services informatique et comptabilité

SELECT prenom, service FROM employes WHERE service NOT IN('informatique', 'comptabilite');

-- A l'inverse, pour connaitre le prénom des employés ne faisant pas partie des services comptabilité et informatique, classé par service
SELECT prenom, nom, service FROM employes WHERE service NOT IN('informatique', 'comptabilite') ORDER BY service;

--------------------------------------------------------------------------------
-- Je souhaite connaitre le prenom et le nom des employes du service commercial avec un salaire inférieur ou égal à 2000€
SELECT prenom, nom, service FROM employes WHERE service = 'commercial' AND salaire <= 2000;
-- AND : et... (condition suppléméntaire)

--------------------------------------------------------------------------------
-- OR
-- Exercice : Je souhaite connaitre le prénom et noms des employés du service commercial pour un salaire de 1900 ou 2300
SELECT prenom, nom FROM employes WHERE service = 'commercial' AND (salaire = 1900 OR salaire= 2300);

--------------------------------------------------------------------------------
-- GROUP BY
-- Affichage du nombre d'employés par service
SELECT service, COUNT(*) AS 'nombre' FROM employes GROUP BY service;
-- GROUP BY permet d'effectuer des regroupements
--------------------------------------------------------------------------------
-- REQUETE D'INSERTION
-- ID auto incrémenté

INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire)
VALUES('Catherine','CABEUIL','f','informatique','2017/04/11','10000');
-- Insertion avec choix de l'ID
INSERT INTO employes(id_employes, prenom, nom, sexe, service, date_embauche, salaire)
VALUES(877, 'Catherine','CABEUIL','f','informatique','2017/04/11','10000');
--------------------------------------------------------------------------------
-- REQUETE DE MODIFICATION
UPDATE employes SET salaire = 1100, service='nettoyage ' WHERE id_employes = 350;

REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES(592, 'Laura', 'Blanchet', 'm', 'cuisine', '2017-01-01', 1100); -- Si l'ID n'est pas trouvé, REPLACE se comporte comme un INSERT sinon il se comporte comme un UPDATE

SELECT * FROM employes; -- on observe le contenu de la table après les modifications

--------------------------------------------------------------------------------
-- REQUETE DE SUPPRESSION
DELETE FROM employes WHERE prenom = 'Jean-Pierre';
DELETE FROM employes WHERE id_employes = 350; -- suppression de l'employé ayant l'ID 350

-- Supprimer tout les informaticiens sauf id_employes 701
DELETE FROM employes WHERE service = 'informatique' AND id_employes !=


--------------------------------------------------------------------------------------------------------------------------------------------------------------------

-- Exercice
-- 1. Afficher la proffession de l'employé 547
SELECT service FROM employes WHERE id_employes = 547;

-- 2. Afficher la date d'embauche d'Amandine
SELECT date_embauche FROM employes WHERE prenom = 'Amandine';

-- 3. Afficher le nom de famille de Guillaume
SELECT nom FROM employes WHERE prenom = 'Guillaume';

-- 4. Afficher le nombre d'employés ayant un n°id employes commencant par le chiffre 5
SELECT COUNT(*) AS 'nombre' FROM employes WHERE id_employes LIKE '5%';

-- 5. Afficher le nombre de commerciaux
SELECT COUNT(service) AS 'nombre' FROM employes WHERE service='commercial';

-- 6. Afficher le salaire moyen des informaticiens
SELECT ROUND(AVG(salaire)) AS 'salaire moyen' FROM employes WHERE service = 'informatique';

-- 7. Afficher Les 5 premiers employes après avoir classé leur noms de famille par odre alphabetique
SELECT prenom FROM employes ORDER BY prenom LIMIT 0,5;

-- 8. Afficher le cout des commerciaux sur une année
SELECT SUM(salaire*12) AS 'cout des commerciaux sur une année' FROM employes WHERE service = 'commercial';

-- 9. Afficher le salaire moyen par service (service + salaire moyen)
SELECT service, AVG(salaire) AS 'salaire moyen par service' FROM employes GROUP BY service;

-- 10. Afficher le nombre de recrutement sur l'annee 2010 (+ alias)
SELECT COUNT(date_embauche) AS 'nombre de recrutements en 2010' FROM employes WHERE date_embauche LIKE '2010%';

-- 11. Afficher le salaire moyen appliqué lors des recrutements sur la période allant de 2005 à 2007
SELECT ROUND(AVG(salaire)) AS 'salaire moyen' FROM employes WHERE date_embauche BETWEEN '2005-01-01' AND '2007-01-01';

-- 12. afficher le nombre de service différent
SELECT  COUNT(DISTINCT(service)) AS 'nombre des différents services' FROM employes;

-- 13. Afficher tous les employes (sauf ceux du service production et secrétariat)
SELECT * FROM employes WHERE service NOT IN('production', 'secretariat');

-- 14. Afficher conjoitement le nombre d'homme et de femme dans l'entreprise
SELECT sexe, COUNT(*) FROM employes GROUP BY sexe;

-- 15. Afficher les commerciaux ayant été recruté avant 2005 de sexe masculin et gagnant un salaire supérieur à 2500€
SELECT * FROM employes WHERE date_embauche < '2005-01-01' AND sexe = 'm' AND salaire > 2500;

-- 16. Qui a été embauché en dernier?
SELECT prenom FROM employes WHERE date_embauche = (SELECT MAX(date_embauche)FROM employes);

-- 17. Afficher les informations sur l'employé du service commercial gagnant le salaire le plus élevé
SELECT * FROM employes WHERE service = 'commercial' AND salaire = (SELECT MAX(salaire)FROM employes WHERE service = 'commercial');

-- 18. Afficher le prénom de l'informaticien gagnant le meilleur salaire
SELECT prenom FROM employes WHERE service = 'informatique' AND salaire = (SELECT MAX(salaire)FROM employes WHERE service = 'informatique');

-- 19. Afficher le prenom de l'informaticien ayant été recruté en premiers
SELECT prenom FROM employes WHERE service = 'informatique' AND date_embauche = (SELECT MIN(date_embauche)FROM employes WHERE service = 'informatique');

-- 20. Augmenter chaque employé de 100€
UPDATE employes SET salaire = salaire + 100;

-- 21. Supprimer les employés du service commercial
DELETE FROM employes WHERE service = 'commercial';

-- 22. Donner le salaire et le nom des employes gagnant plus que tous les commerciaux
SELECT prenom, salaire, nom FROM employes WHERE salaire > (SELECT MAX(salaire) FROM employes WHERE service = 'commercial');

-- 23. Combien y a t-il de commerciaux gagnant un salaire inférieur ou avoisinant les 1500€
SELECT COUNT(*) FROM employes WHERE service = 'commercial' AND salaire <= 1500;
