<?php

 require '../../connexion/connexion.php';
//suppression d'un loisir
if ($_POST) {
    $efface = $_POST['loisir'];
    $sql = "DELETE FROM t_loisirs WHERE id_loisir = '$efface'";
    $pdoCV -> query($sql);//ou on peut avec exec

}
