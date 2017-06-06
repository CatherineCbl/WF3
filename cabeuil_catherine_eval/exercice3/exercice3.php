<?php
require_once("inc/init.inc.php");
$erreur = "";
if (isset($_POST['ajout']))
{
    //------------CONTROLES ET ERREURS :
    //contrôle des tailles
    if(strlen($_POST['title']) < 5)//pour le titre
    {
        $erreur .= '<div class="erreur">Erreur de taille du titre</div>';//message d'erreur en rouge
    }
    if(strlen($_POST['director']) < 5)//pour le nom du réalisateur
    {
        $erreur .= '<div class="erreur">Erreur de taille du nom du réalisateur</div>';//message d'erreur en rouge
    }
    if(strlen($_POST['actors']) < 5)//pour les acteurs
    {
        $erreur .= '<div class="erreur">Erreur de taille pour le champ "acteurs"</div>';//message d'erreur en rouge
    }
    if(strlen($_POST['producer']) < 5)//pour le nom du producteur
    {
        $erreur .= '<div class="erreur">Erreur de taille du nom du producteur</div>';//message d'erreur en rouge
    }
    if(strlen($_POST['storyline']) < 5)//pour le synopsis
    {
        $erreur .= '<div class="erreur">Erreur de taille pour le champ synopsis</div>';//message d'erreur en rouge
    }


    // Vérifie si la chaîne ressemble à une URL
    if (filter_var($_POST['video'], FILTER_VALIDATE_URL)) {
        echo 'Cette URL est correct.';
    } else {
        echo 'Cette URL a un format non adapté.';
    }


    //----- ajout du film a la BDD
    if (empty($erreur))
    {

        $resultat = executeRequete("INSERT INTO movies(title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES('$_POST[title]', '$_POST[actors]', '$_POST[director]', '$_POST[producer]', '$_POST[year_of_prod]', '$_POST[language]', '$_POST[category]', '$_POST[storyline]', '$_POST[video]')");
        if ($resultat) {
            $contenu .= "<div class='validation'>Le film $_POST['title'] a bien été ajouté à la base de données</u></a></div>";//message de réussite        
        }
    }
    $contenu .= $erreur;
}
debug($_POST);
require_once("inc/haut.inc.php");
echo $contenu;
?>

<form action="" method="post">

    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" required="required" placeholder="Titre du film"><br><br>

    <label for="actors">Acteurs</label><br>
    <input type="text" id="actors" name="actors" placeholder="Noms des acteurs"><br><br>

    <label for="director">Réalisateur</label><br>
    <input type="text" id="director" name="director" placeholder="Nom du réalisateur"><br><br>

    <label for="producer">Producteur</label><br>
    <input type="text" id="producer" name="producer" placeholder="Nom du producteur"><br><br>

    <label for="year_of_prod">Année de production</label><br>
    <select id="year_of_prod" name="year_of_prod">
        <optgroup label="year_of_prod">
            <?php
                for ($i=2017; $i >= 1987; $i--) {
                    echo '<option>' .$i. '</option>';
                }
             ?>
        </optgroup>
    </select><br /><br />

    <label for="language">Langue</label><br>
    <select id="language" name="language">
        <optgroup label="language">
            <option value="anglais">Anglais</option>
            <option value="francais">Français</option>
            <option value="allemand">Allemand</option>
            <option value="espagnol">Espagnol</option>
        </optgroup>
    </select><br /><br />

    <label for="category">Catégorie</label><br>
    <select id="category" name="category">
        <optgroup label="category">
            <?php
            foreach ($_POST as $indice => $value) {
                echo $indice .' : '.$value . "<br>";
            }
             ?>
        </optgroup>
    </select><br /><br />

    <label for="storyline">Synopsis</label><br>
    <textarea type="text" id="storyline" name="storyline" placeholder="Synopsis"></textarea><br><br>

    <label for="video">Video</label><br>
    <input type="text" id="video" name="video" placeholder="URL"><br><br>

    <input type="submit" name="ajout" value="Ajouter">
</form>
<?php
require_once("inc/bas.inc.php");
