<?php
require_once("../inc/init.inc.php");
//debug($_POST);
//-----------------SUPPRESSION------------------
if (isset($_GET['action']) && $_GET['action'] == 'suppression') {
    $contenu .= '<div class="validation">Suppression du membre : ' . $_GET['id_membre'] . '</div>';
    executeRequete("DELETE FROM membre WHERE id_membre =' $_GET[id_membre]'");
    $_GET['action'] = 'affichage';
}
//----------------ENREGISTREMENT membre--------
if (!empty($_POST))
{

    foreach ($_POST as $indice => $valeur) {
        $_POST[$indice] = htmlEntities(addSlashes($valeur));
    }
    executeRequete("REPLACE INTO membre(id_membre, pseudo, mdp, nom, prenom, email, civilite) VALUES('$_POST[id_membre]', '$_POST[pseudo]', '$_POST[mdp]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[civilite]')");
    $contenu .= "<div class='validation'>Le membre a bien été enregistré</div>";
    $_GET['action'] = 'affichage';
}
//------------ LIENS membreS ---------------------
$contenu .= '<a href="?action=affichage">Affichage des membres</a><br>';
$contenu .= '<a href="?action=ajout">Ajout d\'un membre</a><br><br><hr><br>';

//---------- AFFICHAGE DES membreS-----------------
if(isset($_GET['action']) && $_GET['action'] == 'affichage')
{
    $resultat = executeRequete("SELECT * FROM membre");

    $contenu .= '<h2>Affichage des membres</h2>';
    $contenu .= 'Nombre de membres : ' . $resultat->num_rows;
    $contenu .= '<table border="1" cellpading="5"><tr>';

    while($colonne = $resultat->fetch_field())
    {
        $contenu .= '<th>' . $colonne->name . '</th>';
    }
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

        $contenu .= '<td><a href=?action=modification&id_membre=' . $ligne['id_membre'] . '"><img src="../img/edit.png"></a></td>';
        $contenu .= '<td><a href=?action=suppression&id_membre=' . $ligne['id_membre'] . '" OnClick="return(confirm(\'En êtes vous certain?\'))"><img src="../img/delete.png"></a></td>';
        $contenu .= '</tr>';
    }

    $contenu .= '</table><br><hr><br>';
}

require_once("../inc/haut.inc.php");
echo $contenu;

if (isset($_GET['action']) && ($_GET['action'] == 'ajout' ||$_GET['action'] == 'modification'))
{
    if (isset($_GET['id_membre'])) {
        $resultat = executeRequete("SELECT * FROM membre WHERE id_membre = '$_GET[id_membre]'");//on récupère les informations sur l'article à modifier
        $membre_actuel = $resultat->fetch_assoc();//on rend les informations exploitables afin de les présaisir dans les cases du formulaire
    }
    $id_membre = (isset($membre_actuel['id_membre'])) ? $membre_actuel['id_membre'] : '';
    $pseudo = (isset($membre_actuel['pseudo'])) ? $membre_actuel['pseudo'] : '';
    $mdp = (isset($membre_actuel['mdp'])) ? $membre_actuel['mdp'] : '';
    $nom = (isset($membre_actuel['nom'])) ? $membre_actuel['nom'] : '';
    $prenom = (isset($membre_actuel['prenom'])) ? $membre_actuel['prenom'] : '';
    $email = (isset($membre_actuel['email'])) ? $membre_actuel['email'] : '';
    $civilite = (isset($membre_actuel['civilite'])) ? $membre_actuel['civilite'] : '';


    echo'<h1>formulaire membres</h1>
    <form method="post" enctype="multipart/form-data" action="">

    <input type="hidden" id="id_membre" name="id_membre" value="' . $id_membre . '"><br>
    <label for="pseudo">Pseudo</label><br>
    <input type="text" name="pseudo" value="' . $pseudo . '"><br /><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="text" name="mdp" value="' . $mdp . '"><br /><br>

    <label for="nom">Nom</label><br>
    <input type="text" name="nom" value="' . $nom . '"><br /><br>

    <label for="prenom">Prénom</label><br>
    <input type= "text" name="prenom" value="' . $prenom . '"><br><br>

    <label for="email">Email</label><br>
    <input type="email" name="email" value="' . $email . '"><br /><br>

    <label for="civilite">Civilité</label><br>
    <input type="radio" name="civilite" value="m" checked'; if($civilite == 'm') echo 'checked'; echo'>Homme
    <input type="radio" name="civilite" value="f"'; if($civilite == 'f') echo 'checked'; echo'>Femme<br><br>


    <input type="submit" value="'; echo ucfirst($_GET['action']) . ' du membre"><br />
    </form>';
}



require_once("../inc/bas.inc.php");
 ?>
