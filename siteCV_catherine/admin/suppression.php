<?php

 require '../connexion/connexion.php';
//suppression d'une compétence
if (isset($_GET['id_loisir'])) {
    $efface = $_GET['id_loisir'];
    $sql = "DELETE FROM t_loisirs WHERE id_loisir = '$efface'";
    $pdoCV -> query($sql);//ou on peut avec exec

}
