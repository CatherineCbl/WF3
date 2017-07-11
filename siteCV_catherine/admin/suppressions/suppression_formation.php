<?php

 require '../../connexion/connexion.php';
//suppression d'un formation
if ($_POST) {
    $efface = $_POST['formation'];
    $sql = "DELETE FROM t_formations WHERE id_formation = '$efface'";
    $pdoCV -> query($sql);//ou on peut avec exec

}
