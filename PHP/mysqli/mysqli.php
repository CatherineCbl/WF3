<?php
// Mysqli est une classe prédéfinie de PHP permettant la connexion et l'execution de requete sur le SGBD mysql en PHP

$mysqli = new Mysqli ("localhost", "root", "", "entreprise");
//les arguments/paramètres correspondent à
/*
nom du serveur = localhost
pseudo = root
mot de passe = sous xampp, le mot de passe est vide - sur MAC le mot de passe est root
nom de la bas de données = entreprise

$mysqli est un objet issu de la classe Mysqli, elle nous permet d'être connecté à la BDD et de formuler des requetes
*/
echo '<pre>'; print_r($mysqli); echo '</pre>';

$mysqli->query("mauvaise requête volontaire.....................");
echo $mysqli->error . "<br>";
// query() est une fonction/methode issu de la classe Mysqli qui nous permet de formuler et d'executer des requetes SQL
// la propriété nommée error de l'objet Mysqli nous permet d'avoir accès aux eventuelles errers SQL

//-------- REQUETE INSERTION
$result = $mysqli->query("INSERT INTO employes(prenom, nom, sexe, date_embauche, salaire)VALUES('Catherine', 'Cabeuil', 'f', '2015-01-01', '15000')");
echo $mysqli->affected_rows . 'enregistrement(s) affecté(s) par la requete INSERT<br>';
var_dump($result);
/*
Dans le cas d'une bonne requête SQL, $result contiendra : (boolean) TRUE
Dans le cas d'une mauvaise requête SQL, $result contiendra : (boolean) FALSE

La propriété affected_rows issu de l'objet $mysqli permet d'observer le nombre d'enregistrements affectés par une requete
*/

//------------ REQUETE DE MODIFICATION
// Exercice : modifier le salaire de l'employes 350 : 5100 par 1100
$result = $mysqli->query("UPDATE employes SET salaire = 1100 WHERE id_employes = 350;");
echo $mysqli->affected_rows . 'enregistrement(s) affecté(s) par la requete UPDATE<br>';
var_dump($result);
/*
Dans le cas d'une bonne requête SQL, $result contiendra : (boolean) TRUE
Dans le cas d'une mauvaise requête SQL, $result contiendra : (boolean) FALSE
*/

//------------REQUETE DE SUPPRESSION
// Exercice : supprimer l'employe n°350
$result = $mysqli->query("DELETE FROM employes WHERE id_employes = 350;");
echo $mysqli->affected_rows . 'enregistrement(s) affecté(s) par la requete DELETE<br>';
var_dump($result);
 ?>
