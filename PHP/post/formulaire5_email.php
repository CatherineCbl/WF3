<?php
// Créer un formulaire avec les champs: destinataire, expéditeur, sujet, message. Contrôler les champs du formulaire, les afficher en haut de la page.
if ($_POST) {
    echo '<pre>'; print_r($_POST); echo '</pre>';
    $_POST['expediteur'] = 'From : '. $_POST['expediteur'];
    mail($_POST['destinataire'], $_POST['sujet'], $_POST['message'], $_POST['expediteur']);// La fonction mail reçoit toujours 4 ARGUMENTS et l'ordre a une importance cruciale. Comme dans la plupart des fonctions, il faut respecter le nombre et l'ordre des arguments qu'on transmet.
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
         <h1>Formulaire</h1>
         <form class="" action="" method="post">
             <label for="destinataire">Destinataire</label><br />
             <input type="text" name="destinataire" value=""><br />

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
