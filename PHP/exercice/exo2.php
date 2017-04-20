<?php
if($_POST)// si l'on clique sur le bouton envoi
{
echo "Marque : " . $_POST['marque'] . "<br>";
echo "Modèle : " . $_POST['modele'] . "<br>";
echo "Couleur: " . $_POST['couleur'] . "<br>";
echo "km : " . $_POST['km'] . "<br>";
echo "Carburant : " . $_POST['carburant'] . "<br>";
echo "Année : " . $_POST['annee'] . "<br>";
echo "Prix : " . $_POST['prix'] . "<br>";
echo "Puissance : " . $_POST['puissance'] . "<br>";
echo "Options : " . $_POST['options'] . "<br>";
}
?>
