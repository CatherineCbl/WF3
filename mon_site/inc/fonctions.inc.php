<?php
/********************************* FONCTIONS MEMBRES *******************************/
function executeRequete($req)
{
    global $mysqli; //permet d'avoir accès à la variable $mysqli définie dans l'espace global à l'intérieur de notre fonction (espace local)
    $resultat = $mysqli->query($req); // on éxecute la requête reçue en argument
    if(!$resultat)
    {
        die("Erreur sur la requete sql.<br>Message :" . $mysqli->error ."<br>Code : " . $req); // si la req echoue, on va mourir(die) avec le message d'erreur
    }
    return $resultat; // on retourne un objet issue de la classe mysqli_result (en cas de requete SELECT, autre requete : true ou false)
}

//---------------------------------------------------------------------------------
//debug($_POST);
function debug($var, $mode = 1)
{
    echo '<div style="background: orange; padding: 5px; float: right; clear: both;">';
    $trace = debug_backtrace();// Fonction prédéfinie retournant un tableau ARRAY contenant des infos telles que la ligne et le fichier où est executé la fonction
    $trace = array_shift($trace);// extrait la première valeur d'un tableau et la retourne
    echo "Debug demandé dans le fichier : $trace[file] à la ligne $trace[line].<hr>";
    if ($mode == 1) {
        echo "<pre>"; print_r($var); echo "</pre>";
    }
    else {
        echo "<pre>"; var_dump($var); echo "</pre>";
    }
    echo "</div>";
}
