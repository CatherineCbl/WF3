<?php

require 'crud.php';//appelle le fichier crud.php afin d'en utiliser les fonctions
$dbvehicule = new Crud("localhost", "root", "", "vehicule");//nouvelle connexion a la BDD
$dbvehicule->create($_POST, "voiture");//INSERT

 ?>
