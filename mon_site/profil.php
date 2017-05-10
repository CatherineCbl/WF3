<?php
require_once("inc/init.inc.php");
if (!internauteEstConnecte()) // si le membre n'est pas connecté, il ne doit pas avoir accès à la page profil
{
    header("location:connexion.php");
}


//Exercice : Afficher sur la page profil, le pseudo, email, ville, code postal, adrsse du membre connecté en passant par le fichier $_SESSION
//debug($_SESSION);//dès lors que la session_star est inscrit, les sessions sont disponibles sur toutes les pages du site

$contenu .= '<p class="centre">Bonjour <strong>' . $_SESSION['membre']['pseudo'] . '</strong></p>';
$contenu .= '<div class="cadre"><h2>Voici vos informations de profil</h2>';
$contenu .= '<p> Votre email est: ' . $_SESSION['membre']['email'] . '<br>';
$contenu .= 'Votre ville est: ' . $_SESSION['membre']['ville'] . '<br>';
$contenu .= 'Votre code postal est: ' . $_SESSION['membre']['code_postal'] . '<br>';
$contenu .= 'Votre adresse est: ' . $_SESSION['membre']['adresse'] . '</p></div><br><hr>';
$contenu .= '<a href="?action=commandes">Commandes en cours</a><br>';
$contenu .= '<a href="membres.php">Modifier vos informations</a><br>';
$contenu .= '<a href="?action=suppression&id_membre=' . $_SESSION['membre']['id_membre'] . '" OnClick="return(confirm(\'En êtes vous certain?\'))">Supprimer votre compte</a><br>';

$resultat = executeRequete("SELECT * FROM commande WHERE id_membre = '" . $_SESSION['membre']['id_membre'] . "'");
//debug($resultat);



if (isset($_GET['action']) && $_GET['action'] == 'suppression') {
    executeRequete("DELETE FROM membre WHERE id_membre = '" . $_SESSION['membre']['id_membre'] . "'");
    unset($_SESSION['membre']);
    header("location:connexion.php");
}



if (isset($_GET['action']) && $_GET['action'] == 'commandes') {


    $contenu .= '<h2>Affichage des commandes en cours</h2>';
    //$contenu .= 'Nombre de commandes : ' . $resultat->num_rows;
    $contenu .= '<table border="1" cellpading="5"><tr>';

    while($colonne = $resultat->fetch_field())
    {
        $contenu .= '<th>' . $colonne->name . '</th>';
    }

    $contenu .= '</tr>';

    while ($ligne = $resultat->fetch_assoc()) {
        $contenu .= '<tr>';
        foreach ($ligne as $indice => $information) {
                $contenu .= '<td>' . $information . '</td>';
        }

    }

    $contenu .= '</table><br><hr><br>';
    debug($ligne);
}
//debug($_SESSION);

require_once("inc/haut.inc.php");
echo $contenu;
require_once("inc/bas.inc.php");
 ?>
