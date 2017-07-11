<?php

 require '../../connexion/connexion.php';
//suppression d'un experience
if ($_POST) {
    $efface = $_POST['experience'];
    $sql = "DELETE FROM t_experiences WHERE id_experience = '$efface'";
    $pdoCV -> query($sql);//ou on peut avec exec

}
