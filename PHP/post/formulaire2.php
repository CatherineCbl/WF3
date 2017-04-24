<?php
if($_POST)
{
echo "ville : " . $_POST['ville'] . '<br>';
echo "cp : " . $_POST['cp'] . '<br>';
echo "adresse : " . $_POST['adresse'] . '<br>';
echo '<hr>';
//récupération des saisies via une boucle
foreach ($_POST as $indice => $valeur) {
    echo $indice . ' : ' . $valeur . '<br>';
}

}
echo '<pre>'; print_r($_POST); echo '</pre>';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulaire2</title>
        <style>
            label{float: left; width: 95px; font-style: italic; font-family: Calibri;}
            h1 {margin: 0 0 10px 200px; font-family: Calibri;}
        </style>
    </head>
    <body>
        <h1>Formulaire</h1>
        <form class="" action="" method="post">

            <label for="">Ville</label><br />
            <input type="text" name="ville" value=""><br />

            <label for="">Code Postal</label><br />
            <input type="text" name="cp" value=""><br />

            <label for="">Adresse</label><br />
            <input type="text" name="adresse" value=""><br />

            <label for=""></label>
            <input type="submit" name="" value="envois"><br />

        </form>

    </body>
</html>
