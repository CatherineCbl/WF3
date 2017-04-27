<?php
// Exercice : créer un formulaire HTML avec les champs corespondant à la table employes(prenom, nom, sexe, service, date_embauche, salaire)
//Connectez vous à la BDD et éxecuter une requête d'INSERTION
$pdo = new PDO('mysql:host=localhost;dbname=boutique', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


echo '<pre>';print_r($_POST);echo '</pre>';
if ($_POST) {
    if ($_POST['reference'] == null) {
        echo "<p style='color: red;'>ERREUR, référence non renseignée</p>" . "<br>";
     }
     if (iconv_strlen($_POST['titre']) < 3 OR iconv_strlen($_POST['titre']) > 20) {
         echo '<p style="color: red;"><strong>Renseignez un titre valide</strong></p> '. "<br>";
     }
    if($_POST['reference'] != null AND iconv_strlen($_POST['titre']) > 3 AND iconv_strlen($_POST['titre']) < 20) {
        $result = $pdo->exec("INSERT INTO produits(reference, categorie, titre, description, couleur, taille, prix, stock)VALUES('$_POST[reference]', '$_POST[categorie]', '$_POST[titre]', '$_POST[description]', '$_POST[couleur]', '$_POST[taille]', '$_POST[prix]', '$_POST[stock]')");
        echo '<p style="color: green;"><strong>Produit bien enregistré</strong></p>' ."<br>";

    }


}

//------------------REQUETE DE MODIFICATION
$result = $pdo->exec("UPDATE produits SET reference = '1453' WHERE id_produit = 1;");
echo $result . 'enregistrement(s) affecté(s) par la requete UPDATE';

//-----------------REQUETE DE SUPPRESSION
$result = $pdo->exec("DELETE FROM produits WHERE titre = 'direction';");
echo $result . 'enregistrement(s) affecté(s) par la requete DELETE';







$resultat = $pdo->query("SELECT * FROM produits");
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
 ?>

 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Formulaire mysqli</title>
         <style>
             label{float: left; width: 95px; font-style: italic; font-family: calibri;}
             h1{margin: 0 0 10px 200px; font-family: Calibri;}
         </style>
     </head>
     <body>
         <h1>Produit</h1>
        <form class="" action="" method="post">
            <label for="reference">Référence</label><br />
            <input type="text" name="reference" value=""><br />

            <label for="categorie">Catégorie</label><br />
            <input type="text" name="categorie" value=""><br />

            <label for="titre">Titre</label><br />
            <input type="text" name="titre" value=""><br />

            <label for="description">Description</label><br />
            <input type="text" name="description" value=""><br />

            <label for="couleur">Couleur</label><br />
            <input type="text" name="couleur" value=""><br />

            <label for="taille">Taille</label><br />
            <select name="taille">
                <optgroup>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </optgroup>
            </select><br />

            <label for="prix">Prix</label><br />
            <input type="text" name="prix" value=""><br />

            <label for="stock">Stock</label><br />
            <input type="text" name="stock" value=""><br />

            <input type="submit" name="" value="Envoi"><br />
        </form>
     </body>
 </html>
