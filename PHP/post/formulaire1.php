<?php
if($_POST)// si l'on clique sur le bouton envoi
{
echo "Prénom : " . $_POST['prenom'] . "<br>";
echo "Description : " . $_POST['description'] . "<br>";
}
echo "<pre>";print_r($_POST);echo "</pre>";
// au premeier chargement de la page sans le if($_POST) nous avons 2 erreurs undefined, ce qui est tout à fait normal puisqu'il n'y a pas eu d'action sur le formulaire, si l'on recharge la page, les erreurs disparaissent puisque nous avons cliqué sur le bouton envoi, l'interpréteur détecte
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulaire 1</title>
        <style>
            label{float: left; width: 95px; font-style: italic; font-family: calibri;}
            h1{margin: 0 0 10px 200px; font-family: Calibri;}
        </style>
    </head>
    <body>
        <hr>
        <form method="post" action=""><!-- method : comment vont circuler les données? - action: url de destination -->
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom"><br>
            <br>
            <label for="description">Description</label><br>
            <textarea id="description" name="description"></textarea>
            <br>
            <input type="submit" name="" value="ENVOI">
        </form>
    </body>
</html>
