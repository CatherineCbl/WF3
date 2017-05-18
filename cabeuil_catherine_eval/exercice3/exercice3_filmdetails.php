<?php
require_once("inc/init.inc.php");
//---------- AFFICHAGE DES FILMS-----------------

if(isset($_GET['action']) && $_GET['action'] == 'infos')
{
    $resultat = executeRequete("SELECT * FROM movies");

    $contenu .= '<h2>details du film</h2>';
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


        $contenu .= '<td><a href=?action=infos&id_film=' . $ligne['id_film'] . '"><img src="inc/img/detail.png" height="50" width="50"></a></td>';
        $contenu .= '</tr>';
    }

    $contenu .= '</table><br><hr><br>';
}

require_once("/inc/haut.inc.php");
if($_GET)
{
    $resultat = executeRequete("SELECT * FROM movies WHERE id_film= '$_GET[id_film]'");

    $contenu .= '<h2>Affichage des détails du film</h2>';

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
}
echo $contenu;



require_once("/inc/bas.inc.php");
