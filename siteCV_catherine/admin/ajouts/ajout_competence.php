<?php
 require '../../connexion/connexion.php';
//insertion


    if ($_POST) {
        $competence = addslashes($_POST['competence']);
        $pdoCV->exec(" INSERT INTO t_competences VALUES(NULL, '$competence', '$_SESSION[id_utilisateur]')");//mettre $id_utilisateur quand on l'aura en variable de session
        $lastinsert = $pdoCV->lastInsertId();
        $data = $pdoCV->query("SELECT * FROM t_competences WHERE id_competence='".$lastinsert."' ");
        $data = $data->fetch();
        echo json_encode($data);
    }
