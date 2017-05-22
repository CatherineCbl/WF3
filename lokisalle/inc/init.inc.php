<?php
//---------------BDD
$mysqli = new Mysqli("localhost", "root", "", "lokisalle");
if($mysqli->connect_error)die("Un problème est survenu lors de la tentative de connexion à la BDD : " . $mysqli->connect_error);

//---------------SESSION
session_start(); // on ouvre et on crée une session

//--------------- CHEMIN
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . "/github/WF3/lokisalle/");
define("URL", 'http://localhost/github/WF3/lokisalle/');

//--------- VARIABLES
$contenu = '';

//--------- AUTRES INCLUSIONS
require_once("fonctions.inc.php");
