<?php require '../connexion/connexion.php' ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Test Connexion</title>
        <link rel="stylesheet" href="css/monstyle.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    </head>
    <body>
        <?php
        $sql = $pdoCV->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1' ");
        $ligne = $sql->fetch();//va chercher sur une ligne!

         ?>
         <p>Coucou  <?php echo $ligne['prenom'].' '.$ligne['nom']; ?> !</p>
    </body>
</html>
