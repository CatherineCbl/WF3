<?php
require_once("../inc/init.inc.php");
//debug($_POST);
//-----------------SUPPRESSION------------------
if (isset($_GET['action']) && $_GET['action'] == 'suppression') {
    $contenu .= '<div class="validation">Suppression de la avis : ' . $_GET['id_avis'] . '</div>';
    executeRequete("DELETE FROM avis WHERE id_avis =' $_GET[id_avis]'");
    $_GET['action'] = 'affichage';
}
//----------------ENREGISTREMENT avis--------
if (!empty($_POST))
{

    foreach ($_POST as $indice => $valeur) {
        $_POST[$indice] = htmlEntities(addSlashes($valeur));
    }
    executeRequete("REPLACE INTO avis(id_avis, id_membre, montant, date_enregistrement, etat) VALUES('$_POST[id_avis]', '$_POST[membre]', '$_POST[montant]', '$_POST[date_enregistrement]', '$_POST[etat]')");
    $contenu .= "<div class='validation'>L'avis a bien Ã©tÃ© enregistrÃ©</div>";
    $_GET['action'] = 'affichage';
}

//---------- AFFICHAGE DES avis-----------------//


    $resultat = executeRequete("SELECT * FROM avis");

    $contenu .= '<h2>Affichage des avis</h2>';
    $contenu .= 'Nombre de avis : ' . $resultat->num_rows;
    $contenu .= '<table border="1" cellpading="5"><tr>';

    while($colonne = $resultat->fetch_field())
    {
        $contenu .= '<th>' . $colonne->name . '</th>';
    }
    $contenu .= '<th>Modification</th>';
    $contenu .= '<th>Suppression</th>';
    $contenu .= '<th>Recherche</th>'
    $contenu .= '</tr>';

    while ($ligne = $resultat->fetch_assoc()) {
        $contenu .= '<tr>';
        foreach ($ligne as $indice => $information) {
            if ($indice == "photo") {
                $contenu .= '<td><img src="' . $information . '"width="70" height="70"></td>';
            }
            else {
                $contenu .= '<td>' . $information . '</td>';
            }
        }
        $contenu .='<td><a href=?action=detail&id_avis=' . $ligne['id_avis'] . '><img src="..\img\icone_search.png" width="50px" height="50px"></a></td>';
        $contenu .= '<td><a href=?action=modification&id_avis=' . $ligne['id_avis'] . '"><img src="../img/edit.png"></a></td>';
        $contenu .= '<td><a href=?action=suppression&id_avis=' . $ligne['id_avis'] . '" OnClick="return(confirm(\'En êtes vous certain?\'))"><img src="../img/delete.png"></a></td>';
        $contenu .= '</tr>';
    }

    $contenu .= '</table><br><hr><br>';


require_once("../inc/haut.inc.php");

if (isset($_GET['action']) && ($_GET['action'] == 'ajout' ||$_GET['action'] == 'modification'))
{
    if (isset($_GET['id_avis'])) {
        $resultat = executeRequete("SELECT * FROM avis WHERE id_avis = '$_GET[id_avis]'");//on rÃ©cupÃ¨re les informations sur l'article Ã  modifier
        $avis_actuel = $resultat->fetch_assoc();//on rend les informations exploitables afin de les prÃ©saisir dans les cases du formulaire
    }
    $id_avis = (isset($avis_actuelle['id_avis'])) ? $avis_actuelle['id_avis'] : '';
    $id_membre = (isset($avis_actuelle['id_membre'])) ? $avis_actuelle['id_membre'] : '';
    $id_salle = (isset($avis_actuelle['id_salle'])) ? $avis_actuelle['id_salle'] : '';
    $commentaire = (isset($avis_actuelle['commentaire'])) ? $avis_actuelle['commentaire'] : '';
    $note = (isset($avis_actuelle['note'])) ? $avis_actuelle['note'] : '';
    $date_enregistrement = (isset($avis_actuelle['date_enregistrement'])) ? $avis_actuelle['date_enregistrement'] : '';

    echo'<h1>formulaire avis</h1>
    <form method="post" enctype="multipart/form-data" action="">

    <input type="hidden" id="id_avis" name="id_avis" value="' . $id_avis . '"><br>
    <label for="id_membre">Id du membre</label><br>
    <input type="text" name="id_membre" value="' . $id_membre . '"><br /><br>

    <label for="id_salle">Id_salle</label><br>
    <input type="text" name="id_salle" value="' . $montant . '"><br /><br>

    <label for="commentaire">Commentaire</label><br>
    <textarea name="commentaire" value="' . $commentaire . '" rows="8" cols="80"></textarea>

    <label for="date_enregistrement">Date d\'enregistrement</label><br>
    <input type="text" name="date_enregistrement" value="' . $date_enregistrement . '"><br /><br>

    <label for="note">Note</label><br>
    <input type= "text" name="note" value="' . $note . '"><br><br>

    <input type="submit" value="'; echo ucfirst($_GET['action']) . ' de l\'avis"><br />
    </form>';
}
if($_GET)
{
    $resultat = executeRequete("SELECT * FROM avis WHERE id_avis= '$_GET[id_avis]'");

    $contenu .= '<h2>Affichage des détails des avis</h2>';
    //$contenu .= 'Nombre de avis : ' . $resultat->num_rows;
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



require_once("../inc/bas.inc.php");
 ?>
