<?php
// 3. Evaluation / Exercice 1-3. FORMULAIRE POST
// Cr�er un formulaire en affichant les saisies r�cup�r�es et en controlant que le pseudo soit compris entre 3 et 10 caract�res maximum (sinon pr�voir un message d'erreur).
// Champ � pr�voir (contexte : membre) : pseudo, mdp, email.
// ---------------------------
if ($_POST) {
    if (iconv_strlen($_POST['pseudo']) < 3 OR iconv_strlen($_POST['pseudo']) > 10) {
        echo "Veuillez entrer un pseudo valide";
    }
}
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Exercice 3</title>
         <style>
             label{float: left; width: 95px; font-style: italic; font-family: calibri;}
             h1{margin: 0 0 10px 200px; font-family: Calibri;}
         </style>
     </head>
     <body>
         <hr>
         <h1>Membre</h1>
         <form class="" action="" method="post">
             <label for="pseudo">Pseudo</label><br>
             <input type="text" name="pseudo" value=""><br>

             <label for="mdp">Mot de passe</label><br>
             <input type="text" name="mdp" value=""><br>

             <label for="email">Email</label><br>
             <input type="text" name="email" value=""><br>

             <input type="submit" name="" value="ENVOI">
         </form>
     </body>
 </html>
