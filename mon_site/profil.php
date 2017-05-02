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
$contenu .= 'Votre adresse est: ' . $_SESSION['membre']['adresse'] . '</p></div><br>';

require_once("inc/haut.inc.php");
echo $contenu;
require_once("inc/bas.inc.php");
 ?>
