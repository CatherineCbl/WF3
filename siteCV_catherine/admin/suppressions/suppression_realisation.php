<?php

 require '../../connexion/connexion.php';
//suppression d'un realisation
if ($_POST) {
    $efface = $_POST['realisation'];
    $sql = "DELETE FROM t_realisations WHERE id_realisation = '$efface'";
    $pdoCV -> query($sql);//ou on peut avec exec

}
