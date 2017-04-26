<?php
/*
PDO est une classe prédéfinie de PHP permettant la connexion et l'execution de requete sur la SGBD en PHP
*/


$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

/*
Arguments/parmètres :
1. host = nom du serveur = localhost
2. dbname = nom de la base de données = entreprise
3. pseudo = root
4. mdp = vide sous pc et root pour mac
5. options = erreur mode activé pour faire apparaitre d'eventuelles erreurs de requete SQL, encodage en utf8 dans la BDD

$pdo est une variable representant un objet issu de la classe PDO
$pdo permet d'être connecté à la base et de formuler des requetes SQL
*/

echo '<pre>'; print_r($pdo); echo "</pre>";

//-----------------REQUETE D'INSERTION
//$result = $pdo->exec("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire)VALUES('Catherine', 'Cabeuil', 'f', 'PDG', '2017-01-01', 50000)");
//echo $result . 'enregistrement(s) affecté(s) par la requete INSERT';
/*
Exec() est une methode issue de la classe PDO qui permet de formuler et d'executer des requetes SQL
Dans le cas d'une erreur de requete SQL : boolen FALSE
Dans le cas d'une bonne requete SQL : (INT) 1 ou N selon le nombre de resultats touchés par la requete
*/

//------------------REQUETE DE MODIFICATION
//-- Exercice : modifier le service de l'employé 547 par direction
$result = $pdo->exec("UPDATE employes SET service = 'direction' WHERE id_employes = 547;");
echo $result . 'enregistrement(s) affecté(s) par la requete UPDATE';

//-----------------REQUETE DE SUPPRESSION
//Exercice: SUPPRIMER LES EMPLOYES FAISANT PARTIE DE LA DIRECTION
$result = $pdo->exec("DELETE FROM employes WHERE service = 'direction';");
echo $result . 'enregistrement(s) affecté(s) par la requete DELETE';

//------------------REQUETE DE SELECTION
$result = $pdo->query("SELECT*FROM employes WHERE nom = 'Chevel'");
$employe = $result->fetch(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($employe); echo '</pre>';

//afficher le même résultat que le print_r en passant par le tableau ARRAY

    foreach ($employe as $indices => $valeurs) {
        echo $indices . ":" . $valeurs . "<br>";
    }

/*
Nous avons prevu une variable $result juste avant la requête pour obtenir un retour
Dans le cas d'une erreur de requete SQL, $result contiendra : (boolean) FALSE
Dans le cas d'une bonne requête SQL , $result contiendra : un autre objet issu d'une autre classe PDOSTATEMENT

fetch(PDO::FETCH_ASSOC) permet de rendre exploitable un resultat sous forme de tableau ARRAY associatif

$employe est donc un tableau ARRAY associatif
*/
// Exercice : selectionner toute la table employes. A l'aide d'une boucle while afficher successivement la phrase : Bonjour je suis PRENOM NOM du service SERVICE pour tous les employes de l'entreprise

$resultat = $pdo->query("SELECT*FROM employes");
while($employe = $resultat->fetch(PDO::FETCH_ASSOC))
{

    echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service]<br>";
}
echo $resultat->rowCount() . ' enregistrement(s) récupéré(s) par la requête SELECT';

/*
Nous utilisons une boucle while parce que nous avons plusieurs lignes d'enregistrement à récupérer
fetch(PDO::FETCH_ASSOC) permet de rendre exploitable le resultat sous forme de tableau ARRAY
$employes est donc un tableau ARRAY associatif

rowCount() est une méthode issue de la classe PDOSTATEMENT permettant d'observer le nombre d'enregistrements récupérés et affichés par une requete
*/

$resultat = $pdo->query("SELECT * FROM employes");
echo '<table border="1" style="border-collapse: collapse;"><tr>';
for($i = 0; $i < $resultat->columnCount(); $i++)
{
    $colonne = $resultat->getcolumnMeta($i);
    echo '<td>' . $colonne['name'] . '</td>';
}
echo '</tr>';
while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
{
    echo '<tr>';
    foreach ($ligne as $indice => $informations) {
        echo '<td>' . $informations. '</td>';
    }
    echo '</tr>';
}
echo '</table>';

/*
columnCount() est une methode issue de la classe PDOSTATEMENT qui nous permettra de savoir combien il y a de champs/colonnes au total

la boucle for est donc présente pour répéter l'action d'affichage et le traitement puisqu'il ya plusieurs champs/colonnes à afficher

Pour consulter le nom des champs/colonnes de la table SQL, nous utiliserons la methode getcolumnMeta() qui nous permettra de récolter des informations sur les champs/colonnes sous forme de tableau ARRAY

$colonne est donc un tableau ARRAY
*/
