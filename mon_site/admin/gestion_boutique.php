<?php
require_once("../inc/init.inc.php");
//debug($_POST);
//-----------------SUPPRESSION------------------
if (isset($_GET['action']) && $_GET['action'] == 'suppression') {
    $contenu .= '<div class="validation">Suppression du produit : ' . $_GET['id_produit'] . '</div>';
    executeRequete("DELETE FROM produit WHERE id_produit =' $_GET[id_produit]'");
    $_GET['action'] = 'affichage';
}
//----------------ENREGISTREMENT PRODUIT--------
if (!empty($_POST))
{
    $photo_bdd = "";
    if(isset($_GET['action']) && $_GET['action'] == 'modification')
    {
        $photo_bdd = $_POST['photo_actuelle'];
    }
    if (!empty($_FILES['photo']['name'])) {
        //debug($_FILES);
        $nom_photo = $_POST['reference'] . ' ' . $_FILES['photo']['name'];
        $photo_bdd = URL . "photos/$nom_photo";
        $photo_dossier = RACINE_SITE . "photos/$nom_photo";
        copy($_FILES['photo']['tmp_name'], $photo_dossier);
    }
    foreach ($_POST as $indice => $valeur) {
        $_POST[$indice] = htmlEntities(addSlashes($valeur));
    }
    executeRequete("REPLACE INTO produit(id_produit, reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES('$_POST[id_produit]', '$_POST[reference]', '$_POST[categorie]', '$_POST[titre]', '$_POST[description]', '$_POST[couleur]', '$_POST[taille]', '$_POST[public]', '$photo_bdd', '$_POST[prix]', '$_POST[stock]')");
    $contenu .= "<div class='validation'>Le produit a bien été enregistré</div>";
    $_GET['action'] = 'affichage';
}
//------------ LIENS PRODUITS ---------------------
$contenu .= '<a href="?action=affichage">Affichage des produits</a><br>';
$contenu .= '<a href="?action=ajout">Ajout d\'un produit</a><br><br><hr><br>';

//---------- AFFICHAGE DES PRODUITS-----------------
if(isset($_GET['action']) && $_GET['action'] == 'affichage')
{
    $resultat = executeRequete("SELECT * FROM produit");

    $contenu .= '<h2>Affichage des produits</h2>';
    $contenu .= 'Nombre de produits dans la boutique : ' . $resultat->num_rows;
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

        $contenu .= '<td><a href=?action=modification&id_produit=' . $ligne['id_produit'] . '"><img src="../inc/img/edit.png"></a></td>';
        $contenu .= '<td><a href=?action=suppression&id_produit=' . $ligne['id_produit'] . '" OnClick="return(confirm(\'En êtes vous certain?\'))"><img src="../inc/img/delete.png"></a></td>';
        $contenu .= '</tr>';
    }

    $contenu .= '</table><br><hr><br>';
}

require_once("../inc/haut.inc.php");
echo $contenu;

if (isset($_GET['action']) && ($_GET['action'] == 'ajout' ||$_GET['action'] == 'modification'))
{
    if (isset($_GET['id_produit'])) {
        $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = '$_GET[id_produit]'");//on récupère les informations sur l'article à modifier
        $produit_actuel = $resultat->fetch_assoc();//on rend les informations exploitables afin de les présaisir dans les cases du formulaire
    }
    $id_produit = (isset($produit_actuel['id_produit'])) ? $produit_actuel['id_produit'] : '';
    $reference = (isset($produit_actuel['reference'])) ? $produit_actuel['reference'] : '';
    $categorie = (isset($produit_actuel['categorie'])) ? $produit_actuel['categorie'] : '';
    $titre = (isset($produit_actuel['titre'])) ? $produit_actuel['titre'] : '';
    $description = (isset($produit_actuel['description'])) ? $produit_actuel['description'] : '';
    $couleur = (isset($produit_actuel['couleur'])) ? $produit_actuel['couleur'] : '';
    $taille = (isset($produit_actuel['taille'])) ? $produit_actuel['taille'] : '';
    $public = (isset($produit_actuel['public'])) ? $produit_actuel['public'] : '';
    $photo = (isset($produit_actuel['photo'])) ? $produit_actuel['photo'] : '';
    $prix = (isset($produit_actuel['prix'])) ? $produit_actuel['prix'] : '';
    $stock = (isset($produit_actuel['stock'])) ? $produit_actuel['stock'] : '';
    echo'<h1>formulaire produits</h1>
    <form method="post" enctype="multipart/form-data" action="">

    <input type="hidden" id="id_produit" name="id_produit" value="' . $id_produit . '"><br>
    <label for="reference">Référence</label><br>
    <input type="text" name="reference" value="' . $reference . '"><br /><br>

    <label for="categorie">Catégorie</label><br>
    <input type="text" name="categorie" value="' . $categorie . '"><br /><br>

    <label for="titre">Titre</label><br>
    <input type="text" name="titre" value="' . $titre . '"><br /><br>

    <label for="description">Description</label><br>
    <textarea name="description" id="description">' . $description .  '</textarea><br><br>

    <label for="couleur">Couleur</label><br>
    <input type="text" name="couleur" value="' . $couleur . '"><br /><br>

    <label for="taille">Taille</label><br>
    <select name="taille">
    <optgroup>
    <option value="s"'; if($taille == 's') echo 'selected'; echo'>S</option>
    <option value="m"'; if($taille == 'm') echo 'selected'; echo'>M</option>
    <option value="l"'; if($taille == 'l') echo 'selected'; echo'>L</option>
    <option value="xl"'; if($taille == 'xl') echo 'selected'; echo'>XL</option>
    <option value="xxl"'; if($taille == 'xxl') echo 'selected'; echo'>XXL</option>
    </optgroup>
    </select><br /><br>

    <label for="public">Public</label><br>
    <input type="radio" name="public" value="m" checked'; if($public == 'm') echo 'checked'; echo'>Homme
    <input type="radio" name="public" value="f"'; if($public == 'f') echo 'checked'; echo'>Femme
    <input type="radio" name="public" value="mixte"'; if($public == 'mixte') echo 'checked'; echo'>Mixte<br><br>

    <label for="photo">Photo</label><br>
    <input type="file" name="photo"><br><br>';
    if(!empty($photo))
    {
        echo '<i>Vous pouver uploader une nouvelle photo si vous souhaitez la changer</i><br>';
        echo '<img src="' . $photo . '" width="90" height="90"><br>';
    }
    echo '
    <input type="hidden" name="photo_actuelle" id="photo_actuelle" value="' . $photo . '"><br>

    <label for="prix">Prix</label><br>
    <input type="text" name="prix" value="' . $prix . '"><br /><br>

    <label for="stock">Stock</label><br>
    <input type="text" name="stock" value="' . $stock . '"><br /><br>

    <input type="submit" value="'; echo ucfirst($_GET['action']) . ' du produit"><br />
    </form>';
}



require_once("../inc/bas.inc.php");
 ?>
