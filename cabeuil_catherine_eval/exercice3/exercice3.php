<?php
require_once("inc/init.inc.php");
if ($_POST)
{
    //------------CONTROLES ET ERREURS :
    $erreur = "";
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

        executeRequete("INSERT INTO movies(title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES('$_POST[title]', '$_POST[actors]', '$_POST[director]', '$_POST[producer]', '$_POST[year_of_prod]', '$_POST[language]', '$_POST[category]', '$_POST[storyline]', '$_POST[video]')");
        $contenu .= "<div class='validation'>Nouveau film ajouté</u></a></div>";//message de réussite
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
            <option value="1987">1987</option>
            <option value="1988">1988</option>
            <option value="1989">1989</option>
            <option value="1990">1990</option>
            <option value="1991">1991</option>
            <option value="1992">1992</option>
            <option value="1993">1993</option>
            <option value="1994">1994</option>
            <option value="1995">1995</option>
            <option value="1996">1996</option>
            <option value="1997">1997</option>
            <option value="1998">1998</option>
            <option value="1999">1999</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
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
            <option value="drame">Drame</option>
            <option value="romance">Romance</option>
            <option value="action">Action</option>
            <option value="thriller">Thriller</option>
            <option value="comedie">Comédie</option>
            <option value="horreur">Horreur</option>
            <option value="fantastique">Fantastique</option>
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
