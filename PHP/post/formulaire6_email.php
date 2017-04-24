<?php
if ($_POST) {
    echo '<pre>'; print_r($_POST). echo '</pre>';
    $_POST['expediteur'] = "From : $_POST['expediteur'] \n";
    $_POST['expediteur'] .= "MIME-Version: 1.0 \r\n";//MIME est un standard d'envoi de mail, il n'existe qu'une seule version
    $_POST['expediteur'] .= "Content-type/ text/html; charset=utf-8 \r\n";
    //Grace à cette ligne de code, on pourra envoyer directement du HTML dans le message (prtaique pour l'envoi d'une newsletter) ex : <div style="background: #d0d0d0;>Bonjour !</div>"
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
