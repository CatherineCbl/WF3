<?php
 require '../../connexion/connexion.php';

//insertion

    if ($_POST) {
        $realisation = addslashes($_POST['titre_r']);
        $description = addslashes($_POST['description_r']);
        $date = addslashes($_POST['dates_r']);
        $pdoCV->exec(" INSERT INTO t_realisations VALUES(NULL, '$realisation', NULL,'$date', '$description', '$_SESSION[id_utilisateur]')");//mettre $id_utilisateur quand on l'aura en variable de session
        $lastinsert = $pdoCV->lastInsertId();
        $data = $pdoCV->query("SELECT * FROM t_realisations WHERE id_realisation='".$lastinsert."' ");
        $data = $data->fetch();
        echo json_encode($data);



    }
