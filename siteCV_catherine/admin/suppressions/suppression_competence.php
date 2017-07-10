<?php

 require '../../connexion/connexion.php';
//suppression d'une compétence
if ($_POST) {
    $efface = $_POST['competence'];
    $sql = "DELETE FROM t_competences WHERE id_competence = '$efface'";
    $pdoCV -> query($sql);//ou on peut avec exec

}
