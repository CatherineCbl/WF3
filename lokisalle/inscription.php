<?php
include_once("inc/init.inc.php");

if ($_POST) {
    executeRequete("INSERT INTO membre(pseudo,mdp, nom,prenom, email,civilite) VALUES('$_POST[pseudo]', '$_POST[mdp]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[civilite]')");
    $contenu .= "Vous êtes bien inscrit(e)";
}
require_once("inc/haut.inc.php");
echo $contenu;
?>


        <h1>Inscription</h1>
        <form class="" action="" method="post">

            <label for="pseudo">Pseudo</label><br/>
            <input type="text" id="pseudo" name="pseudo" value=""><br/><br/>

            <label for="mdp">Mot de passe</label><br/>
            <input type="text" id="mdp" name="mdp" value=""><br/><br/>

            <label for="nom">Nom</label><br/>
            <input type="text" id="nom" name="nom" value=""><br/><br/>

            <label for="prenom">Prénom</label><br/>
            <input type="text" id="prenom" name="prenom" value=""><br/><br/>

            <label for="email">Email</label><br/>
            <input type="text" id="email" name="email" value=""><br/><br/>

            <label for="civilite">Civilité</label><br/>
            <input type="radio" id="civilite" name="civilite" value="m">Homme
            <input type="radio" id="civilite" name="civilite" value="f">Femme<br/><br/>


            <input type="submit" name="" value="s'inscrire">

        </form>
        <?php
        require_once("inc/bas.inc.php");
        ?>
