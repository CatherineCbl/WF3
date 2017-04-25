<?php
/*
1.Créer un formulaire permettant de selectionner un fruit et saisir un poids
2.traitement permettant d'afficher le prix en passant par la fonction déclarée calcul()
3.Faites en sorte de garder le dernier fruit selectionné et le dernier poids saisi dans le formulaire
*/
include ('fonction.inc.php');

if ($_POST) {
    echo "votre fruit est : " .  $_POST['fruits'] . "<br>";
    echo calcul($_POST['fruits'], $_POST['poids']);
}

 ?>

 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Formulaire fruit</title>
         <style>
             label{float: left; width: 95px; font-style: italic; font-family: calibri;}
             h1{margin: 0 0 10px 200px; font-family: Calibri;}
         </style>
     </head>
     <body>
         <h1>Formulaire fruits</h1>
         <form class="" action="" method="post">
             <label for="">Fruits</label><br />
             <select class="" name="fruits">
                 <option value="cerises" <?php if(isset($_POST['fruits']) && $_POST['fruits'] == "cerises") echo "selected" ?>)>Cerises</option>
                 <option value="bananes" <?php if(isset($_POST['fruits']) && $_POST['fruits'] == "bananes") echo "selected" ?>>Bananes</option>
                 <option value="pommes" <?php if(isset($_POST['fruits']) && $_POST['fruits'] == "pommes") echo "selected" ?>>Pommes</option>
                 <option value="peches" <?php if(isset($_POST['fruits']) && $_POST['fruits'] == "peches") echo "selected" ?>>Pêches</option><!-- SI il ya un fruit selecetionné dans le formulaire et que le fruitsélectionné est "peches" sélectionne le fruit peches -->
             </select><br />
             <!-- Il ne faut surtout pas oublier les name sur le formulaire HTML -->

             <label for="">Poids</label><br />
             <input type="text" name="poids" value="<?php if(isset($_POST['poids'])) echo $_POST["poids"] ?>"><br />
             <!-- IL NE FAUT SURTOUT PAS OUBLIER LES NAME SUR LE FORMULAIRE HTML -->
             <input type="submit" name="" value="calculer"><br />
         </form>
     </body>
 </html>
