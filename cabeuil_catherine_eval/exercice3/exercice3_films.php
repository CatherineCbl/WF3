<?php
require_once("inc/init.inc.php");
//---------- AFFICHAGE DES FILMS-----------------

if(isset($_GET['action']) && $_GET['action'] == 'affichage')
{
    $resultat = executeRequete("SELECT title, director, year_of_prod FROM movies");

    $contenu .= '<h2>Affichage des films</h2>';
    $contenu .= 'Nombre de films : ' . $resultat->num_rows;
    $contenu .= '<table border="1" cellpading="5"><tr>';

    while($colonne = $resultat->fetch_field())
    {
        $contenu .= '<th>' . $colonne->name . '</th>';
    }
    $contenu .= '<th>+ d\'infos</th>';
    $contenu .= '</tr>';

    while ($ligne = $resultat->fetch_assoc()) {
        $contenu .= '<tr>';
        foreach ($ligne as $indice => $information) {

                 $contenu .= '<td>' . $information . '</td>';
             }


        $contenu .= '<td><a href=exercice3_filmdetails.php?action=infos&id_film=' . $ligne['id_film'] . '"><img src="inc/img/detail.png" height="50" width="50"></a></td>';
        $contenu .= '</tr>';
    }

    $contenu .= '</table><br><hr><br>';
}

require_once("/inc/haut.inc.php");
echo $contenu;


require_once("/inc/bas.inc.php");
