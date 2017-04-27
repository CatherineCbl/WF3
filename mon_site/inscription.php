<?php
require_once("inc/init.inc.php");
require_once("inc/haut.inc.php");
?>

<form action="" method="post">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" maxlength="20" placeholder="Votre pseudo" pattern="[a-zA-Z0-9-_.] {3,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required"><br><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp" required="required"><br><br>

    <label for="nom">Nom</label><br>
    <input type="text" id="nom" name="nom" placeholder="Votre nom"><br><br>

    <label for="prenom">Prénom</label><br>
    <input type="text" id="prenom" name="prenom" placeholder="Votre prénom"><br><br>

    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" placeholder="exemple@gmail.com"><br><br>

    <label for="civilite">Civilité</label><br>
    <input type="radio" id="civilite" name="civilite" value="m" checked>Homme
    <input type="radio" id="civilite" name="civilite" value="f">Femme<br><br>

    <label for="ville">Ville</label><br>
    <input type="text" id="ville" name="ville" placeholder="Votre ville" pattern="[a-zA-Z0-9-_.] {3,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required"><br><br>

    <label for="code_postal">Code postal</label><br>
    <input type="text" id="code_postal" name="code_postal" placeholder="Votre code postal" pattern="[0-9] {5}" title="caractères acceptés : [0-9]"><br><br>
</form>

<?php
require_once("inc/bas.inc.php");
?>
