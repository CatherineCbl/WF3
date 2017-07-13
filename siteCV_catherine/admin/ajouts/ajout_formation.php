<?php
 require '../../connexion/connexion.php';

//insertion

    if ($_POST) {
        $formation = addslashes($_POST['titre_f']);
        $ecole = addslashes($_POST['sous_titre_f']);
        $description = addslashes($_POST['description_f']);
        $date = addslashes($_POST['dates_f']);
        $pdoCV->exec(" INSERT INTO t_formations VALUES(NULL, '$formation', '$ecole', '$date', '$description', '$_SESSION[id_utilisateur]')");//mettre $id_utilisateur quand on l'aura en variable de session
        $lastinsert = $pdoCV->lastInsertId();
        $data = $pdoCV->query("SELECT * FROM t_formations WHERE id_formation='".$lastinsert."' ");
        $data = $data->fetch();
        echo json_encode($data);

    }
