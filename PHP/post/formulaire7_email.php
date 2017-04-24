<?php
/*
Exercice: Réaliser un formualire de contact pour un futur projet.
    1. Vous devez procéder aux changements vous premettant d'être l'unique destinataire du Message

    2.Vous devez ajouter les champs : Société, nom, prénom. Sans retirer pour autant les champs actuels
*/
if ($_POST) {
    echo '<pre>'; print_r($_POST); echo '</pre>';

    $_POST['expediteur'] = "From : $_POST[expediteur] \n";
    $_POST['expediteur'] .= "MIME-Version: 1.0 \r\n";
    $_POST['expediteur'] .= "Content-type/ text/html; charset=utf-8 \r\n";

    $_POST['message'] = "Nom : $_POST[nom] \r\n";
    $_POST['message'] .= "Prénom : $_POST[prenom] \r\n";
    $_POST['message'] .= "Société : $_POST[societe] \r\n";// nous mettons toutes les informations dans le message sans oublier le message en question

    mail("catherine.cabeuil@lepoles.com", $_POST['sujet'], $_POST['message'], $_POST['expediteur']);// la fonction mail() reçoit toujours 4 ARGUMENTS et l'ordre a une importance cruciale. Comme dans la plupart des fonctions, il faut respecter le NOMBRE et l'ORDRE des arguments que l'on transmet

    //on modifie l'argument destinataire de la fonction mail() en insérant notre propre adresse qui nous permettra d'être l'unique destinataire
}

 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Formulaire</title>
         <style>
             label{float: left; width: 95px; font-style: italic; font-family: calibri;}
             h1{margin: 0 0 10px 200px; font-family: Calibri;}
         </style>
     </head>
     <body>
         <h1>Formulaire 7 email</h1>
         <form class="" action="" method="post">
             <label for="societe">Société</label><br />
             <input type="text" name="societe" value=""><br />

             <label for="nom">Nom</label><br />
             <input type="text" name="nom" value=""><br />

             <label for="prenom">Prénom</label><br />
             <input type="text" name="prenom" value=""><br />

             <label for="expediteur">Expéditeur</label><br />
             <input type="text" name="expediteur" value=""><br />

             <label for="sujet">Sujet</label><br />
             <input type="text" name="sujet" value=""><br />

             <label for="message">Message</label><br/>
             <textarea name="message" rows="4" cols="22"></textarea><br/>

             <input type="submit" name="" value="envoyer">
         </form>
     </body>
 </html>
