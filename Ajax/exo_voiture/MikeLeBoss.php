<?php

require 'crud.php';
$dbvoiture = new Crud("localhost", "root", "", "voiture");
$dbvoiture->create($_POST, "voiture");
var_dump($_POST);

 ?>
