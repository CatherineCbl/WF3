<?php
/*
require_once("../inc/init.inc.php");
//debug($_POST);
//-----------------SUPPRESSION------------------
if (isset($_GET['action']) && $_GET['action'] == 'suppression') {
    $contenu .= '<div class="validation">Suppression de la commande : ' . $_GET['id_commande'] . '</div>';
    executeRequete("DELETE FROM commande WHERE id_commande =' $_GET[id_commande]'");
    $_GET['action'] = 'affichage';
}
//----------------ENREGISTREMENT commande--------
if (!empty($_POST))
{

    foreach ($_POST as $indice => $valeur) {
        $_POST[$indice] = htmlEntities(addSlashes($valeur));
    }
    executeRequete("REPLACE INTO commande(id_commande, id_membre, montant, date_enregistrement, etat) VALUES('$_POST[id_commande]', '$_POST[membre]', '$_POST[montant]', '$_POST[date_enregistrement]', '$_POST[etat]')");
    $contenu .= "<div class='validation'>La commande a bien été enregistré</div>";
    $_GET['action'] = 'affichage';
}

//---------- AFFICHAGE DES commandeS-----------------


    $resultat = executeRequete("SELECT * FROM commande");

    $contenu .= '<h2>Affichage des commandes</h2>';
    $contenu .= 'Nombre de commandes : ' . $resultat->num_rows;
    $contenu .= '<table border="1" cellpading="5"><tr>';

    while($colonne = $resultat->fetch_field())
    {
        $contenu .= '<th>' . $colonne->name . '</th>';
    }
    $contenu .= '<th>Détails de la commande</th>';
    $contenu .= '<th>Modification</th>';
    $contenu .= '<th>Suppression</th>';
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
        $contenu .='<td><a href=?action=detail&id_commande=' . $ligne['id_commande'] . '><img src="../inc/img/detail.png" width="50px" height="50px"></a></td>';
        $contenu .= '<td><a href=?action=modification&id_commande=' . $ligne['id_commande'] . '"><img src="../inc/img/edit.png"></a></td>';
        $contenu .= '<td><a href=?action=suppression&id_commande=' . $ligne['id_commande'] . '" OnClick="return(confirm(\'En êtes vous certain?\'))"><img src="../inc/img/delete.png"></a></td>';
        $contenu .= '</tr>';
    }

    $contenu .= '</table><br><hr><br>';


require_once("../inc/haut.inc.php");

if (isset($_GET['action']) && ($_GET['action'] == 'ajout' ||$_GET['action'] == 'modification'))
{
    if (isset($_GET['id_commande'])) {
        $resultat = executeRequete("SELECT * FROM commande WHERE id_commande = '$_GET[id_commande]'");//on récupère les informations sur l'article à modifier
        $commande_actuel = $resultat->fetch_assoc();//on rend les informations exploitables afin de les présaisir dans les cases du formulaire
    }
    $id_commande = (isset($commande_actuelle['id_commande'])) ? $commande_actuelle['id_commande'] : '';
    $id_membre = (isset($commande_actuelle['id_membre'])) ? $commande_actuelle['id_membre'] : '';
    $montant = (isset($commande_actuelle['montant'])) ? $commande_actuelle['montant'] : '';
    $date_enregistrement = (isset($commande_actuelle['date_enregistrement'])) ? $commande_actuelle['date_enregistrement'] : '';
    $etat = (isset($commande_actuelle['etat'])) ? $commande_actuelle['etat'] : '';

    echo'<h1>formulaire commandes</h1>
    <form method="post" enctype="multipart/form-data" action="">

    <input type="hidden" id="id_commande" name="id_commande" value="' . $id_commande . '"><br>
    <label for="id_membre">Id du membre</label><br>
    <input type="text" name="id_membre" value="' . $id_membre . '"><br /><br>

    <label for="montant">Montant</label><br>
    <input type="text" name="montant" value="' . $montant . '"><br /><br>

    <label for="date_enregistrement">Date d\'enregistrement</label><br>
    <input type="text" name="date_enregistrement" value="' . $date_enregistrement . '"><br /><br>

    <label for="etat">Etat</label><br>
    <input type= "text" name="etat" value="' . $etat . '"><br><br>

    <input type="submit" value="'; echo ucfirst($_GET['action']) . ' du commande"><br />
    </form>';
}
if($_GET)
{
    $resultat = executeRequete("SELECT * FROM details_commande WHERE id_commande= '$_GET[id_commande]'");

    $contenu .= '<h2>Affichage des détails de la commande</h2>';
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
}
echo $contenu;



require_once("../inc/bas.inc.php");
*/

require_once("../inc/init.inc.php");
if (!internauteEstConnecteEtEstAdmin()) {
    header("location: ../connexion.php");
    exit();
}
//--------- AFFICHAGE ---------//
require_once("../inc/haut.inc.php");
    echo "<h1>Voici les commandes passées sur le site</h1>";
    echo '<table border="1"><tr>';
    $information_sur_les_commandes = executeRequete("SELECT c.*, m.pseudo, m.adresse, m.ville, m.code_postal FROM commande c LEFT JOIN membre ON m.id_membre = c.id_membre");

    echo "Nombre de commande(s) : " . $information_sur_les_commandes->num_rows;
    while ($colonne = $information_sur_les_commandes->fetch_field()) {
        echo '<th>' . $colonne->name . '</th>';
    }
    echo "</tr>";
    $chiffre_affaire = 0;
    while ($commande = $information_sur_les_commandes->fetch_assoc()) {
        $chiffre_affaire += $commande['montant'];
        // $chiffre_affaire = $chiffre_affaire + $commande['montant'];
        echo "<div>";
        echo "<tr>";
        echo '<td><a href="gestion_commande.php?suivi=' . $commande['id_commande'] . '"> Voir la commande ' . $commande['id_commande'] . '</a></td>';
        echo '<td>' . $commande['id_commande'] . '</td>';
        echo '<td>' . $commande['id_membre'] . '</td>';
        echo '<td>' . $commande['montant'] . '</td>';
        echo '<td>' . $commande['date_enregistrement'] . '</td>';
        echo '<td>' . $commande['etat'] . '</td>';
        echo '<td>' . $commande['pseudo'] . '</td>';
        echo '<td>' . $commande['adresse'] . '</td>';
        echo '<td>' . $commande['ville'] . '</td>';
        echo '<td>' . $commande['code_postal'] . '</td>';
        echo "</tr>";
        echo "</div>";
    }
echo "</table><br>";
echo "Calcul du montant total des revenus : <br>";
echo "Le chiffre d'affaire de la société est de : $chiffre_affaire € <br>";
if (isset($_GET['suivi'])) {
    echo "<h1>Voici le détail pour la commande</h1>";
    echo '<table border="1">';
    echo '<tr>';
    $information_sur_les_commandes("SELECT * FROM details_commande WHERE id_commande = $_GET[suivi]");
    while ($colonne = $information_sur_les_commandes->fetch_field()) {
        echo '<th>' . $colonne->name . '</th>';
    }
    echo '</tr>';
}



require_once("../inc/bas.inc.php");

 ?>
