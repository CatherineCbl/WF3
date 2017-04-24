<?php
$nom_fichier = "liste.txt";
$fichier = file($nom_fichier);// la fonction file fait tout le travail, elle retourne chasue ligne d'un fichier à des indices différents d'un tableau ARRAY

echo '<pre>'; print_r($fichier); echo '</pre>';

// Exercie: afficher les données du tableau
foreach($fichier as $indices => $valeurs)// le mot as fait partie du langage et est obligatoire
{
    echo $indices . '-' . $valeurs . '<br>'; // on affiche successivement les éléments du tableau
}
echo '<hr>';

echo implode($fichier,'<br>');// affichage du tableau ARRAY avec un passage à la ligne
 ?>
