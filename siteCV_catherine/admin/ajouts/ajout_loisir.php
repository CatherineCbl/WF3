<?php
 require '../../connexion/connexion.php';

//insertion

    if ($_POST) {
        $loisir = addslashes($_POST['loisir']);
        $pdoCV->exec(" INSERT INTO t_loisirs VALUES(NULL, '$loisir', '$_SESSION[id_utilisateur]')");//mettre $id_utilisateur quand on l'aura en variable de session
        $lastinsert = $pdoCV->lastInsertId();
        $data = $pdoCV->query("SELECT * FROM t_loisirs WHERE id_loisir='".$lastinsert."' ");
        $data = $data->fetch();
        echo json_encode($data);

    }
