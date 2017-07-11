<?php

$hote='localhost';// le chemin vers le serveur
$bdd='sitecv_catherine'; // le nom de la base de données
$utilisateur='root';//le nom d'utilisateur pour se connecter
$passe=''; // mot de passe d'utilisateur
//$passe='root'; //mot de passe mac en local

$pdoCV = new PDO('mysql:host='.$hote.';dbname='.$bdd, $utilisateur,$passe);
//SpdoCV est le nom de la variable de la connexion qui sert partout ou l'on doit se servir de cette connexion
$pdoCV ->exec("SET NAMES utf8");
 ?>
 <?php
 /*
 $hote='loalhost';// le chemin vers le serveur
 $bdd='siteCv_annissa' // le nom de la base de données
 $utilisateur ='root'//le nom d'utilisateur pour se connecter
 $passe=''; // mot de passe d'utilisateur
 //$passe='rooy'; //mot de passe mac en local

 $pdoCV = new PDO('mysql:host'.$hote.';dbname='.$bdd, $utilisateur,$passe);
 //SpdoCOUCOU est le nom de la variable de la connexion qui sert partout ou l'on doit se servir de cette connexion
 $pdoCOUCOU ->exec("SET NAMES utf8");
  ?>
*/

session_start(); // a mettre dans toutes les pages de l'admin; SESSION et authentification
if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté') {
    $id_utilisateur=$_SESSION['id_utilisateur'];
    $prenom=$_SESSION['prenom'];
    $nom=$_SESSION['nom'];
}
else {//l'utilisateur n'est pas connecté
    header('location:authentification.php');
}
//pour se deconnecter

if (isset($_GET['quitter'])) {//on vide les variables de session
    $_SESSION['connexion']='';
    $_SESSION['id_utilisateur']='';
    $_SESSION['prenom']='';
    $_SESSION['nom']='';
    unset($_SESSION['connexion']);
    session_destroy();
    header('location:../../index.html');
}
//session_destroy();

$sql = $pdoCV->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='$id_utilisateur' ");
$ligne_utilisateur = $sql->fetch();//va chercher sur une ligne!

 ?>
