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
//$result = $mysqli->query("INSERT INTO employes(prenom, nom, sexe, date_embauche, salaire)VALUES('Catherine', 'Cabeuil', 'f', '2015-01-01', '15000')");
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

//------------REQUETE DE SELECTION
$result = $mysqli->query("SELECT*FROM employes WHERE prenom='Julien'");
$employe = $result->fetch_assoc();
//echo '<pre>'; print_r($result); echo '</pre>';
echo '<pre>'; print_r($employe); echo '</pre>';

echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service]<br>";
echo "Bonjour je suis " . $employe['prenom'] . " " . $employe['nom'] . " du service " .  $employe['service'] . "<br>";

/*
Nous avons prévu une variable $result juste avant la requete pour avoir un retour
Dans le cas d'une erreur de requete SQL, $result contiendra : boolean FALSE
Dans le cas d'une bonne requete SQL, $result contiendra : (objet)MYSQLI_RESULT, on obtient un autre objet issu d'une autre classe : MYSQLI_RESULT

fetch_assoc() :
le résultat sous forme d'objet MYSQLI_RESULT n'est pas exploitable en l'état
La méthode fetch_assoc() issu de la classe MYSQLI_RESULT permet de rendre ce résultat exploitable sous forme de tableau ARRAY associatif

$employe est donc un tableau ARRAY associatif (associatif = avec des clés nominatives)
*/

$result = $mysqli->query("SELECT*FROM employes");
while($employe = $result->fetch_assoc())
{
    //echo '<pre>'; print_r($employe); echo '</pre>';
    echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service]<br>";
}
echo $result->num_rows . 'enregistrement(s) récupéré(s) par la requête SELECT';

/*
Dans le cas d'une erreur de requete SQL, $result contiendra : boolean FALSE
Dans le cas d'une bonne requete SQL, $result contiendra : (objet)MYSQLI_RESULT, on obtient un autre objet issu d'une autre classe : MYSQLI_RESULT

While :
Nous avons plusieurs lignes d'enregistrements, il est donc nécessaire de répéter le traitement fetch_assoc() afin de rendre le résultat exploitable sous forme d'ARRAY
La boucle permet d'afficher chaque ligne de la table (tant que l'on possède des enregistrements, on les affiche)

$employe est donc un ARRAY associatif
*/

$resultat = $mysqli->query("SELECT*FROM employes");

echo '<table border="1" style="border-collapse: collapse;"><tr>';
while($colonne = $resultat->fetch_field())
{
    echo '<th>' . $colonne->name . '</th>';
}
echo "</tr>";
while($ligne = $resultat->fetch_assoc())
{
    echo '<tr>';
    foreach ($ligne as $indice => $informations) {
        echo "<td>" . $informations . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
/*
Pour consulter le nom des champs/colonnes de la table SQL? Nous aurons besoin d'utiliser la methode fetch_field() issu de la classe MYSQLI_RESULT qui permet de recolter des informations qur les champs/colonnes

la boucle while est présente pour répéter cette action puisqu'il y a plusieurs champs/colonnes à afficher
On obtient un objet $colonne issue d'une autre classe : Stdclass
$colonne->name : permet de récolter les noms des champs de la tableau

fetch_assoc issu de la classe MYSQLI_RESULT permet de traiter le résultat et le rendre exploitable sous forme de tableau ARRAY.

while permet de répéter cette action tant qu'il y a des résultats et de passer à la ligne d'enregistrement suivante pour faire avancer les traitements

La boucle foreach va nous permettre de parcourir notre tableau ARRAY par la variable $ligne et d'afficher chacune des informations contenues à l'intérieur

En résumé :
la boucle while est présente pour traiter chaque employé(et avancer sur l'meployé suivant) tandis que la boucle foreach est présente pour traiter et afficher chaque information pour chaque employé.
*/
 ?>
