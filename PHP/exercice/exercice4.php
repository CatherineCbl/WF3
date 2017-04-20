<?php
// 4. Evaluation / Exercice 2-1. LIEN GET
// Cr�er une page avec deux liens : homme, femme.
// R�cup�rer le texte du lien cliqu� en affichant le message "Vous �tes un Homme" ou "Vous �tes une femme" (exemple).
// ---------------------------
if ($_GET) {
    echo "vous êtes un(e)" . $_GET['sexe'];
}
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Exercice 4</title>
     </head>
     <body>
         <a href="exercice4.php?sexe=homme">Homme</a>
         <a href="exercice4.php?sexe=femme">Femme</a>
     </body>
 </html>
