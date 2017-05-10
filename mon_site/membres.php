<?php
require_once("inc/init.inc.php");
require_once("inc/haut.inc.php");
if (isset($_SESSION['membre']['id_membre'])) {
    $resultat = executeRequete("SELECT * FROM membre WHERE id_membre = '" . $_SESSION['membre']['id_membre'] . "'");//on récupère les informations sur l'article à modifier
    $membre_actuel = $resultat->fetch_assoc();//on rend les informations exploitables afin de les présaisir dans les cases du formulaire
}

$id_membre = (isset($membre_actuel['id_membre'])) ? $membre_actuel['id_membre'] : '';
$pseudo = (isset($membre_actuel['pseudo'])) ? $membre_actuel['pseudo'] : '';
$mdp = (isset($membre_actuel['mdp'])) ? $membre_actuel['mdp'] : '';
$nom = (isset($membre_actuel['nom'])) ? $membre_actuel['nom'] : '';
$prenom = (isset($membre_actuel['prenom'])) ? $membre_actuel['prenom'] : '';
$email = (isset($membre_actuel['email'])) ? $membre_actuel['email'] : '';
$civilite = (isset($membre_actuel['civilite'])) ? $membre_actuel['civilite'] : '';
$ville = (isset($membre_actuel['ville'])) ? $membre_actuel['ville'] : '';
$code_postal = (isset($membre_actuel['code_postal'])) ? $membre_actuel['code_postal'] : '';
$adresse = (isset($membre_actuel['adresse'])) ? $membre_actuel['adresse'] : '';

if (!empty($_POST))
{

    foreach ($_POST as $indice => $valeur) {
        $_POST[$indice] = htmlEntities(addSlashes($valeur));
    }
    executeRequete("REPLACE INTO membre(id_membre, pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) VALUES('$_POST[id_membre]', '$_POST[pseudo]', '$_POST[mdp]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[civilite]', '$_POST[ville]', '$_POST[code_postal]', '$_POST[adresse]')");
    $contenu .= "<div class='validation'>Vos modifications ont bien été enregistrées</div>";
    //$_GET['action'] = 'affichage';
    unset($_SESSION['membre']);
    foreach($membre as $indice =>$element)
    {
        if($indice !='mdp')
        {
            $_SESSION['membre'][$indice] = $element;// nous créons une session avec les éléments provenant de la BDD
        }
    }
    header("location:connexion.php");
}





echo $contenu;
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

<label for="ville">Ville</label><br>
<input type="text" name="ville" value="' . $ville . '"><br /><br>

<label for="code_postal">Code postal</label><br>
<input type="text" name="code_postal" value="' . $code_postal . '"><br /><br>

<label for="adresse">Adresse</label><br>
<input type="text" name="adresse" value="' . $adresse . '"><br /><br>

<input type="submit" value="Modifier"><br />
</form>';


require_once("inc/bas.inc.php");
 ?>
