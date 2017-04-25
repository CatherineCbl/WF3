<?php
/*
Une session est un systeme mis en oeuvre dans le code PHP permettant de conserver sur le serveur, dans un fichier temporaire, des informations relatives à un internaute

L'avantage d'une session c'est que les données seront enregistrées dans un fichier sur le serveur disponible et consultable par toutes les pages durant toute la navigation de l'internaute
*/
session_start();// permet de créer un fichier session ou de l'ouvrir si il existe déjà
$_SESSION['pseudo'] = 'Catherine';
$_SESSION['nom'] = 'Cabeuil';

//pour rappel, $_SESSION est une superglobale de type Array
echo '<pre>'; print_r($_SESSION); echo '</pre>';

unset($_session['nom']);// nous pouvons vider une partie de la session: unset
echo '<pre>'; print_r($_SESSION); echo '</pre>';// affichage des informations restantes dans la session

session_destroy(); //suppression de la session

 ?>
