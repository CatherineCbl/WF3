<?php
require_once("inc/init.inc.php");
//--------------TRAITEMENT PHP---------------------------------------------
if (isset($_GET['action']) && $_GET['action'] == "deconnexion") {
    session_destroy(); // supprime la session
}
if(internauteEstConnecte())//si l'internaute est déjà connecté, il n'a rien à faire ici, nous le redirigeons vers son profil. De cette manière, nous afficherons le formulaire de connexion uniquement si le membre n'est pas connecté
{
    header("location:profil.php");
}


if ($_POST)
{
    $resultat = executeRequete("SELECT*FROM membre WHERE pseudo = '$_POST[pseudo]'");
    if ($resultat->num_rows !=0)
    {
        $membre = $resultat->fetch_assoc();
        if($membre['mdp'] == $_POST['mdp'])
    // if(password_verify($_POST['mdp'], $membre['mdp'])) ---- quand le mdp est crypté
        {
            foreach($membre as $indice =>$element)
            {
                if($indice !='mdp')
                {
                    $_SESSION['membre'][$indice] = $element;// nous créons une session avec les éléments provenant de la BDD
                }
            }
            header("location:profil.php");// le pseudo et le mdp etant corrects, nous envoyons le membre sur la page de son profil
        }
        else {
            $contenu .= '<div class="erreur">Erreur de mot de passe</div>';
        }
    }
    else {
        $contenu .= '<div class="erreur">Erreur de pseudo</div>';
    }
}
require_once("inc/haut.inc.php");
echo $contenu;
?>

<form action="" method="post">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" name="pseudo" id="pseudo"><br><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="text" name="mdp" id="mdp"><br><br>

    <input type="submit" value="Se connecter">
</form>

<?php
require_once("inc/bas.inc.php");
 ?>
