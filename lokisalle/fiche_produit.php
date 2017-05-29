<?php
require_once("inc/init.inc.php");
//-----------TRAITEMENT PHP ---------------
if (isset($_GET['id_salle'])) {
    $resultat = executeRequete("SELECT * FROM salle WHERE id_salle = '$_GET[id_salle]'");
    $resultat2 = executeRequete("SELECT * FROM produit WHERE id_salle = '$_GET[id_salle]'");
}
if($resultat->num_rows <= 0)
{
    header("location:index.php");
    exit();
}


$salle = $resultat->fetch_assoc();
$produit = $resultat2->fetch_assoc();
$contenu .= "<h3>Titre : $salle[titre]</h3><hr><br>";
$contenu .= "<p>Catégorie : $salle[categorie]</p>";
$contenu .= "<img src='$salle[photo]' width='150' height='150'>";
$contenu .= "<p><i>Description : $salle[description]</i></p><br>";
if(!isset($produit['prix'])){
    $contenu.= "<p>Salle indisponible</p>";
}
else {
    $contenu .= "<p>Prix : $produit[prix] €</p><br>";
    $contenu .= '<form method="post" action="panier.php">';
	$contenu .= "<input type='hidden' name='id_produit' value='$produit[id_produit]'>";
    $contenu .= '<input type="submit" name="ajout_panier" value="Réserver la salle">';
	$contenu .= '</form>';
}



$contenu .= "<br><a href='index.php?categorie=" . $salle['categorie'] . "'>Retour vers la selection de " . $salle['categorie'] . "</a>";

require_once("inc/haut.inc.php");
echo $contenu;
require_once("inc/bas.inc.php");
