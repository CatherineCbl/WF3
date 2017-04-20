<?php
// 1. Evaluation / Exercice 1-1. FORMULAIRE POST
// Cr�er un formulaire en affichant les saisies r�cup�r�es sur la m�me page.
// Champ � pr�voir (contexte : produit) : titre, couleur, taille, poids, prix, description, stock, fournisseur.
// ---------------------------
if($_POST)// si l'on clique sur le bouton envoi
{
echo "Titre : " . $_POST['titre'] . "<br>";
echo "Couleur : " . $_POST['couleur'] . "<br>";
echo "Taille : " . $_POST['taille'] . "<br>";
echo "Poids : " . $_POST['poids'] . "<br>";
echo "Prix : " . $_POST['prix'] . "<br>";
echo "Description : " . $_POST['description'] . "<br>";
echo "Stock : " . $_POST['stock'] . "<br>";
echo "Fournisseur : " . $_POST['fournisseur'] . "<br>";
}
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Exercice 1</title>
        <style>
            label{float: left; width: 95px; font-style: italic; font-family: calibri;}
            h1{margin: 0 0 10px 200px; font-family: Calibri;}
        </style>
    </head>
    <body>
        <hr>
        <h1>Produit</h1>
        <form method="post">
            <label for="titre">Titre</label><br>
            <input type="text" name="titre" value=""><br>

            <label for="couleur">Couleur</label><br>
            <input type="text" name="couleur" value=""><br>

            <label for="taille">Taille</label><br>
            <input type="text" name="taille" value=""><br>

            <label for="poids">Poids</label><br>
            <input type="text" name="poids" value=""><br>

            <label for="prix">Prix</label><br>
            <input type="text" name="prix" value=""><br>

            <label for="description">Description</label><br>
            <input type="text" name="description" value=""><br>

            <label for="stock">Stock</label><br>
            <input type="text" name="stock" value=""><br>

            <label for="fournisseur">Fournisseur</label><br>
            <input type="text" name="fournisseur" value=""><br>

            <input type="submit" name="" value="ENVOI">
        </form>
    </body>
</html>
