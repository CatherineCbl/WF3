<?php
// Exercice : créer un formulaire HTML avec les champs corespondant à la table employes(prenom, nom, sexe, service, date_embauche, salaire)
//Connectez vous à la BDD et éxecuter une requête d'INSERTION
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


echo '<pre>';print_r($_POST);echo '</pre>';
if ($_POST) {
$result = $pdo->exec("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire)VALUES('$_POST[prenom]', '$_POST[nom]', '$_POST[sexe]', '$_POST[service]', '$_POST[date_embauche]', '$_POST[salaire]')");
    echo $result . 'enregistrement(s) affecté(s) par la requete INSERT<br>';


}
 ?>

 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Formulaire mysqli</title>
         <style>
             label{float: left; width: 95px; font-style: italic; font-family: calibri;}
             h1{margin: 0 0 10px 200px; font-family: Calibri;}
         </style>
     </head>
     <body>
         <h1>Formulaire PDO</h1>
        <form class="" action="" method="post">
            <label for="prenom">Prénom</label><br />
            <input type="text" name="prenom" value=""><br />

            <label for="nom">Nom</label><br />
            <input type="text" name="nom" value=""><br />

            <legend>Civilité</legend>
            <label for="sexe"></label>
            m:<input type="radio" name="sexe" value="m" checked /><br />
            f:<input type="radio" name="sexe" value="f" /><br />


            <label for="service">Service</label><br />
            <input type="text" name="service" value=""><br />

            <label for="date_embauche">Date d'embauche</label><br />
            <input type="text" name="date_embauche" value=""><br />

            <label for="salaire">Salaire</label><br />
            <input type="text" name="salaire" value=""><br />

            <input type="submit" name="" value="Envoi"><br />
        </form>
     </body>
 </html>
