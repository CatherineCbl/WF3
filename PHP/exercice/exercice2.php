<?php
// 2. Evaluation / Exercice 1-2. FORMULAIRE POST
// Cr�er un formulaire en affichant les saisies r�cup�r�es sur deux pages diff�rentes.
// Champ � pr�voir (contexte : voiture) : marque, modele, couleur, km, carburant, annee, prix, puissance, options.
// ---------------------------

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Exercice 2</title>
        <style>
            label{float: left; width: 95px; font-style: italic; font-family: calibri;}
            h1{margin: 0 0 10px 200px; font-family: Calibri;}
        </style>
    </head>
    <body>
        <h1>Voiture</h1>
        <form class="" action="exo2.php" method="post">
            <label for="marque">Marque</label><br>
            <input type="text" name="marque" value=""><br>

            <label for="modele">Modèle</label><br>
            <input type="text" name="modele" value=""><br>

            <label for="couleur">Couleur</label><br>
            <input type="text" name="couleur" value=""><br>

            <label for="km">Km</label><br>
            <input type="text" name="km" value=""><br>

            <label for="carburant">Carburant</label><br>
            <input type="text" name="carburant" value=""><br>

            <label for="annee">Année</label><br>
            <input type="text" name="annee" value=""><br>

            <label for="prix">Prix</label><br>
            <input type="text" name="prix" value=""><br>

            <label for="puissance">Puissance</label><br>
            <input type="text" name="puissance" value=""><br>

            <label for="options">Options</label><br>
            <input type="text" name="options" value=""><br>

            <input type="submit" name="" value="ENVOI">
        </form>
    </body>
</html>
