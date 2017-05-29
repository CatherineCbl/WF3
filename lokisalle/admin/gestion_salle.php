<?php
require_once("../inc/init.inc.php");
//debug($_POST);
//--------- SUPPRESSION ----------------//
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
	$contenu .= '<div class="validation">Suppression de la salle : ' . $_GET['id_salle'] . '</div>';
	executeRequete("DELETE FROM salle WHERE id_salle = $_GET[id_salle]");
	$_GET['action'] = 'affichage';
}

//--------- ENREGISTREMENT salle ----//
if(!empty($_POST))
{
	$photo_bdd = "";
	if(isset($_GET['action']) && $_GET['action'] == 'modification')
	{
		$photo_bdd = $_POST['photo_actuelle'];
	}

	if(!empty($_FILES['photo']['name']))
	{
		//debug($_FILES);
		$nom_photo = $_FILES['photo']['name'];
		$photo_bdd = URL . "img/$nom_photo";
		$photo_dossier = RACINE_SITE . "/img/$nom_photo";
		copy($_FILES['photo']['tmp_name'], $photo_dossier);
	}
	foreach($_POST as $indice => $valeur)
	{
		$_POST[$indice] = htmlEntities(addSlashes($valeur));
	}
	// Exercice : executez une requete d'insertion permettant d'inserer un salle dans la base
	executeRequete("REPLACE INTO salle(id_salle,titre,description,photo,pays,ville,adresse,cp,capacite,categorie)VALUES('$_POST[id_salle]', '$_POST[titre]', '$_POST[description]','$photo_bdd', '$_POST[pays]', '$_POST[ville]', '$_POST[adresse]', '$_POST[cp]', '$_POST[capacite]',  '$_POST[categorie]')");
	$contenu .= '<div class="validation">La salle a bien été enregistré</div>';
	$_GET['action'] = 'affichage';
}

//---- LIENS salleS ----//
$contenu .= '<a href="?action=affichage">Affichage des salles</a><br>';
$contenu .= '<a href="?action=ajout">Ajout d\'une salle</a><br><br><hr><br>';

//---- AFFICHAGE salleS-----//
if(isset($_GET['action']) && $_GET['action'] == 'affichage')
{
	$resultat = executeRequete("SELECT * FROM salle");

	$contenu .= '<h2>Affichage des salles</h2>';
	$contenu .= 'Nombre de salles dans la boutique : ' . $resultat->num_rows;
	$contenu .= '<table border ="1" cellpadding="5"><tr>';

	while($colonne = $resultat->fetch_field())
	{
		$contenu .= '<th>' . $colonne->name . '</th>';
	}
	$contenu .= '<th>Modification</th>';
	$contenu .= '<th>Suppression</th>';
	$contenu .= '</tr>';

	while($ligne = $resultat->fetch_assoc())
	{
		$contenu .= '<tr>';
		foreach($ligne as $indice => $information)
		{
			if($indice == "photo")
			{
				$contenu .= '<td><img src="' . $information . '" width="70" height="70"></td>';
			}
			else
			{
				$contenu .= '<td>' . $information . '</td>';
			}
		}
		$contenu .= '<td><a href="?action=modification&id_salle=' . $ligne['id_salle'] . '"><img src="../img/edit.png"></a></td>';
		$contenu .= '<td><a href="?action=suppression&id_salle=' . $ligne['id_salle'] . '" OnClick="return(confirm(\'En êtes vous certain ?\'));"><img src="../img/delete.png"></a></td>';
		$contenu .= '</tr>';

	}
	$contenu .= '</table><br><hr><br>';
}



require_once("../inc/haut.inc.php");
echo $contenu;

if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification'))
{

	if(isset($_GET['id_salle']))
	{
		$resultat = executeRequete("SELECT * FROM salle WHERE id_salle = $_GET[id_salle]"); // on recupère les information sur l'article à modifier
		$salle_actuel = $resultat->fetch_assoc(); // on rends les informations exploitable afin de les présaisir dans les cases du formuliare
	}

	$id_salle = (isset($salle_actuel['id_salle'])) ? $salle_actuel['id_salle'] : '';
	$titre= (isset($salle_actuel['titre'])) ? $salle_actuel['titre'] : '';
	$description = (isset($salle_actuel['description'])) ? $salle_actuel['description'] : '';
	$photo = (isset($salle_actuel['photo'])) ? $salle_actuel['photo'] : '';
	$pays = (isset($salle_actuel['pays'])) ? $salle_actuel['pays'] : '';
	$ville = (isset($salle_actuel['ville'])) ? $salle_actuel['ville'] : '';
	$adresse = (isset($salle_actuel['adresse'])) ? $salle_actuel['adresse'] : '';
	$cp = (isset($salle_actuel['cp'])) ? $salle_actuel['cp'] : '';
	$capacite = (isset($salle_actuel['capacite'])) ? $salle_actuel['capacite'] : '';
	$categorie = (isset($salle_actuel['categorie'])) ? $salle_actuel['categorie'] : '';

echo '<h1>Formulaire salles</h1>
		<form method="post" enctype="multipart/form-data" action="">

			<input type="hidden" id="id_salle" name="id_salle" value="' . $id_salle . '">
			<label for="titre">titre</label><br>
			<input type="text" id="titre" name="titre" value="' .$titre . '"><br>
			<br>
			<label for="description">Description</label><br>
			<input type="text" id="description" name="description" value="' .$description . '"><br>
			<br>
			<label for="pays">Pays</label><br>
			<input type="pays" id="pays" name="pays" value="' . $pays . '"><br>
			<br>
			<label for="ville">Ville</label><br>
			<input type="text" id="ville" name="ville" value="' . $ville . '"><br>
			<br>
			<label for="adresse">Adresse</label><br>
			<input type="text" id="adresse" name="adresse" value="' .$adresse . '"><br>
			<br>
			<label for="cp">Code postal</label><br>
			<input type="text" id="cp" name="cp" value="' .$cp . '"><br>
			<br>

			<label for="photo">Photo</label><br>
			<input type="file" id="photo" name="photo" ><br><br>';
			if(!empty($photo))
			{
				echo '<i>Vous pouvez uploader une nouvelle photo si vous souhaitez la changer</i><br>';
				echo '<img src="'. $photo .'" width="90" height="90"><br>';
			}
			echo '
			<input type="hidden" name="photo_actuelle" value="' . $photo . '"><br>

			<label for="capacite">Capacité</label><br>
			<input type="text" id="capacite" name="capacite" value="' . $capacite . '"><br><br>

			<label for="categorie">Catégorie</label><br>
			<select name="categorie">
				<option value="réunion"'; if($categorie == 'réunion') echo 'selected'; echo'>Réunion</option>
				<option value="bureau"'; if($categorie == 'bureau') echo 'selected'; echo'>Bureau</option>
				<option value="formation"'; if($categorie == 'formation') echo 'selected'; echo'>Formation</option>
			</select><br /><br>














			<br>
			<input type="submit" value="'; echo ucfirst($_GET['action']). ' de la salle">
		</form>';
}
require_once("../inc/bas.inc.php");
