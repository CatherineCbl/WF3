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
