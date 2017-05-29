<?php
require_once ('inc/init.inc.php');
//--------------------------TRAITEMENTS php----------------------------
//--------------affichage catégories---------------------------
$catégories_des_salles = executeRequete("SELECT DISTINCT categorie FROM salle");
$contenu .= '<div class="boutique-gauche"  style="background: #f2f2f2;">';
$contenu .= "<ul>";
while($cat = $catégories_des_salles->fetch_assoc())
{
    $contenu .= "<li><a href='?categorie=" . $cat['categorie'] ."'>" . $cat['categorie'] . "</a></li>";
}
$contenu .= "</ul>";
$contenu .= "</div>";

//---------------------AFFICHAGE DES PRODUITS-------------
$contenu .='<div class="boutique-droite">';
if(isset($_GET['categorie']))
{
    $donnees = executeRequete("SELECT id_salle, titre, description, photo, adresse, ville, cp, pays, capacite FROM salle WHERE categorie = '$_GET[categorie]'");

    while($salle = $donnees->fetch_assoc())
    {
        $contenu .= '<div class="boutique-produit">';
        $contenu .= "<h3>$salle[titre]</h3>";
        $contenu .= "<a href=\"fiche_produit.php?id_salle=$salle[id_salle]\"><img src=\"$salle[photo]\" width=\"130\" height=\"100\"></a>";
        $contenu .= "<p>$salle[ville] </p><br>";
        $contenu .= "<p>Capacité : $salle[capacite] pers. </p><br>";
        $contenu .= '<a href="fiche_produit.php?id_salle=' . $salle['id_salle'] . '">Voir  la fiche</a>';
        $contenu .= '</div>';
    }
}
$contenu .= '</div>';

require_once ('inc/haut.inc.php');
echo $contenu;
require_once ('inc/bas.inc.php');
