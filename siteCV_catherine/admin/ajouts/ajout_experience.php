<?php
 require '../../connexion/connexion.php';

//insertion

    if ($_POST) {
        $experience = addslashes($_POST['titre_e']);
        $entreprise = addslashes($_POST['sous_titre_e']);
        $description = addslashes($_POST['description_e']);
        $date = addslashes($_POST['dates_e']);
        $pdoCV->exec(" INSERT INTO t_experiences VALUES(NULL, '$experience', '$entreprise', '$date', '$description', '$_SESSION[id_utilisateur]')");//mettre $id_utilisateur quand on l'aura en variable de session
        $lastinsert = $pdoCV->lastInsertId();
        $data = $pdoCV->query("SELECT * FROM t_experiences WHERE id_experience='".$lastinsert."' ");
        $data = $data->fetch();
        echo json_encode($data);
        // var_dump($_POST);

    }
