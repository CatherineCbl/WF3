<?php
require_once("../inc/init.inc.php");
//debug($_POST);
//--------- SUPPRESSION ----------------//
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
	$contenu .= '<div class="validation">Suppression du produit : ' . $_GET['id_produit'] . '</div>';
	executeRequete("DELETE FROM produit WHERE id_produit = $_GET[id_produit]");
	$_GET['action'] = 'affichage';
}

//--------- ENREGISTREMENT produit ----//
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
		$photo_bdd = URL . "photo/$nom_photo";
		$photo_dossier = RACINE_SITE . "/photo/$nom_photo";
		copy($_FILES['photo']['tmp_name'], $photo_dossier);
	}
	foreach($_POST as $indice => $valeur)
	{
		$_POST[$indice] = htmlEntities(addSlashes($valeur));
	}
	// Exercice : executez une requete d'insertion permettant d'inserer un produit dans la base
	executeRequete("REPLACE INTO produit(id_produit,id_salle,date_arrivee,date_depart,prix,etat)VALUES('$_POST[id_produit]', '$_POST[id_salle]', '$_POST[date_arrivee]', '$_POST[date_depart]', '$_POST[prix]', '$_POST[etat]')");
	$contenu .= '<div class="validation">Le produit a bien été enregistré</div>';
	$_GET['action'] = 'affichage';
}

//---- LIENS produitS ----//
$contenu .= '<a href="?action=affichage">Affichage des produits</a><br>';
$contenu .= '<a href="?action=ajout">Ajout d\'un produit</a><br><br><hr><br>';

//---- AFFICHAGE produitS-----//
if(isset($_GET['action']) && $_GET['action'] == 'affichage')
{
	$resultat = executeRequete("SELECT * FROM produit");

	$contenu .= '<h2>Affichage des produits</h2>';
	$contenu .= 'Nombre de produits dans la boutique : ' . $resultat->num_rows;
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
		$contenu .= '<td><a href="?action=modification&id_produit=' . $ligne['id_produit'] . '"><img src="../img/edit.png"></a></td>';
		$contenu .= '<td><a href="?action=suppression&id_produit=' . $ligne['id_produit'] . '" OnClick="return(confirm(\'En êtes vous certain ?\'));"><img src="../img/delete.png"></a></td>';
		$contenu .= '</tr>';

	}
	$contenu .= '</table><br><hr><br>';
}



require_once("../inc/haut.inc.php");
echo $contenu;

if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification'))
{

	if(isset($_GET['id_produit']))
	{
		$resultat = executeRequete("SELECT * FROM produit WHERE id_produit = $_GET[id_produit]"); // on recupère les information sur l'article à modifier
		$produit_actuel = $resultat->fetch_assoc(); // on rends les informations exploitable afin de les présaisir dans les cases du formuliare
	}

	$id_produit = (isset($produit_actuel['id_produit'])) ? $produit_actuel['id_produit'] : '';
	$id_salle= (isset($produit_actuel['id_salle'])) ? $produit_actuel['id_salle'] : '';
	$date_arrivee = (isset($produit_actuel['date_arrivee'])) ? $produit_actuel['date_arrivee'] : '';
	$date_depart = (isset($produit_actuel['date_depart'])) ? $produit_actuel['date_depart'] : '';
	$prix = (isset($produit_actuel['prix'])) ? $produit_actuel['prix'] : '';
	$etat = (isset($produit_actuel['etat'])) ? $produit_actuel['etat'] : '';

echo '<h1>Formulaire produits</h1>
		<form method="post" enctype="multipart/form-data" action="">

			<input type="hidden" id="id_produit" name="id_produit" value="' . $id_produit . '">
			<label for="id_salle">id_salle</label><br>
			<input type="text" id="id_salle" name="id_salle" value="' .$id_salle . '"><br>
			<br>
			<label for="date_arrivee">date_arrivee</label><br>
			<input type="text" id="date_arrivee" name="date_arrivee" value="' .$date_arrivee . '"><br>
			<br>
			<label for="date_depart">date_depart</label><br>
			<input type="text" id="date_depart" name="date_depart" value="' . $date_depart . '"><br>
			<br>
			<label for="prix">prix</label><br>
			<input type="text" id="prix" name="prix" value="' . $prix . '"><br>
			<br>
            <label for="etat">etat</label><br>
            <option name="etat" value="libre"'; if($etat == 'libre') echo 'selected</option>'
            <option name="etat" value="reservation"'; if($etat == 'reservation') echo 'selected</option>'

			<br>
			<input type="submit" value="'; echo ucfirst($_GET['action']). ' du produit">
		</form>';
}
require_once("../inc/bas.inc.php");
