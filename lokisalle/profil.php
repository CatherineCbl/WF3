
<?php
require_once("inc/init.inc.php");

$contenu .= '<p>Bonjour <strong>' . $_SESSION['membre']['pseudo'] . '</strong></p>';
$contenu .= '<div><h2>Voici vos informations de profil</h2>';
$contenu .= '<p> Votre email est : ' . $_SESSION['membre']['email'] . '<br>';
$contenu .= 'Votre nom est : ' . $_SESSION['membre']['nom'] . '<br>';
$contenu .= 'Votre prénom est : ' . $_SESSION['membre']['prenom'] . '<br>';


require_once("inc/haut.inc.php");
echo $contenu;
require_once("inc/bas.inc.php");







 ?>
