<?php
if($_POST)
{
    echo 'pseudo :' . $_POST['pseudo'] . '<br>';
    echo 'email :' . $_POST['email'] . '<br>';
    echo '<hr>';

    foreach ($_POST as $indice => $valeur) {
        echo $indice . ' : ' . $valeur . '<br>';
    }

    echo '<br>';
    if (empty($_POST['pseudo']) AND (empty($_POST['email'])))
    {
        echo 'Veuillez remplir le champs ';
    }
    else {
        echo 'Champ valide';
    }
    echo '<br>';
    //Imaginons que nous avons un site vitrine, nous ne possédons pas de BDD, seulement un formulaire de contact, il serait interessant de pouvoir récupérer la liste des emails si nous voulions envoyer une newsletter à tout nos conctact, il existe en PHP des fonctions qui permettent de récupérer des saisies directement dans un fichier texte, voici ces fonctions : fopen(), fwrite(), fclose()

$fichier = fopen("liste.txt", "a");// fopen() en mode "a" permet de créer le fichier si il n'est pas trouvé, sinon l'ouvrir
fwrite($fichier, $_POST['pseudo'] . ' - ');// fwrite() permet d'écrire dans le fichier représenté par $fichier
fwrite($fichier, $_POST['email'] ."\r\n");// Permet de passer à la ligne dans le fichier
fclose($fichier);// fclose n'est pas indispensable, permet de fermer le fichier

echo '<pre>'; print_r($_POST); echo '</pre>';
}
// contexte: si l'on souhaite enregistrer des membres à une newsletter et que l'on ne possede pas de BDD, il serait intéressant de le faire via un fichier texte.

 ?>
