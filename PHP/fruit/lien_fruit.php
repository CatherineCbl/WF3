<?php
/* Exercice :
1.Effectuer 4 liens HTML portant sur la même page avec le nom des fruits
2.Faites en sorte d'envoyer "cerises" dans l'URL si l'on clic sur le lien "cerises"
3.Tenter d'afficher "cerises" sur la page web si l'on a cliqué dessus (si "cerises" est passé dans l'URL par conséquent)
*/
include ('fonction.inc.php');
if ($_GET) {
    echo "Votre fruit est : " . $_GET['choix_fruit'] . "<br>";
    echo calcul($_GET['choix_fruit'], 1000) . '<br>';
}
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title></title>
     </head>
     <body>
        <a href="?choix_fruit=cerises">Cerises</a>
        <a href="?choix_fruit=bananes">Bananes</a>
        <a href="?choix_fruit=pommes">Pommes</a>
        <a href="?choix_fruit=peches">Pêches</a>
     </body>
 </html>
